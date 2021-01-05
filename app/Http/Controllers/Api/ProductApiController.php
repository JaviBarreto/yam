<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{

    public function GetProductList(Request $request)
    {
        if ($request->has('CategoryId')) {
            $product = Product::select(['id as ProductId', 'name as Name', 'price as Price',
                'imagename as ImageName', 'status as IsNew'])
                ->where('category_id', $request->CategoryId)
                ->notComplement()
                ->active()
                ->paginate(20);
        } else {
            $product = Product::select(['id as ProductId', 'name as Name', 'price as Price',
                'imagename as ImageName', 'status as IsNew'])
                ->notComplement()
                ->active()
                ->paginate(20);
        }

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ['ProductList' => $product],
        ]);

    }

    public function SearchProduct(Request $request)
    {

        if ($request->has('ProductName')) {
            $product = Product::select(['id as ProductId', 'name as Name',
                'imagename as ImageName', 'status as IsNew'])
                ->where('name', 'like', '%' . $request->ProductName . '%')
                ->notComplement()
                ->active()
                ->paginate(20);
        } else {
            $product = Product::select(['id as ProductId', 'name as Name',
                'imagename as ImageName', 'status as IsNew'])
                ->notComplement()
                ->active()
                ->paginate(20);
        }

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ['ProductList' => $product],
        ]);

    }

    public function GetProductDetail(Request $request)
    {

        if ($request->has('ProductId')) {
            $product = Product::with('complementproduct')
                ->where('id', $request->ProductId)
                ->notComplement()
                ->active()
                ->get();
        } else {
            return response()->json([
                'Message' => 'Ingrese el Id del Producto',
                'Status' => 404,
            ]);
        }

        $product = ProductResource::collection($product);

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => $product,
        ]);
    }

    public function GetAllOffer()
    {
        $alloffer = DB::table('products')->join('offers', 'offers.product_id', 'products.id')
            ->select('products.id as ProductId', 'offers.id as OfferId', 'products.name as ProductName',
                'products.imagename as ProductImage', 'products.status as IsNew')
            ->where('products.status', 1)
            ->where('products.isonlycompliment', 0)
            ->get();

        return response()->json([
            'Message' => 'Message Here...',
            'Status' => 200,
            'Result' => ['ProductList' => $alloffer],
        ]);
    }

}
