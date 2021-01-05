<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderAddress extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'StreetAddress' => $this->addresses->fieldstreetaddress,
            'AddressName'   => $this->addresses->name,
            'HouseNo'       => $this->addresses->houseno,
            'FloorNo'       => $this->addresses->floorno,
            'ZipCode'       => $this->addresses->zipcode
        ];
    }
}
