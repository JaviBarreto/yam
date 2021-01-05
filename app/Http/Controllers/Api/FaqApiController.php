<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqTopic as FaqTopicResource;
use App\Models\FaqTopic;

class FaqApiController extends Controller
{

    public function GetFrequentlyQuestion()
    {
        $faqs = FaqTopic::with('faqs')->get();

        $faqs = FaqTopicResource::collection($faqs);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ["QuestionCategory" => $faqs],
        ]);
    }

}
