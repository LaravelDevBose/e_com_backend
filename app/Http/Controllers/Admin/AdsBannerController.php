<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Resources\Admin\AdsBannerResource;
use App\Models\AdsBanner;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdsBannerController extends Controller
{
    public $route = 'admin.ads_banner.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.ads_banner.index');
    }

    public function list()
    {
        $adsBanners = AdsBanner::where('ads_status','!=', config('app.delete'))->with('image')->latest()->get();
        if(!empty($adsBanners)){
            $coll = AdsBannerResource::collection($adsBanners);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
        }
        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'No Ads Banner Found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $positions = array_flip(AdsBanner::ADS_POSITIONS);
        return view('admin_panel.'.$this->template_name.'.ads_banner.create', [
            'positions'=>$positions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ads_title'=>'required|string|max:200',
            'attachment_id'=>'required',
            'ads_position'=>'required',
            'ads_expired'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $ads = AdsBanner::create([
                    'ads_title'=>$request->ads_title,
                    'ads_trans_title'=>$request->ads_trans_title,
                    'attachment_id'=>$request->attachment_id,
                    'ads_url'=>$request->ads_url,
                    'ads_position'=>$request->ads_position,
                    'ads_expired'=>$request->ads_expired,
                    'ads_status'=>$request->ads_status?? config('app.inactive'),
                ]);

                if(!empty($ads)){
                    DB::commit();
                    return ResponserTrait::allResponse('Success', Response::HTTP_OK, 'Ads Banner Created Successfully', '', route('admin.ads_banner.index'));
                }else {
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $adsBanner = AdsBanner::where('ads_banner_id', $id)->with('image')->first();
        if(!empty($adsBanner)){
            return ResponserTrait::singleResponse($adsBanner, 'Success', Response::HTTP_OK, 'Ads Banner Data Found');
        }
        return ResponserTrait::allResponse('Not Found', Response::HTTP_NOT_FOUND, 'Ads Banner Data Not Found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $adsBanner = AdsBanner::where('ads_banner_id', $id)->with('image')->first();
        if(empty($adsBanner)){
            abort(Response::HTTP_NOT_FOUND);
        }
        $positions = array_flip(AdsBanner::ADS_POSITIONS);
        return view('admin_panel.'.$this->template_name.'.ads_banner.edit', [
            'positions'=>$positions,
            'id'=>$id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'ads_title'=>'required|string|max:200',
            'ads_position'=>'required',
            'ads_expired'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $ads = AdsBanner::where('ads_banner_id', $id)->first();
                if(empty($ads)){
                    throw new Exception('Invalid Ads Banner Information', Response::HTTP_NOT_FOUND);
                }
                $ads = $ads->update([
                    'ads_title'=>$request->ads_title,
                    'ads_trans_title'=>$request->ads_trans_title,
                    'attachment_id'=>$request->attachment_id ?? $ads->attachment_id,
                    'ads_url'=>$request->ads_url,
                    'ads_position'=>$request->ads_position,
                    'ads_expired'=>$request->ads_expired,
                    'ads_status'=>$request->ads_status ?? config('app.inactive'),
                ]);

                if(!empty($ads)){
                    DB::commit();
                    return ResponserTrait::allResponse('Success', Response::HTTP_OK, 'Ads Banner Updated Successfully', '', route('admin.ads_banner.index'));
                }else {
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $ads = AdsBanner::where('ads_banner_id', $id)->first();

            if(empty($ads)){
                throw new Exception('Invalid Ads Banner information', Response::HTTP_NOT_FOUND);
            }
            $ads->update([
                'ads_status'=>config('app.delete'),
            ]);

            if(!empty($ads)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Ads Banner Deleted Successfully');
            }else{
                throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }
    }
}
