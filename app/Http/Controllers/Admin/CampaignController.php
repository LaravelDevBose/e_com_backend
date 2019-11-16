<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    public function index(){
        return view('campaign.index');
    }

    public function create(Request $request){

        if($request->ajax()){
            $position_array = array();

            $positions = Campaign::ADDS_POSITION;
            foreach ($positions as $key=> $value){
                array_push($position_array,[
                    'id'=>$key,
                    'text'=>$value,
                ]);
            }
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Data Found', ['positions'=>$position_array]);
        }
        return view('campaign.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'campaign_title'=>'required|string|max:191',
            'campaign_start'=> 'required|date',
            'campaign_end'=>'required|date',
            'attachment_id'=>'required',
            'camp_reg_date'=>'required|date',
            'seller_pro_limit'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $campaign = Campaign::create([
                    'campaign_title'=>$request->campaign_title,
                    'campaign_slug'=>Str::slug($request->campaign_title),
                    'campaign_start'=>Carbon::parse($request->campaign_start)->format('Y-m-d H:i:s'),
                    'campaign_end'=>Carbon::parse($request->campaign_end)->format('Y-m-d H:i:s'),
                    'camp_reg_date'=>Carbon::parse($request->camp_reg_date)->format('Y-m-d H:i:s'),
                    'campaign_details'=>$request->campaign_details,
                    'seller_pro_limit'=>$request->seller_pro_limit,
                    'campaign_rules'=>$request->campaign_rules,
                    'total_product'=>$request->total_product,
                    'adds_position'=>$request->adds_position,
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:null,
                    'adds_attachment_id'=>(!empty($request->adds_attachment_id))? $request->adds_attachment_id:null,
                    'campaign_status'=>(!empty($request->campaign_status) && $request->campaign_status == 1) ? $request->campaign_status : config('app.inactive'),
                ]);
                if($campaign){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Campaign Created Successfully', '', route('admin.campaign.index'));

                }else{
                    throw new \Exception('Campaign Not Created. Error Found',Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
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
