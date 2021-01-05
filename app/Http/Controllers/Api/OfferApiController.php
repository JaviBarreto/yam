<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Offer as OfferResource;
use App\Models\Offer;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OfferApiController extends Controller
{
    public function GetDashboardOffer()
    {
        $pending = OrderProduct::whereHas('orders', function (Builder $query) {
            $id = Auth::user()->id;
            $query->where([['user_id', '=', $id], ['endtime', '<>', null]]);
        })
            ->get();

        foreach ($pending as $p) {
            Offer::with(['products'])
                ->where('product_id', $p->product_id)
                ->get();
        }

        $pending = OfferResource::collection($pending);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ['IsPendingOrder' => 0, "ProductList" => $pending],
        ]);

    }
}
