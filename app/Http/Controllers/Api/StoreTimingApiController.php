<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreTiming;
use Illuminate\Http\Request;

class StoreTimingApiController extends Controller
{

    public function GetStoreTiming(Request $request)
    {
        if ($request->has('StoreId')) {
            $storetiming = StoreTiming::where('id', 'like', '%' . $request->storeid . '%')
                ->select('starttime as StarTime', 'endtime as EndTime')
                ->get();
        } else {
            $storetiming = StoreTiming::select('starttime as StarTime', 'endtime as EndTime')->get();
        }

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => $storetiming,
        ]);
    }
}
