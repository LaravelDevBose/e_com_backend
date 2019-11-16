<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Admin\HomepageSectionCollection;
use App\Http\Resources\Admin\ProductCollection;
use App\Models\Category;
use App\Models\Product;
use App\Models\SectionCategory;
use App\Models\SectionProduct;
use Exception;
use App\Models\HomepageSection;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomepageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $sections = HomepageSection::NotDelete()->with('attachment')->latest()->get();
            if(!empty($sections)){
                $collections = HomepageSectionCollection::collection($sections);
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $collections);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Section Data Found');
            }
        }else{
            return view('homepage_section.section_list');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){

            $data = [
                'type'=>HomepageSection::sectionTypeSelect(),
            ];

            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, 'Data Found');
        }else{
            return  view('homepage_section.section_create');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'section_title'=>'required|string|max:50',
            'section_type'=>'required',
            'section_position'=>'required',
            'categoryIDs'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $section = HomepageSection::create([
                    'section_title'=>$request->section_title,
                    'section_type'=>$request->section_type,
                    'section_position'=>$request->section_position,
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:null,
                ]);
                if(!empty($section)){
                    $sectionCats = array();
                    if(!empty($request->categoryIDs)){
                        foreach ($request->categoryIDs as $key=>$value){
                            $catIds = Category::All_children_Ids($value);
                            if(!empty($catIds)){
                                foreach ($catIds as $catKey=> $catId){
                                    array_push($sectionCats, [
                                        'section_id'=>$section->section_id,
                                        'category_id'=>$catId,
                                        'created_by'=>auth()->guard('admin')->id(),
                                    ]);
                                }
                            }

                        }
                    }

                    if(!empty($sectionCats)){
                        $categorySection = SectionCategory::insert($sectionCats);
                        if(!empty($categorySection)){
                            DB::commit();
                            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Homepage Section Add Successfully', '', route('admin.section.add.product', $section->section_id));
                        }else{
                            throw new Exception('Invalid Category Information',Response::HTTP_BAD_REQUEST);
                        }
                    }
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Homepage Section Add Successfully', '', route('admin.section.add.product', $section->section_id));
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    public function add_section_products(Request $request, $sectionId)
    {
        $section = HomepageSection::where('section_id', $sectionId)->first();
        if(!empty($section)){
            if($request->ajax()){
                $categoryIds = SectionCategory::where('section_id', $sectionId)->pluck('category_id');
                $reqData = [
                    'categoryIds'=>$categoryIds,
                ];
                $products = ProductHelper::products_list($reqData);
                if(!empty($products)){
                    $collection = ProductCollection::collection($products);
                    return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $collection);
                }else{
                    return ResponserTrait::allResponse('success', Response::HTTP_BAD_REQUEST, 'Products Not Found');
                }
            }else{
                return view('homepage_section.section_product_add',[
                    'sectionId'=>$sectionId,
                ]);
            }
        }else{
            return abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function store_section_product(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'section_id'=>'required',
            'productIds'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $section = HomepageSection::find($request->section_id);
                if(empty($section)){
                    throw new Exception('Invalid Section Information', Response::HTTP_NOT_FOUND);
                }
                $i=1;
                $sectionProducts = array();
                foreach ($request->productIds as $key=> $productId){
                    $product = Product::where('product_id', $productId)->first();
                    if(!empty($product)){
                        $secCatId = SectionCategory::where('section_id', $request->section_id)->where('category_id', $product->category_id)->value('sec_cat_id');

                        array_push($sectionProducts,[
                            'section_id'=>$request->section_id,
                            'category_id'=>$product->category_id,
                            'sec_cat_id'=>$secCatId,
                            'product_id'=>$productId,
                            'product_position'=>$i,
                            'status'=>config('app.active'),
                            'created_by'=>auth()->guard('admin')->id(),
                            'created_at'=>now(),
                        ]);
                        $i++;
                    }
                }
                $storeProducts = SectionProduct::insert($sectionProducts);

                if(!empty($storeProducts)){
                    $section->update([
                        'section_status'=>(!empty($request->section_status) && count($request->productIds) > 0 )? config('app.active') : config('app.inactive')
                    ]);

                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Section Products Added Successfully', '', route('admin.section.index'));
                }else{
                    throw new Exception('Invalid Category Information',Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $sectionId)
    {
        $section = HomepageSection::with('sectionCategories.category', 'attachment')->where('section_id',$sectionId)->firstOrFail();
        if(!empty($section)){
            if($request->ajax()){
                return ResponserTrait::singleResponse($section, 'success', Response::HTTP_OK, 'Section Data Found');
            }else{
                return  view('homepage_section.section_show',[
                    'sectionId'=>$sectionId,
                ]);
            }
        }else{
            return abort(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sectionId)
    {
        $section = HomepageSection::find($sectionId);
        if(empty($section)){
            abort(Response::HTTP_NOT_FOUND);
        }

        return  view('homepage_section.section_edit',[
            'sectionId'=>$sectionId,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'section_title'=>'required|string|max:50',
            'section_type'=>'required',
            'section_position'=>'required',
            'categoryIDs'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $section = HomepageSection::where('section_id', $id)->with('sectionCategories')->first();
                if(empty($section)){
                    throw new Exception('Invalid Homepage Section Information', Response::HTTP_NOT_FOUND);
                }
                $secCategoryIds = $section->sectionCategories->pluck('category_id')->toArray();
                $section = $section->update([
                    'section_title'=>$request->section_title,
                    'section_type'=>$request->section_type,
                    'section_position'=>$request->section_position,
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:$section->attachment_id,
                ]);
                if(!empty($section)){
                    $sectionCats = array();
                    $categoryIDs = Category::All_children_Ids_by_array_data($request->categoryIDs);

                    foreach ($categoryIDs as $key=>$value){
                        if(!in_array($value, $secCategoryIds)){
                            array_push($sectionCats, [
                                'section_id'=>$id,
                                'category_id'=>$value,
                                'created_by'=>auth()->guard('admin')->id(),
                            ]);
                        }
                    }
                    $detCategoryIds = array();
                    foreach ($secCategoryIds as $key=>$value){
                        if(!in_array($value, $categoryIDs)){
                            array_push($detCategoryIds,$value);
                        }
                    }

                    if(!empty($sectionCats)){
                        $categorySection = SectionCategory::insert($sectionCats);
                        if(empty($categorySection)){
                            throw new Exception('Invalid Category Information',Response::HTTP_BAD_REQUEST);
                        }
                    }

                    if(!empty($detCategoryIds)){
                        $deleteCategorySection = SectionCategory::where('section_id', $id)->whereIn('category_id', $detCategoryIds)->delete();
                        if(empty($deleteCategorySection)){
                            throw new Exception('Invalid Category Information. Try Again.',Response::HTTP_BAD_REQUEST);
                        }
                    }

                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Homepage Section Update Successfully', '', route('admin.section.index'));
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    public function manage_section_products(Request $request, $sectionId)
    {
        $section = HomepageSection::where('section_id', $sectionId)->first();
        if(!empty($section)){
            if($request->ajax()){
                $productIds = SectionProduct::where('section_id', $sectionId)->pluck('product_id')->toArray();
                $categoryIds = SectionCategory::where('section_id', $sectionId)->pluck('category_id');
                $reqData = [
                    'categoryIds'=>$categoryIds,
                    'productIds'=>$productIds,
                    'productIdsType'=>'remove',
                ];

                $products = ProductHelper::products_list($reqData);
                $reqData1 = [
                    'categoryIds'=>$categoryIds,
                    'productIds'=>$productIds,
                    'productIdsType'=>'add',
                ];
                $selectedProducts = ProductHelper::products_list($reqData1);
                if(!empty($products)){
                    $collection = ProductCollection::collection($products);
                    $selectedCollection = ProductCollection::collection($selectedProducts);
                    $data =[
                        'productIds'=>$productIds,
                        'products'=>$collection,
                        'selected_products'=>$selectedCollection
                    ];
                    return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $data);
                }else{
                    return ResponserTrait::allResponse('success', Response::HTTP_BAD_REQUEST, 'Products Not Found');
                }
            }else{
                return view('homepage_section.section_product_manage',[
                    'sectionId'=>$sectionId,
                ]);
            }
        }else{
            return abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function update_section_product(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'section_id'=>'required',
            'productIds'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $section = HomepageSection::find($request->section_id);
                if(empty($section)){
                    throw new Exception('Invalid Section Information', Response::HTTP_NOT_FOUND);
                }
                $lastPosition = SectionProduct::where('section_id', $request->section_id)->latest()->first();
                $productIds = SectionProduct::where('section_id', $request->section_id)->pluck('product_id')->toArray();
                $i=1;
                if(!empty($lastPosition)){
                    $i=$lastPosition->product_position;
                }
                $sectionProducts = array();
                foreach ($request->productIds as $key=> $productId){
                    if(!in_array($productId, $productIds)){
                        $product = Product::where('product_id', $productId)->first();
                        if(!empty($product)){
                            $secCatId = SectionCategory::where('section_id', $request->section_id)->where('category_id', $product->category_id)->value('sec_cat_id');

                            array_push($sectionProducts,[
                                'section_id'=>$request->section_id,
                                'category_id'=>$product->category_id,
                                'sec_cat_id'=>$secCatId,
                                'product_id'=>$productId,
                                'product_position'=>$i,
                                'status'=>config('app.active'),
                                'created_by'=>auth()->guard('admin')->id(),
                                'created_at'=>now(),
                            ]);
                            $i++;
                        }
                    }

                }

                $removeProductIds = array();

                foreach ($productIds as $key=> $productId){
                    if(!in_array($productId, $request->productIds)){
                        array_push($removeProductIds,$productId);
                    }
                }

                $storeProducts = SectionProduct::insert($sectionProducts);

                if(!empty($storeProducts)){
                    $section->update([
                        'section_status'=>(!empty($request->section_status) && count($request->productIds) > 0 )? config('app.active') : config('app.inactive')
                    ]);
                    if(!empty($removeProductIds) && count($removeProductIds)>0){
                        SectionProduct::where('section_id', $request->section_id)->whereIn('product_id', $removeProductIds)->delete();
                    }

                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Section Products Update Successfully', '', route('admin.section.index'));
                }else{
                    throw new Exception('Invalid Category Information',Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $section = HomepageSection::where('section_id', $id)->first();
            if(empty($section)){
                throw new Exception('Invalid Homepage Section Information', Response::HTTP_NOT_FOUND);
            }
            $section->update([
                'section_status'=>config('app.delete'),
            ]);

            if(!empty($section)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Homepage Section Deleted Successfully');
            }{
                throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }

    }
}
