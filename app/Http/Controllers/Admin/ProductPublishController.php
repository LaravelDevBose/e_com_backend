<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\ProductCollection;
use App\Models\Product;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductPublishController extends Controller
{
    public $template_name = 'limitless_v2';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $products = Product::with(['thumbImage','category'=>function($query){
                return $query->with(['parent'=>function($q){
                    return $q->with(['parent']);
                }]);
            }, 'brand','variations'])
                ->inAdminReview()->dateRangeWish($request)->get();

            if(!empty($products)){
                $coll = ProductCollection::collection($products);

                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Product Found');
            }

        }else{
            return view('admin_panel.'.$this->template_name.'.product_publish.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
