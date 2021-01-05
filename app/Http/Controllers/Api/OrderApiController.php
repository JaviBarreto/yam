<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderUpdate;
use App\Http\Resources\CurrentOrder;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderDetail as OrderDetailResource;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Throwable;

class OrderApiController extends Controller
{

    public function PlaceOrder(OrderRequest $request)
    {
        $user = auth()->user();

        Order::create(
            array_merge([
                'ordertype'     => $request->OrderType,
                'paymentmethod' => $request->PaymentMethod,
                'orderstatus'   => $request->CardType,
                'address_id'    => $request->AddressId,
                'user_id'       => $user->id,
            ]));

        return response()->json([
            'Message' => 'Successful registration',
            'Status' => 200,
        ]);
    }

    public function AddOrderDetail(OrderUpdate $request)
    {
        Order::find($request->OrderId)->update([
            'ordertype'     => $request->OrderType,
            'store_id'      => $request->StoreId,
            'starttime'     => $request->StartTime,
            'endtime'       => $request->EndTime,
            'address_id'    => $request->AddressId,
        ]);

        $order = Order::with('orderproducts')->where('id', $request->OrderId)->get();

        $order = OrderResource::collection($order);

        return response()->json([
            'Message' => 'Successful registration',
            'Status' => 200,
            'Result' => ["TypeOfOrder" => $order],
        ]);

    }

    public function GetCurrentOrder(Request $request)
    {
        $id = Auth::user()->id;

        $order = OrderProduct::join('orders', 'orders.id', 'order_products.order_id')
            ->where('user_id', $id)
            ->get();

        $order = CurrentOrder::collection($order);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ["TypeOfOrder" => $order],
        ]);

    }

    public function CancelOrder(Request $request)
    {
        if ($request->has('OrderId')) {
            try
            {
                $id = Auth::user()->id;
                $order = Order::where('user_id', $id)->find($request->OrderId);
                $order->delete();

            } catch (Throwable $th) {
                return response()->json(['Message' => 'No puedes eliminar esta Orden', "Status" => 404, "Error" => $th->getMessage()]);
            }
            return response()->json(['Message' => 'Successful removal', "Status" => 200]);
        } else {
            return response()->json(['Error' => 'Ingrese la Orden a eliminar', "Status" => 404]);
        }

    }

    public function GetOrderDetail(Request $request)
    {
        $id = Auth::user()->id;

        $orderid = $request->OrderId;

        $order = OrderProduct::with( ['orders','products'])
        ->where('order_id', $orderid)
        ->get();

        $order = OrderDetailResource::collection($order);

        return response()->json([
            'Message' => 'Successful registration',
            'Status' => 200,
            'Result' => $order
        ]);

    }

}
