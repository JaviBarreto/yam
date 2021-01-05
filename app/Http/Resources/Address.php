<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Address extends JsonResource
{
    
    public function toArray($request)
    {
        return
        [
            'AddressId'         => $this->id, 
            'AddressNickName'   => $this->name,
            'Address'           => $this->fieldstreetaddress,
            'Floor'             => $this->floorno,
            'ApartmentNumber'   => $this->houseno,
            'BuildingType'      => $this->buildingtype,
            'Latitude'          => $this->latitude,
            'Longitude'         => $this->longitude,
        ];
    }
}
