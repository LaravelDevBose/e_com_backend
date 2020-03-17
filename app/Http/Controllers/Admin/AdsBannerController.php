<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\AdsBannerResource;
use App\Models\AdsBanner;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdsBannerController extends Controller
{
    public $route = 'admin.brand.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.ads_banner.index');
    }

    public function list()
    {
        $adsBanners = AdsBanner::where('ads_status', config('app.delete'))->with('image')->latest()->get();
        if(!empty($adsBanners)){
            $coll = AdsBannerResource::collection($adsBanners);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
        }
        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'No Ads Banner Found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
