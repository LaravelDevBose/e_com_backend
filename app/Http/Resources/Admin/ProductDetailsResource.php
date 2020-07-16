<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
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
            'materials'=>$this->main_materials,
            'model'=>$this->product_model,
            'pieces'=>$this->num_of_pieces,
            'occasion'=>$this->product_occasion,
            'color_shade'=>$this->color_shade,
            'skin_type'=>$this->skin_type,
            'extra_details'=>$this->extra_details,
            'warranty_policy'=>$this->warranty_policy,
            'warranty_policy_eng'=>$this->warranty_policy_eng,
            'warranty_period'=>$this->warranty_period,
            'cod_avail'=> $this->cod_avail,
            'car_engine'=> $this->car_engine,
            'car_gear_box'=> $this->car_gear_box,
            'car_mileage'=> $this->car_mileage,
            'car_year'=> $this->car_year,
            'car_color'=> $this->car_color,
            'car_body_type'=> $this->car_body_type,
            'car_fuel_type'=> $this->car_fuel_type,
            'car_ara_con'=> $this->car_ara_con,
            'car_drive_type'=> $this->car_drive_type,
            'car_condition'=> $this->car_condition,
        ];
    }
}
