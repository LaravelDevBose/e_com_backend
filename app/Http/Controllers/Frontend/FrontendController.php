<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Frontend\brand\BrandCollection;
use App\Http\Resources\Frontend\category\CategoryCollection;
use App\Http\Resources\Frontend\discount\DiscountProductCollection;
use App\Http\Resources\Frontend\product\ProductCollection;
use App\Http\Resources\Frontend\slider\SliderResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\DeliveryMethod;
use App\Models\DiscountProduct;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Setting;
use App\Models\Size;
use App\Models\Slider;
use App\Traits\ApiResponser;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    use CommonData;

    public function category_list(Request $request)
    {
        $categories = Category::isActive()->isParent()->with(['attachment','icon','children'=>function($query){
            return $query->isActive()->with(['children'=>function($q){
                return $q->isActive();
            }]);
        }])->get();
        if (!empty($categories)){
            $coll = new CategoryCollection($categories);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false, 'Category list not found');
        }
    }

    public function brand_list()
    {
        $brands = Brand::isActive()->with(['attachment'])->get();
        if (!empty($brands)){
            $coll = new BrandCollection($brands);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false);
        }
    }

    public function slider_list()
    {
        $sliders = Slider::isActive()->with('attachment')->orderby('slider_position', 'asc')->get();
        if (!empty($sliders)){
            $coll = SliderResource::collection($sliders);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false, 'Slider list not found');
        }
    }

    public function discount_products_list()
    {
        $discounts = DiscountProduct::live()->with(['product'=>function($query){
            return $query->isActive()->with(['variation', 'thumbImage']);
        }])->orderBy('discount_percent', 'desc')->take(8)->get();

        if(!empty($discounts)){
            $coll = new DiscountProductCollection($discounts);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false);
        }
    }

    public function new_arrival_products()
    {
        $newArrivals = Product::isActive()->with(['variation', 'thumbImage', 'discount'])->latest()->take(8)->get();
        if(!empty($newArrivals)){
            $coll = new ProductCollection($newArrivals);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false);
        }
    }

    public function trending_products()
    {
        ## TODO Update Trending Product Method
        $newArrivals = Product::isActive()->with(['variation', 'thumbImage', 'discount'])->take(8)->get();
        if(!empty($newArrivals)){
            $coll = new ProductCollection($newArrivals);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false);
        }
    }

    public function recommended_products()
    {
        ## TODO Update Recommended Product Method
        $newArrivals = Product::isActive()->with(['variation', 'thumbImage', 'discount'])->take(8)->get();
        if(!empty($newArrivals)){
            $coll = new ProductCollection($newArrivals);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false);
        }
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
        $category = Category::where('category_slug', $category_slug)->isActive()->firstOrFail();

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

            /*$req['category_id'] = $category->category_id;

            $products = ProductHelper::products_list($req);*/
            $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
                ->with(['product' => function ($query) {
                    return $query->with('brand', 'category', 'singleVariation', 'thumbImage', 'reviews')->isActive();
                }])->islive()->isActive()
                ->orderBy('position', 'asc')->latest()->get();
            return view('templates.' . $this->template_name . '.frontend.products', [
                'category' => $category,
                'categories' => CommonData::category_tree(),
                'hotProducts' => $hotProducts,
                /*'brands' => CommonData::brand_list(),
                'colors' => CommonData::color_list(),
                'tags' => CommonData::tag_list(),
                'sizes' => CommonData::size_list($req),
                'products' => $products*/
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
            $childIds = Category::where('parent_id', $request->category_id)->isActive()->pluck('category_id')->toArray();
            if (!empty($childIds) && count($childIds) > 0) {

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

        $simProds = $products->get();

        $varProIds = [];
        if(!empty($request->colorIds) || !empty($request->sizeIds)){
            $varProds = $products->get();

            // Variation Product Filter
            $productIds = $varProds->where('product_type', Product::ProductType['Variation'])->pluck('product_id');
            $varProIds = ProductVariation::whereIn('product_id', $productIds)
                ->where('variation_status', '!=', 0)
                ->whereIn('pri_id',$request->colorIds)
                ->whereIn('sec_id', $request->sizeIds)
                ->where('price', '>=', $request->range['min'])
                ->where('price', '<=', $request->range['max'])
                ->pluck('product_id')->toArray();
        }

        // Simple Product Filter
        $simProIds = $simProds->where('product_type', Product::ProductType['Simple'])
            ->where('product_price', '>=', $request->range[0])
            ->where('product_price', '<=', $request->range[1])
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
            ->with(['brand', 'category', 'productDetails', 'variations', 'productImages', 'thumbImage', 'seller.shop', 'reviews.buyer'])
            ->firstOrFail();

        if (empty($product)) {
            return abort(Response::HTTP_NOT_FOUND);
        }
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
        $categories = Category::isActive()->groupBy('category_id', 'parent_id')
            ->orderBy('category_id', 'asc')
            ->select('category_name as name', 'category_id as id')
            ->get()->toArray();

        if (!empty($categories)) {
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $categories);
        } else {
            return ResponserTrait::singleResponse([], 'error', Response::HTTP_NOT_FOUND, 'No Data Found');
        }
    }
}
