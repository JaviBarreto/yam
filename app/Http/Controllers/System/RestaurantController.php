<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    
    public function index()
    {
        return Restaurant::all();
        
    }

    public function store(RestaurantRequest $request)
    {
        $input = $request->all();

        Restaurant::create($input);

        return response()->json([ 'res' => true, 'message' => 'Successful registration'], 200 );
    }

    public function show(Restaurant $restaurant)
    {
        return $restaurant;
    }
 
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $input = $request->all();

        $restaurant->update($input);

        return response()->json([ 'res' => true, 'message' => 'Successful update' ], 200 );
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return response()->json([ 'res' => true, 'message' => 'Successful removal' ], 200 );
        
    }
}
