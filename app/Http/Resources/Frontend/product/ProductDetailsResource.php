<?php

namespace App\Http\Resources\product;

use App\Http\Resources\skinType\SkinTypeResource;
use App\Models\ProductDetails;
use Illuminate\Http\Resources\Json\Resource;

class ProductDetailsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->details_id,
            'materials'=>$this->main_materials,
            'model'=>$this->product_model,
            'pieces'=>$this->num_of_pieces,
            'occasion'=>$this->product_occasion,
            'colorShade'=>$this->color_shade,
            'skinType'=> new SkinTypeResource($this->skinType),
            'extraDetails'=>$this->extra_details,
            'warrantyPolicy'=>$this->warranty_policy,
            'warrantyPolicyEn'=>$this->warranty_policy_eng,
            'warrantyPeriod'=>$this->warranty_period.' '.($this->warranty_period > 1)? ProductDetails::PeriodUnitM : ProductDetails::PeriodUnitS,

            'engine'=>$this->car_engine,
            'gearBox'=>$this->car_gear_box,
            'mileage'=>$this->car_mileage,
            'year'=>$this->car_year,
            'color'=>$this->car_color,
            'bodyType'=>$this->car_body_type,
            'fuelType'=>$this->car_fuel_type,
            'araCon'=>$this->car_ara_con,
            'driveType'=>$this->car_drive_type,
            'condition'=>$this->car_condition,
            'carType'=>$this->car_type,
            'carTypeLabel'=> $this->car_type_label
        ];
    }
}
