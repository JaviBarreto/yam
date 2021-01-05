<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductOrder as ProductOrderResource;
use App\Http\Resources\Address as AddressResource;

class OrderDetail extends JsonResource
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
            'DeliveryCharge' => $this->delivery,
            'Total' => $this->Total,
            'Price' => $this->price,
            'Products'         => new ProductOrderResource($this->products),
            'OrderType'   => $this->ordertype,
            'Address' => new AddressResource($this->products),
            'OderDate'      => $this->orders->starttime,
            'OrderStatus'   => $this->orderstatus
        ];
    }
}
