<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Validator;

class ProductController extends Controller
{

    public function index()
    {
       $product = Product::with(['categories', 'stores'])->paginate(5);

       return view('product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::select('id','name')->get();
        $store = Store::select('id','name')->get();

        return view('product.create', compact('category','store'));
    }

    public function edit(Product $product)
    {
        $category = Category::select('id','name')->get();
        $store = Store::select('id','name')->get();

        return view('product.edit', compact('product', 'category', 'store'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required',
            'imagename' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'price' => 'required',
            'calories' => 'required',
            'remarks' => 'required',
            'weight' => 'required'
            ];
        $messages = [
            'name.required'   => 'Campo requerido',
            'imagename.required'   => 'Campo requerido',
            'category_id.required'   => 'Campo requerido',
            'store_id.required'   => 'Campo requerido',
            'price.required'   => 'Campo requerido',
            'calories.required'   => 'Campo requerido',
            'remarks.required'   => 'Campo requerido',
            'weight.required'   => 'Campo requerido'
            ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {

            return redirect('product/create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('imagename')) {

        $input['imagename'] = $request->imagename->store('img_product', 'public');

        }

        Product::create($input);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->with(['categories', 'stores']);

        return view('product.show', compact('product'));

    }

    public function update(Request $request, Product $product)
    {

        $input = $request->all();

        $rules = [
            'name' => [
                'required',
                Rule::unique('products','name')->ignore($product->id),
            ],
            'imagename' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'price' => 'required',
            'calories' => 'required',
            'remarks' => 'required',
            'weight' => 'required'
            ];
        $messages = [
            'name.required'   => 'Campo requerido',
            'name.unique'   => 'Este dato ya existe en los registros guardados',
            'imagename.required'   => 'Campo requerido',
            'category_id.required'   => 'Campo requerido',
            'store_id.required'   => 'Campo requerido',
            'price.required'   => 'Campo requerido',
            'calories.required'   => 'Campo requerido',
            'remarks.required'   => 'Campo requerido',
            'weight.required'   => 'Campo requerido'
            ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {

            return redirect('product/'.$product->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('imagename')) {

            Storage::delete($product->imagename);

            $product->imagename = $request->imagename->store('img_product', 'public');
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->store_id = $request->store_id;
        $product->price = $request->price;
        $product->calories = $request->calories;
        $product->remarks = $request->remarks;
        $product->weight = $request->weight;
        $product->isonlycompliment = $request->isonlycompliment;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->imagename);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Successful removal.');
    }

}
