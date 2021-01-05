<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::paginate(5);

        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'name'   => 'required|unique:categories',
            'imagename' => 'required'
            ];
        $messages = [
            'name.required'   => 'Campo requerido',
            'name.unique'   => 'Este dato ya existe en los registros guardados',
            'imagename.required' => 'Campo requerido'
            ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {

            return redirect('category/create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('imagename')) {

        $input['imagename'] = $request->imagename->store('img_category', 'public');

        }

        Category::create($input);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');

    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $input = $request->all();

        $rules = [
            'name' => [
                'required',
                Rule::unique('categories','name')->ignore($category->id),
            ],
            'imagename' => 'required'
            ];
        $messages = [
            'name.required'   => 'Campo requerido',
            'name.unique'   => 'Este dato ya existe en los registros guardados',
            'imagename.required' => 'Campo requerido'
            ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {

            return redirect('category/'.$category->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('imagename')) {

            Storage::delete($category->imagename);

            $category->imagename = $request->imagename->store('img_category', 'public');
        }

        $category->name = $request->name;

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->imagename);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Successful removal.');
    }

}
