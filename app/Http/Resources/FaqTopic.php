<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Faq as FaqResource;

class FaqTopic extends JsonResource
{

    public function toArray($request)
    {
        return [
            'QuestionCategoryId' => $this->id,
            'QuestionCategorytitle' => $this->name,
            'QuestionList' => FaqResource::collection($this->whenLoaded('faqs')),
        ];
    }
}
