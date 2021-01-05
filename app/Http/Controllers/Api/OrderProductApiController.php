<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderProduct as OrderProductResource;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderProductApiController extends Controller
{

    public function GetOrderHistory()
    {
        $pending = OrderProduct::whereHas('orders', function (Builder $query) {
            $id = Auth::user()->id;
            $query->where([['user_id', '=', $id], ['endtime', '=', null]]);
        })
            ->get();

        $completed = OrderProduct::whereHas('orders', function (Builder $query) {
            $id = Auth::user()->id;
            $query->where([['user_id', '=', $id], ['endtime', '<>', null], ['starttime', '<>', null]]);
        })
            ->get();

        $pending = OrderProductResource::collection($pending);

        $completed = OrderProductResource::collection($completed);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'PendingOrder' => $pending,
            'CompletedOrder' => $completed,
        ]);

    }

    public function UpdateItemQuantity(Request $request, OrderProduct $orderproduct)
    {

        $orderproduct = OrderProduct::whereHas('orders', function (Builder $query) {
            $user = auth()->user();
            $query->where('user_id', $user->id);
        });

        $orderproduct->update([
            "quantity" => $request->quantity,
        ]);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
        ]);

    }
}
