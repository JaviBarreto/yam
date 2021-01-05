<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Address as AddressResource;
use Illuminate\Support\Facades\Storage;

class User extends JsonResource
{

    public function toArray($request)
    {
        return
        [
            'UserId'             => $this->id,
            'PhoneNumber'        => $this->phonenumber,
            'FirstName'          => $this->firstname,
            'LastName'           => $this->lastname,
            'DNI'                => $this->dninumber,
            'Email'              => $this->email,
            'IsCompleteProfile'  => $this->floorno,
            'ImageName'          => Storage::disk('public')->url($this->profileimage),
            'Address'            => AddressResource::collection($this->whenLoaded('address')),          
        ];
    }
}
