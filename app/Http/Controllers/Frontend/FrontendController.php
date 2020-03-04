<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\ProductHelper;
use App\Helpers\TemplateHelper;
use App\Http\Resources\Frontend\brand\BrandCollection;
use App\Http\Resources\Frontend\category\CategoryCollection;
use App\Http\Resources\Frontend\product\ProductCollection;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\DeliveryMethod;
use App\Models\GroupProduct;
use App\Models\HomepageSection;
use App\Models\LatestDeal;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Review;
use App\Models\SectionCategory;
use App\Models\SectionProduct;
use App\Models\Seller;
use App\Models\Setting;
use App\Models\Shop;
use App\Models\Size;
use App\Models\Slider;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    use CommonData;
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        if (empty($this->template_name)) {
            $this->template_name = config('app.default_template');
        }
    }

    public function index()
    {
        $sliders = CommonData::slider_list([Slider::SliderType['Home Page']]);
        $topProducts = GroupProduct::where('group_type', GroupProduct::Groups['Top Product'])
            ->whereDate('expired_at', '>=', Carbon::now())
            ->with(['product' => function ($query) {
                return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews');
            }])->orderBy('position', 'asc')->latest()->get();

        $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
            ->whereDate('expired_at', '>=', Carbon::now())
            ->with(['product' => function ($query) {
                return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews')->isActive();
            }])->islive()->orderBy('position', 'asc')->latest()->get();

        $latestDeals = LatestDeal::where('status', config('app.active'))->whereDate('end_time', '>', Carbon::now()->format('Y-m-d h:i:s'))
            ->with(['deal_products' => function ($query) {
                return $query->with(['product' => function ($q) {
                    return $q->isActive();
                }]);
            }])->first();
        $categories = Category::isParent()->isActive()->select('category_id', 'category_name', 'category_slug', 'sect_banner_id')
            ->with(['sectionBanner', 'children' => function ($query) {
                return $query->isActive();
            }])->get();

        $categorySection = array();
        foreach ($categories as $category) {
            $catIds = Category::All_children_Ids($category->category_id);
            $products = Product::isActive()->whereIn('category_id', $catIds)->with('thumbImage', 'singleVariation', 'reviews');
            $productIds = $products->pluck('product_id');

            $bestSellProductId = OrderItem::whereIn('product_id', $productIds)
                ->select('order_id', 'product_id', DB::raw('count(*) as total'))
                ->groupBy('product_id')->orderBy('total', 'desc')
                ->pluck('product_id');

            $mostReviewProductIds = Review::whereIn('product_id', $productIds)
                ->select('review_id', 'product_id', DB::raw('count(*) as total'))
                ->groupBy('product_id')->orderBy('total', 'desc')
                ->pluck('product_id');
            $bestSellProducts = $products;
            $mostReviewsProducts = $products;
            $latestProducts = $products->latest()->take(12)->get();
            $bestSellProducts = $bestSellProducts->whereIn('product_id', $bestSellProductId)->take(12)->get();
            $mostReviewsProducts = $mostReviewsProducts->whereIn('product_id', $mostReviewProductIds)->take(12)->get();

            array_push($categorySection, [
                'category' => $category,
                'productList' => [
                    'newArrivals' => $latestProducts,
                    'bestSeller' => $bestSellProducts,
                    'mostReviews' => $mostReviewsProducts,
                ]
            ]);
        }


        return view('templates.' . $this->template_name . '.frontend.home', [
            'sliders' => $sliders,
            'topProducts' => $topProducts,
            'hotProducts' => $hotProducts,
            'categorySection' => $categorySection,
            'latestDeals' => $latestDeals,
        ]);
    }

    public function set_lang($lang)
    {
        Session::put('lang', $lang);
        App::setLocale($lang);
        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Successful', App::getLocale());
    }

    public function section_data_list(Request $request)
    {
        $sections = HomepageSection::with(['sectionCategories.category', 'attachment'])
            ->orderBy('section_position', 'asc')->paginate(1);
        if (!empty($sections)) {
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $sections);
        } else {
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Section Found');
        }
    }

    public function hot_products()
    {
        $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
            ->with(['product' => function ($query) {
                return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews')->isActive();
            }])->orderBy('position', 'asc')->islive()->isActive()->latest()->get();
        return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $hotProducts);
    }

    public function get_section_products($sectionId)
    {
        $section = HomepageSection::where('section_id', $sectionId)->first();
        if (empty($section)) {
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'Invalid Section Details');
        }
        $productIds = SectionProduct::where('section_id', $sectionId)->pluck('product_id')->toArray();
        $categoryIds = SectionCategory::where('section_id', $sectionId)->pluck('category_id');
        $reqData1 = [
            'categoryIds' => $categoryIds,
            'productIds' => $productIds,
            'productIdsType' => 'add',
        ];
        $products = ProductHelper::products_list($reqData1);
        if (!empty($products)) {
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $products);
        } else {
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Product Found');
        }
    }

    public function category_wish_products(Request $request, $category_slug)
    {
        $category = Category::where('category_slug', $category_slug)->firstOrFail();

        if ($request->ajax()) {
            if (empty($category)) {
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Category Data Not Found', [], route('error.404'));
            }

            $products = ProductHelper::products_list($request);

            if (!empty($products)) {
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $products);
            } else {
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Products Found');
            }

        } else {

            if (empty($category)) {
                return abort(Response::HTTP_NOT_FOUND);
            }
            $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
                ->with(['product' => function ($query) {
                    return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews')->isActive();
                }])->islive()->isActive()
                ->orderBy('position', 'asc')->latest()->get();
            return view('templates.' . $this->template_name . '.frontend.products', [
                'category' => $category,
                'categories' => CommonData::category_tree(),
                'hotProducts' => $hotProducts,
            ]);
        }
    }

    public function product_sidebar_data(Request $request)
    {
        $categoryIds = Category::All_children_Ids($request->category_id);
        $products = Product::isActive()->whereIn('category_id', $categoryIds)->get();

        $brandIds = $products->where('brand_id', '!=', 0)->pluck('brand_id')->toArray();
        $productIds = $products->pluck('product_id')->toArray();
        $colorIds = ProductVariation::whereIn('product_id', $productIds)->distinct('pri_id')->pluck('pri_id')->toArray();
        $sizeIds = ProductVariation::whereIn('product_id', $productIds)->distinct('sec_id')->pluck('sec_id')->toArray();
        $search_min_price = Setting::where('key', 'search_min_price')->where('type', Setting::Setting_Type['general'])->first();
        $search_max_price = Setting::where('key', 'search_max_price')->where('type', Setting::Setting_Type['general'])->first();
        $data = [
            'brands' => Brand::isActive()->whereIn('brand_id', $brandIds)->get(),
            'colors' => Color::isActive()->whereIn('color_id', $colorIds)->get(),
            'tags' => CommonData::tag_list(),
            'sizes' => Size::isActive()->whereIn('size_id', $sizeIds)->get(),
            'search_min_price'=> (!empty($search_min_price)) ? $search_min_price->value : 1,
            'search_max_price'=> (!empty($search_max_price)) ? $search_max_price->value : 10000,
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function sorting_product(Request $request)
    {
        $products = Product::isActive();
        if (!empty($request->category_id)) {
            $categoriesID = array();

            $categoriesID = array_merge($categoriesID, [
                $request->category_id
            ]);
            $category = Category::isActive()->with('children')->where('category_id', $request->category_id)->first();
            if (!empty($category->children)) {
                $childIds = Category::where('parent_id', $category->category_id)->isActive()->pluck('category_id')->toArray();
                $categoriesID = array_merge($categoriesID, $childIds);
                if (!empty($childIds)) {
                    $childId = Category::whereIn('parent_id', $childIds)->isActive()->pluck('category_id')->toArray();
                    $categoriesID = array_merge($categoriesID, $childId);
                }
            }
            $products = $products->whereIn('category_id', $categoriesID);
        }

        if (!empty($request->brandIds) && is_array($request->brandIds)) {
            $products = $products->whereIn('brand_id', $request->brandIds);
        }

        $varProds = $products->get();
        $simProds = $products->get();

        // Variation Product Filter
        $productIds = $varProds->where('product_type', Product::ProductType['Variation'])->pluck('product_id');
        $varProIds = ProductVariation::whereIn('product_id', $productIds)
                        ->whereIn('pri_id',$request->colorIds)
                        ->whereIn('sec_id', $request->sizeIds)
                        ->where('price', '>=', $request->range['min'])
                        ->where('price', '<=', $request->range['max'])
                        ->pluck('product_id')->toArray();

        // Simple Product Filter
        $simProIds = $simProds->where('product_type', Product::ProductType['Simple'])
            ->where('product_price', '>=', $request->range['min'])
            ->where('product_price', '<=', $request->range['max'])
            ->pluck('product_id')->toArray();

        $sortProIds = array_merge($varProIds, $simProIds);
        $products = Product::isActive()->whereIn('product_id', $sortProIds)
                    ->with(['brand', 'category', 'thumbImage', 'singleVariation', 'reviews'])
                    ->get();
        if (!empty($products)) {
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $products);
        } else {
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Products Found');
        }
    }

    public function product_details($slug)
    {
        $product = Product::where('product_slug', $slug)
            ->with(['brand', 'category', 'productDetails', 'variations', 'productImages', 'singleVariation', 'thumbImage', 'seller.shop', 'reviews.buyer'])
            ->firstOrFail();

        if (empty($product)) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
            ->with(['product' => function ($query) {
                return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews')->isActive();
            }])->islive()->orderBy('position', 'asc')->latest()->take(5)->get();
        $showSellerInfo = Setting::where('key', 'show_seller_info')->first();
        $reqData = [
            'product_id' => $product->product_id,
            'category_id' => $product->cateory_id,
            'brand_id' => $product->brand_id,
            'order_by' => 'desc',
            'take' => 12
        ];

        $relatedProducts = ProductHelper::products_list($reqData);
        $deliveryMethods = DeliveryMethod::isActive()->get();
        return view('templates.' . $this->template_name . '.frontend.product', [
            'product' => $product,
            'hotProducts' => $hotProducts,
            'relatedProducts' => $relatedProducts,
            'deliveryMethods' => $deliveryMethods,
            'showSellerInfo'   => $showSellerInfo,
        ]);
    }

    public function product_variation_data(Request $request)
    {
        if (empty($request->product_id)) {
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Invalid Product Info');
        }

        $variations = ProductVariation::where('product_id', $request->product_id)->get();
        $colorIds = $variations->pluck('pri_id');
        $sizeIds = $variations->pluck('sec_id');
        $reqData = [
            'colorIds' => $colorIds,
            'sizeIds' => $sizeIds,
        ];

        $data = [
            'colorInfos' => CommonData::color_list($reqData),
            'sizeInfos' => CommonData::size_list($reqData)
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, 'Data Found');
    }

    public function checkout()
    {
        return view('templates.' . $this->template_name . '.frontend.checkout');
    }

    public function cart_page()
    {
        return view('templates.' . $this->template_name . '.frontend.cart');
    }

    public function general_pages($page_slug)
    {
        $page = Page::isActive()->where('page_slug', $page_slug)->firstOrFail();

        if (empty($page)) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
            ->with(['product' => function ($query) {
                return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews');
            }])->islive()
            ->orderBy('position', 'asc')->latest()->get();
        return view('templates.' . $this->template_name . '.frontend.pages', [
            'page' => $page,
            'pagesMenuList' => CommonData::pages_menu_list(),
            'hotProducts' => $hotProducts,
        ]);
    }

    public function contact_pages()
    {
        return view('templates.' . $this->template_name . '.frontend.contact');
    }

    public function shop_profile($shopSlug)
    {
        $shop = Shop::where('shop_slug', $shopSlug)->with(['seller' => function ($query) {
            return $query->with(['products' => function ($qu) {
                return $qu->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews')->isActive();
            }]);
        }, 'shopLogo', 'banner'])->first();
        return view('templates.' . $this->template_name . '.frontend.shop_profile', [
            'shop' => $shop,
        ]);
    }

    public function mall_products()
    {
        $sliders = CommonData::slider_list([Slider::SliderType['Mall Page']]);
        $shop = Shop::where('shop_id', 1)->with(['seller' => function ($query) {
            return $query->with(['products' => function ($qu) {
                return $qu->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews', 'mallLogo')->isActive();
            }]);
        }, 'shopLogo', 'banner'])->first();
        return view('templates.' . $this->template_name . '.frontend.mall_profile', [
            'shop' => $shop,
            'sliders'=>$sliders,
        ]);
    }

    public function searching_data(Request $request)
    {
        $result = [
            'products' => [],
            'categories' => [],
            'brands' => [],
        ];
        if (!empty($request->search_key)) {
            $products = Product::where('product_status', Product::ProductStatus['Active'])
                ->where('product_name', 'like', '%' . $request->search_key . '%')
                ->orWhere('product_sku', 'like', '%' . $request->search_key . '%')
                ->orWhere('lang_product_name', 'like', '%' . $request->search_key . '%')
                ->orwhere('lang_highlight', 'like', '%' . $request->search_key . '%')
                ->isActive();

            if (!empty($request->categoryId)) {
                $products = $products->where('category_id', $request->categoryId)->take(7)->get();
            } else {
                $products = $products->take(7)->get();
            }


            ## TODO Product Status Check
            $productColl = ProductCollection::collection($products);
            if (!empty($productColl)) {
                $result['products'] = $productColl;
            }

            $categories = Category::isActive()
                ->Where('category_name', 'like', '%' . $request->search_key . '%')->take(5)->get();
            if (!empty($categories)) {
                $result['categories'] = CategoryCollection::collection($categories);
            }

            $brands = Brand::isActive()->where('brand_name', 'like', '%' . $request->search_key . '%')->take(5)->get();
            if (!empty($brands)) {
                $result['brands'] = BrandCollection::collection($brands);
            }

            if (!empty($result)) {
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Search Result Found', $result);
            } else {
                return ResponserTrait::allResponse('success', Response::HTTP_NO_CONTENT, 'No Result Found', $result);
            }
        } else {
            return ResponserTrait::allResponse('success', Response::HTTP_BAD_REQUEST, 'No Search Key Found', $result);
        }


    }

    public function get_category_list()
    {
        $categories = Category::isActive()->groupBy('category_id', 'parent_id')->orderBy('category_id', 'asc')->select('category_name as name', 'category_id as id')->get()->toArray();

        if (!empty($categories)) {
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $categories);
        } else {
            return ResponserTrait::singleResponse([], 'error', Response::HTTP_NOT_FOUND, 'No Data Found');
        }
    }
}
