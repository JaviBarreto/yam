<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\Faq as FaqResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductComplement as ProductComplementResource;
use App\Http\Resources\ComplementProduct as ComplementProd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faq;
use App\Models\Product;
use App\Models\ComplementProduct;
use App\Models\ProductComplement;

class TestApiController extends Controller
{
      public function test(Request $request)
    {
        $order = Order::with('complementproduct')
            ->where('id', $request->ProductId)
            ->notComplement()
            ->active()
            ->get();

        $product = ProductResource::collection($product);
        
        return $product;

    }
}
