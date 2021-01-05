<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ComplementProduct as ComplementProductResource;

class Product extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'ProductId'          => $this->id,
            'Name'               => $this->name,
            'Remarks'            => $this->remarks,
            'Price'              => $this->price,
            'ImageName'          => Storage::disk('public')->url($this->imagename),
            'IsNew'              => $this->status,
            'ProductComplements' => ComplementProductResource::collection($this->whenLoaded('complementproduct')),
        ];
    }
}
