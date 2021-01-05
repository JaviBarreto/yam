<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'imagename' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'price' => 'required',
            'calories' => 'required',
            'remarks' => 'required',
            'weight' => 'required',
            'isonlycompliment' => 'required',
            'status' => 'required'
        ];
    }
}

