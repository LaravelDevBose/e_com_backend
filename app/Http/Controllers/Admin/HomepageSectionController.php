<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Admin\ProductCollection;
use App\Models\SectionCategory;
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
    public function index()
    {
        return view('homepage_section.section_list');
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
            'attachment_id'=>'array'
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

                            array_push($sectionCats, [
                                'section_id'=>$section->section_id,
                                'category_id'=>$value,
                                'created_by'=>auth()->guard('admin')->id(),
                            ]);
                        }
                    }

                    if(!empty($sectionCats)){
                        $categorySection = SectionCategory::insert($sectionCats);
                        if(!empty($categorySection)){
                            DB::commit();
                            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Homepage Section Add Successfully', '', route('admin.section.add_product', $section->section_id));
                        }else{
                            throw new Exception('Invalid Category Information',Response::HTTP_BAD_REQUEST);
                        }
                    }
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Homepage Section Add Successfully', '', route('admin.section.add_product', $section->section_id));
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
        $section = HomepageSection::findOrFail($sectionId);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
