<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Resources\Admin\GeneralPageCollection;
use App\Http\Resources\Admin\GeneralPageResource;
use App\Models\Page;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Tests\ResponseTest;

class GeneralPagesController extends Controller
{

    public function index(){
        return view('cms.pages.index');
    }

    public function page_list(Request $request){
        $pages = Page::notDelete()->bySearch($request)->with('attachment')->get();

        if(!empty($pages)){
            $collection = GeneralPageCollection::collection($pages);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $collection);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Page Data Found. May be some Error.');
        }
    }

    public function create(Request $request){

        if($request->ajax()){
            $showIn = [];
            foreach (Page::MENU_SHOW_IN as $key=>$value){
                array_push($showIn, [
                    'id'=>$value,
                    'text'=>$key,
                ]);
            }
            $data['show_in'] = $showIn;
            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
        }
        return view('cms.pages.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'page_title'=>'required|string|min:5|max:20',
            'menu_title'=>'required|string|min:5|max:20',
            'show_in'=>'required|numeric',
            'attachmentIds'=>'array'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $page = Page::create([
                    'page_title'=>$request->page_title,
                    'menu_title'=>$request->menu_title,
                    'page_slug'=>Str::slug($request->menu_title),
                    'show_in'=>$request->show_in,
                    'menu_position'=>$request->menu_position,
                    'body_content'=>$request->body_content,
                    'other_content'=>$request->other_content,
                    'attachment_id'=>(!empty($request->attachmentIds[0]))?$request->attachmentIds[0]:'',
                    'page_status'=>(!empty($request->page_status) && $request->page_status == config('app.active')) ? $request->page_status : config('app.inactive'),
                ]);
                if($page){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Page Details Store Successfully', '', route('admin.cms.pages.index'));
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            $message = null;
            foreach ($errors as $error){
                if(!empty($error)){
                    foreach ($error as $errorItem){
                        $message .=  $errorItem .' ';
                    }
                }
            }
            return ResponserTrait::allResponse('validation', Response::HTTP_NOT_ACCEPTABLE, ($message != null) ? $message :'Invalid File!', '', '');

        }
    }

    public function show($pageId, Request $request){

        if($request->ajax()){

            $page = Page::where('page_id', $pageId)->with('attachment')->first();
            if(!empty($page)){
                $response = new GeneralPageResource($page);
                return ResponserTrait::singleResponse($response, 'success', Response::HTTP_OK);
            }else{
                return ResponserTrait::allResponse('error', 400, 'No Data Found. Something Wrong !');
            }
        }else{
            return view('cms.pages.show',[
                'pageId'=>$pageId,
            ]);
        }

    }

    public function edit($pageId){

        return view('cms.pages.edit',[
            'pageId'=>$pageId
        ]);
    }

    public function update(Request $request, Page $page){

        $validator = Validator::make($request->all(),[
            'title'=>'required|string|min:5|max:20',
            'menuTitle'=>'required|string|min:5|max:20',
            'show_in'=>'required|numeric',
            'attachmentIds'=>'array'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $page = $page->update([
                    'page_title'=>$request->title,
                    'menu_title'=>$request->menuTitle,
                    'page_slug'=>Str::slug($request->menuTitle),
                    'show_in'=>$request->show_in,
                    'menu_position'=>$request->position,
                    'body_content'=>$request->body_content,
                    'other_content'=>$request->extra_content,
                    'page_status'=>(!empty($request->status) && $request->status == config('app.active')) ? $request->status : config('app.inactive'),
                ]);
                if(!empty($request->attachmentIds[0]) && count($request->attachmentIds) > 0){
                    $imageUpdate = Page::find($request->id);
                    $imageUpdate->attachment_id = $request->attachmentIds[0];
                    $imageUpdate->save();
                }
                if($page){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Page Details Update Successfully', '', route('admin.cms.pages.index'));
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            $message = null;
            foreach ($errors as $error){
                if(!empty($error)){
                    foreach ($error as $errorItem){
                        $message .=  $errorItem .' ';
                    }
                }
            }
            return ResponserTrait::allResponse('validation', Response::HTTP_NOT_ACCEPTABLE, ($message != null) ? $message :'Invalid File!', '', '');

        }
    }

    public function destroy(Page $page){
        if($page){
            try{
                DB::beginTransaction();
                $page->update([
                    'page_status'=>config('app.delete'),
                ]);

                if($page){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Page Content Delete SuccessFully');
                }{
                    throw new Exception('Invalid Information.! Delete Not Successful');
                }
            }catch(Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, "Invalid Information. No Page Info Found.");
        }
    }


    public function about_us(){
        return view('cms.pages.about_us');
    }

    public function privacy_policy(){
        return view('cms.pages.privacy_policy');
    }

    public function warranty_policy(){
        return view('cms.pages.warranty_policy');
    }

    public function shipping_policy(){
        return view('cms.pages.shipping_policy');
    }

    public function returns_and_replacement(){
        return view('cms.pages.return_and_replacement');
    }

    public function terms_and_conditions(){
        return view('cms.pages.terms_and_conditions');
    }




}
