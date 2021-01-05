<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductComplement as ProductComplementResource;

class ComplementProduct extends JsonResource
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
            'ComplementId'      => $this->complement_id,
            'ComplementName'    => $this->complements->name,
            'Products'          => ProductComplementResource::collection($this->products)
        ];
    }
}
