<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'id'=>$this->admin_id,
            'fullName'=>$this->full_name,
            'userName'=>$this->user_name,
            'email'=>$this->email,
            'phoneNo'=>$this->phone_no,
            'role'=>$this->admin_role,
            'role_label'=>$this->role_label,
            'status'=>$this->admin_status,
            'status_label'=>$this->status_label,
        ];
    }
}
