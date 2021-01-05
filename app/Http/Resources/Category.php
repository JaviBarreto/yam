<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Category extends JsonResource
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
            'CategoryId'    => $this->id,
            'Name'          => $this->name,
            'ImageName'     => Storage::disk('public')->url($this->imagename),
        ];
    }
}
