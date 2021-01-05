<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreCollection;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return Store::with(['restaurant'])->get();
    }

    public function store(StoreRequest $request)
    {
        $input = $request->all();

        Store::create($input);

        return response()->json([ 'res' => true, 'message' => 'Successful registration'], 200 );
    }

    public function show(Store $store)
    {
        return $store->load(['restaurant']);
    }

    public function update(StoreRequest $request, Store $store)
    {
        $input = $request->all();

        $store->update($input);

        return response()->json([ 'res' => true, 'message' => 'Successful update' ], 200 );
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return response()->json([ 'res' => true, 'message' => 'Successful removal' ], 200 );
    }

}
