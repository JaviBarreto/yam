<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderAddress;
use App\Http\Resources\ProductOrder;


class CurrentOrder extends JsonResource
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
            'OrderId'       => $this->orders->id,
            'OrderNumber'   => $this->id,
            'Delivery'      => $this->delivery,
            'Price'         => $this->price,
            'Total'         => $this->total,
            'Products'      => new ProductOrder($this->products),
            'OrderType'     => $this->orders->ordertype,
            'Address'       => new OrderAddress($this->orders)
        ];
    }
}
