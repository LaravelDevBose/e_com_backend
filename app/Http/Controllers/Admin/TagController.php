<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ResponserTrait;
use Exception;
use App\Models\Tag;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Admin\TagCollection;
use App\Http\Resources\Admin\Tag as TagResource;
use Maatwebsite\Excel\Facades\Excel;

class TagController extends Controller
{
    public $template_name = 'limitless_v2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = new TagCollection(Tag::notDelete()->latest()->get());
        if(!empty($tags)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $tags);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Data Found');
        }
    }

    public function tag_list()
    {
        $tags = Tag::isActive()->select('tag_id as id', 'tag_title as text')->latest()->get();
        return \response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.'.$this->template_name.'.tag.index');
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
            'tag_title'=>'required|string:max:190',
            'tag_status'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $tag = Tag::create([
                    'tag_title'=>$request->tag_title,
                    'tag_slug'=>Str::slug($request->tag_title),
                    'tag_status'=>(!empty($request->tag_status) && $request->tag_status == 1) ? $request->tag_status : 2,
                ]);
                if($tag){
                    $tag= new TagResource(Tag::find($tag->tag_id));
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Tag Created Successfully', $tag);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'tag_title'=>'required|string:max:190',
            'tag_status'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $tag = Tag::where('tag_id', $id)->first();
                if(empty($tag)){
                    throw new Exception('Invalid Information', Response::HTTP_NOT_FOUND);
                }
                $tag = $tag->update([
                    'tag_title'=>$request->tag_title,
                    'tag_slug'=>Str::slug($request->tag_title),
                    'tag_status'=>(!empty($request->tag_status) && $request->tag_status == 1) ? $request->tag_status : 2,
                ]);
                if($tag){
                    $tag= new TagResource(Tag::find($id));
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Tag Updated Successfully', $tag);
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
    public function destroy(Tag $tag)
    {
        try{
            DB::beginTransaction();
            if($tag){

                $tag->update([
                    'tag_status'=>0,
                ]);

                if($tag){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Tag Deleted Successfully');
                }{
                    throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
                }
            }else{
                throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }

    }

    public function import_tag(Request $request){
        $file = $request->file('excel_file')->getRealPath();

        $excel_file = Excel::load($file)->ignoreEmpty()->get()->toArray();
        $result =0;
        if(!empty($excel_file) && isset($excel_file[0])){
            foreach ($excel_file as $r =>$row){
                foreach ($row as $c => $coll){
                    if(!empty($coll['tag_title'])){
                        $color = Tag::create([
                            'tag_title'=>$coll['tag_title'],
                            'tag_slug'=>Str::slug($coll['tag_title']),
                            'tag_status'=>$coll['tag_status']?? 2
                        ]);
                        if($color){
                            $result++;
                        }
                    }
                }

            }

            if($result == count($excel_file)){
                return response()->json([
                    'status'=>'success',
                    'message'=>'All Tag Data Store Successfully',
                    'url'=>route('admin.tag.create')
                ]);
            }else{
                return response()->json([
                    'status'=>'success',
                    'message'=>'Some of Tag Data Not Store Successfully',
                    'url'=>route('admin.tag.create')
                ]);
            }
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Uploaded File is Empty. No Data Found.'
            ]);
        }
    }
}
