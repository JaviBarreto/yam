<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Throwable;

class AddressApiController extends Controller
{

    public function GetAddress()
    {
        $user = auth()->user();

        $address = Address::select(['id as AddressId', 'name as AddressName', 'fieldstreetaddress as StreetName', 'houseno as HouseNo',
            'zipcode as Zipcode', 'latitude as Latitude', 'longitude as Longitude', 'isdefault as IsDefault'])
            ->where('user_id', $user->id)
            ->get();

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ['AddressList' => $address],
        ]);

    }

    public function AddUserAddress(AddressRequest $request)
    {
        $user = auth()->user();

        Address::create(
            array_merge([
                'latitude' => $request->Latitude,
                'longitude' => $request->Longitude,
                'name' => $request->AddressName,
                'fieldstreetaddress' => $request->StreetAddress,
                'floorno' => $request->FloorNo,
                'houseno' => $request->HouseNo,
                'zipcode' => $request->ZipCode,
                'city' => $request->City,
                'state' => $request->State,
                'isdefault' => $request->IsDefault,
                'buildingtype' => $request->BuildingType,
                'district' => $request->District,
                'user_id' => $user->id,
            ]));

        return response()->json(['Message' => 'Successful registration', "Status" => 200]);

    }

    public function RemoveAddress(Request $request)
    {
        $user = auth()->user();

        if ($request->has('AddressId')) {
            try
            {
                $address = Address::where('user_id', $user->id)->find($request->AddressId);
                $address->delete();
            } catch (Throwable $th) {
                return response()->json(['Message' => 'No puedes eliminar esta dirección', "Status" => 404, "Error" => $th->getMessage()]);
            }

            return response()->json(['Message' => 'Successful removal', "Status" => 200]);
        } else {
            return response()->json(['Error' => 'Ingrese la dirección a eliminar', "Status" => 404]);
        }

    }
}
