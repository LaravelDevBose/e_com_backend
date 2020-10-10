<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Frontend\brand\BrandCollection;
use App\Http\Resources\Frontend\brand\BrandResource;
use App\Http\Resources\Frontend\category\CategoryCollection;
use App\Http\Resources\Frontend\category\CategoryResource;
use App\Http\Resources\Frontend\color\ColorResource;
use App\Http\Resources\Frontend\discount\DiscountProductCollection;
use App\Http\Resources\Frontend\product\ProductCollection;
use App\Http\Resources\Frontend\product\ProductResource;
use App\Http\Resources\Frontend\size\SizeResource;
use App\Http\Resources\Frontend\slider\SliderResource;
use App\Http\Resources\Frontend\tag\TagResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\DeliveryMethod;
use App\Models\DiscountProduct;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductVariation;
use App\Models\Setting;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Tag;
use App\Traits\ApiResponser;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Cloudinary\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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


    public function get_sidebar_data(Request $request)
    {
        $category = '';
        if (!empty($request->category_slug)){
            $category = Category::where('category_slug', $request->category_slug)
                ->with(['attachment','children'=>function($query){
                    return $query->isActive()->with(['attachment','children'=>function($q){
                        return $q->with('attachment')->isActive();
                    }]);
                }])->first();
            $categoryIds = Category::All_children_Ids($category->category_id);
            $products = Product::isActive()->whereIn('category_id', $categoryIds)->get();
            $category = new CategoryResource($category);
        }

        if (!empty($request->brand_slug)){
            $brandId = Brand::where('brand_slug', $request->brand_slug)->first()->value('brand_id');
            $products = Product::isActive()->where('brand_id', $brandId)->get();
        }

        if (!empty($request->tag_slug)){
            $tag = Tag::where('tag_slug', $request->tag_slug)->with('products')->first();
            $products = Product::isActive()->whereIn('product_id', $tag->products->pluck('product_id'))->get();
        }

        if (!empty($request->section_slug)){
            if($request->section_slug == 'hot_deal'){
                $productIds = DiscountProduct::live()->orderBy('discount_percent', 'desc')->pluck('product_id');
                $products = Product::isActive()->whereIn('product_id', $productIds)->get();

            }else if($request->section_slug == 'new_arrival'){
                $products = Product::isActive()->latest()->get();
            }else{
                ## TODO Update Trending product query and recomm
                $products = Product::isActive()->get();
            }
        }

        $productV = ProductVariation::whereIn('product_id', $products->pluck('product_id')->toArray());
        $brandIds = $products->where('brand_id', '!=', 0)->pluck('brand_id')->toArray();
        $colorIds = $productV->distinct('color_id')->pluck('color_id')->toArray();
        $sizeIds = $productV->distinct('size_id')->pluck('size_id')->toArray();
        $tagIds = ProductTag::whereIn('product_id', $products->pluck('product_id')->toArray())->pluck('tag_id');
        $search_min_price = Setting::where('key', 'search_min_price')->where('type', Setting::Setting_Type['general'])->first();
        $search_max_price = Setting::where('key', 'search_max_price')->where('type', Setting::Setting_Type['general'])->first();


        $data = [
            'category'=>$category,
            'brands' => BrandResource::collection(Brand::isActive()->whereIn('brand_id', $brandIds)->get()),
            'colors' => ColorResource::collection(Color::isActive()->whereIn('color_id', $colorIds)->get()),
            'tags' => TagResource::collection(Tag::isActive()->whereIn('tag_id', $tagIds)->get()),
            'sizes' => SizeResource::collection(Size::isActive()->whereIn('size_id', $sizeIds)->get()),
            'search_min_price'=> (!empty($search_min_price)) ? $search_min_price->value : 1,
            'search_max_price'=> (!empty($search_max_price)) ? $search_max_price->value : 10000,
        ];

        return ApiResponser::SingleResponse($data, 'success', Response::HTTP_OK);
    }

    public function products_list(Request $request)
    {
        $products = Product::isActive();
        if (!empty($request->category_slug)) {
            $catId = Category::where('category_slug', $request->category_slug)->value('category_id');
            $categoriesID = array();
            $categoriesID = array_merge($categoriesID, [
                $catId
            ]);
            $childIds = Category::where('parent_id', $catId)->isActive()->pluck('category_id')->toArray();
            if (!empty($childIds) && count($childIds) > 0) {

                $categoriesID = array_merge($categoriesID, $childIds);
                if (!empty($childIds)) {
                    $childId = Category::whereIn('parent_id', $childIds)->isActive()->pluck('category_id')->toArray();
                    $categoriesID = array_merge($categoriesID, $childId);
                }
            }
            $products = $products->whereIn('category_id', $categoriesID);
        }
        if (!empty($request->brand_slug)){
            $brandId = Brand::where('brand_slug', $request->brand_slug)->value('brand_id');
            $products = $products->where('brand_id', $brandId);
        }
        if (!empty($request->tag_slug)){
            $tag = Tag::where('tag_slug', $request->tag_slug)->with('products')->first();
            $products = $products->whereIn('product_id', $tag->products->pluck('product_id'));
        }

        if (!empty($request->section_slug)){
            if($request->section_slug == 'hot_deal'){
                $productIds = DiscountProduct::live()->orderBy('discount_percent', 'desc')->pluck('product_id');
                $products = $products->whereIn('product_id', $productIds);

            }else if($request->section_slug == 'new_arrival'){
                $products = $products->latest();
            }else{
                ## TODO Update Trending product query and recomm

            }
        }

        if (!empty($request->brand_ids) && is_array($request->brand_ids)) {
            $products = $products->whereIn('brand_id', $request->brand_ids);
        }

        $productIds = $products->pluck('product_id')->toArray();
        if(!empty($request->color_ids) || !empty($request->size_ids)){
            $productIds = ProductVariation::whereIn('product_id', $productIds)
                ->where('variation_status', 1)
                ->whereIn('color_id',$request->color_ids)
                ->whereIn('size_id', $request->size_ids)
                ->where('price', '>=', $request->price['min'])
                ->where('price', '<=', $request->price['max'])
                ->pluck('product_id')->toArray();
        }

        if(!empty($request->order_by) && $request->order_by == 'price'){
            $rawQuery = 'product_variations.price '.$request->order_type;
        }else{
            $rawQuery = 'products.product_name '.$request->order_type;
        }
        $products = Product::isActive()->whereIn('products.product_id', $productIds)
            ->with(['variation','thumbImage', 'discount'])
            ->join('product_variations', 'products.product_id', '=', 'product_variations.product_id')
            ->orderByRaw($rawQuery)
            ->groupBy('products.product_id');

        $list = ApiResponser::MakeCollectionResponse($request, $products);
        if (!empty($list)) {
            $coll = new ProductCollection($list);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        } else {
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, 'No Products Found');
        }
    }


    public function get_product_details($slug)
    {
        $product = Product::where('product_slug', $slug)
            ->where('product_status', config('app.active'))
            ->with(['brand', 'category', 'productDetails','variation','variations', 'productImages', 'thumbImage', 'tags.tag', 'reviews.user', 'discount'])
            ->first();
        if(!empty($product)){
            $productIds = Product::whereIn('product_id', $product->tags->pluck('product_id')->toArray())
                ->where('product_id', '!=', $product->product_id)->pluck('product_id');
            $catId = $product->category_id;
            $brandId = $product->brand_id;
            $relatedProducts = Product::where('product_status', config('app.active'))
                ->where('product_id', '!=', $product->product_id)
                ->where(function ($query) use ($catId,$brandId, $productIds) {
                    $query->orWhere('category_id', $catId)
                    ->orWhere('brand_id', $brandId)
                    ->orWhereIn('product_id', $productIds);
                })
                ->with(['variation', 'thumbImage', 'discount'])
                ->take(18)->get();
            $colors = Color::whereIn('color_id', $product->variations->pluck('color_id'))->get();
            $sizes = Size::whereIn('size_id', $product->variations->pluck('size_id'))->get();
            $data = [
                'product'=> new ProductResource($product),
                'related_products'=> new ProductCollection($relatedProducts),
                'variations'=>[
                    'colors'=> ColorResource::collection($colors),
                    'sizes'=> SizeResource::collection($sizes)
                ]
            ];
            return ApiResponser::SingleResponse($data, 'success', Response::HTTP_OK);
        }
        return ApiResponser::AllResponse('Not Found', Response::HTTP_NOT_FOUND, false, 'Product Not found');

    }
    public function set_lang($lang)
    {
        Session::put('lang', $lang);
        App::setLocale($lang);
        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Successful', App::getLocale());
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
