<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    public function index(){
        return view('campaign.index');
    }

    public function create(){
        return view('campaign.create');
    }

    public function store(Request $request){

    }

    public function show(Campaign $campaign){

        return view('campaign.show');
    }

    public function details(){
        return view('campaign.show');
    }

    public function edit(Campaign $campaign){

    }

    public function update(Request $request, Campaign $campaign){


    }

    public function destroy(Campaign $campaign){

    }

    public function manage_product_page(){

    }

    public function update_product_serial(){

    }


}
