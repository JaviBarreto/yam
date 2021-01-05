<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class OrderProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'OrderID'       => $this->orders->id,
            'OrderNumber'   => $this->id,
            'OrderStatus'   => $this->orders->orderstatus,
            'ImageName'     => Storage::disk('public')->url($this->products->imagename),
            'OderDate'      => $this->orders->starttime,
        ];
    }
}
