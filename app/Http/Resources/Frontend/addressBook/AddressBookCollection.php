<?php

namespace App\Http\Resources\Frontend\addressBook;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressBookCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\Frontend\addressBook\AddressBookResource';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=> $this->collection
        ];
    }
}