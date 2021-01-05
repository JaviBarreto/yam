<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Offer extends JsonResource
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
            'ProductId'     => $this->products->id,
            'OfferId'       => $this->id,
            'ProductName'   => $this->products->name,
            'ProductImage'  => Storage::disk('public')->url($this->products->imagename),
            'Price'         => $this->products->price,
            'IsNew'         => $this->products->status

        ];
    }
}
