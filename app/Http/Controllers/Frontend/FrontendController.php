<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\ProductHelper;
use App\Helpers\TemplateHelper;
use App\Models\Category;
use App\Models\HomepageSection;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\SectionCategory;
use App\Models\SectionProduct;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FrontendController extends Controller
{
    use CommonData;
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
    }

    public function index()
    {
        $sliders = CommonData::slider_list();
        return view('templates.' . $this->template_name . '.frontend.home', [
            'sliders' => $sliders
        ]);
    }

    public function section_data_list(Request $request)
    {
        $sections = HomepageSection::with(['sectionCategories.category','attachment'])->orderBy('section_position', 'asc')->paginate(1);
        if(!empty($sections)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $sections);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Section Found');
        }
    }

    public function get_section_products($sectionId)
    {
        $section = HomepageSection::where('section_id', $sectionId)->first();
        if(empty($section)){
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'Invalid Section Details');
        }
        $productIds = SectionProduct::where('section_id', $sectionId)->pluck('product_id')->toArray();
        $categoryIds = SectionCategory::where('section_id', $sectionId)->pluck('category_id');
        $reqData1 = [
            'categoryIds'=>$categoryIds,
            'productIds'=>$productIds,
            'productIdsType'=>'add',
        ];
        $products = ProductHelper::products_list($reqData1);
        if(!empty($products)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $products);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Product Found');
        }
    }

    public function category_wish_products(Request $request, $category_slug)
    {
        $category = Category::where('category_slug', $category_slug)->firstOrFail();

        if($request->ajax()){
            if (empty($category)) {
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Category Data Not Found', [], route('error.404'));
            }

            $products = ProductHelper::products_list($request);

            if(!empty($products)){
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $products);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Products Found');
            }

        }else{

            if (empty($category)) {
                return abort(Response::HTTP_NOT_FOUND);
            }

            $req['category_id'] = $category->category_id;

            $products = ProductHelper::products_list($req);
            return view('templates.' . $this->template_name . '.frontend.products', [
                'category' => $category,
                'categories' => CommonData::category_tree(),
                'brands' => CommonData::brand_list(),
                'colors' => CommonData::color_list(),
                'tags' => CommonData::tag_list(),
                'sizes' => CommonData::size_list($req),
                'products' => $products
            ]);
        }
    }

    public function product_sidebar_data(Request $request)
    {
        $data=[
            'brands' => CommonData::brand_list(),
            'colors' => CommonData::color_list(),
            'tags' => CommonData::tag_list(),
            'sizes' => CommonData::size_list($request),
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function sorting_product(Request $request)
    {
        $products = ProductHelper::products_list($request);
        if(!empty($products)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $products);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Products Found');
        }
    }

    public function product_details($slug)
    {
        $product = Product::where('product_slug', $slug)
            ->with(['brand', 'category', 'productDetails', 'variations', 'productImages', 'singleVariation', 'thumbImage'])
            ->firstOrFail();
        if (empty($product)) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('templates.' . $this->template_name . '.frontend.product', [
            'product' => $product,
        ]);
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
        return view('templates.' . $this->template_name . '.frontend.pages', [
            'page' => $page,
            'pagesMenuList' => CommonData::pages_menu_list(),
        ]);
    }

    public function contact_pages()
    {
        return view('templates.' . $this->template_name . '.frontend.contact');
    }

}
