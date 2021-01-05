<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Faq extends JsonResource
{
    public static $wrap = 'QuestionList';

    public function toArray($request)
    {
        return [
            'QuestionId' => $this->id,
            'Question' => $this->question,
            'Aswer' => $this->answer
        ];
    }
    
}
