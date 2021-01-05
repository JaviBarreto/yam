<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductComplement extends JsonResource
{

    public function toArray($request)
    {
        return [
            'ProductId'     => $this->product_id,
            'Name'          => $this->products->name,
            'Price'         => $this->products->price,
            'IsSelected'    => $this->products->status,
            'IsMendatory'   => $this->ismendatory,
            'Multiselect'   => $this->multiselect
        ];
    }
}
