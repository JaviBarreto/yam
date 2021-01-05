<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;

class StoreApiController extends Controller
{
    public function GetStore(Request $request)
    {
        if ($request->has('OderId')) {
            $store = DB::table('stores')->join('orders', 'orders.store_id', '=', 'stores.id')
                ->where('orders.order_id', $request->OrderId)
                ->select('stores.id as StoreId', 'stores.name as StoreName')
                ->get();
        } else {
            $store = DB::table('stores')->join('orders', 'orders.store_id', '=', 'stores.id')
                ->select('stores.id as StoreId', 'stores.name as StoreName')
                ->get();
        }

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => array('Stores' => $store),
        ]);
    }

    public function GetBusinessStore()
    {

        $store = Order::join('stores', 'stores.id', 'orders.store_id')
            ->join('addresses', 'addresses.id', 'orders.address_id')
            ->join('order_products', 'order_products.order_id', 'orders.id')
            ->join('products', 'products.id', 'order_products.product_id')
            ->select(['stores.id as Id', 'stores.name as Name', 'products.imageName as ImageName',
                'addresses.name as AddressName', 'addresses.fieldstreetaddress as StreetAdress', 'addresses.houseno as HouseNo',
                'addresses.floorno as addresses.FloorNo', 'addresses.city as City', 'addresses.buildingtype as BuilingType',
                'addresses.latitude as Latitude', 'addresses.longitude as Longitude', 'stores.phonenumber as PhoneNumber'])
            ->get();

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'StoreList' => $store,
        ]);
    }
}
