<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'contactnumber' => 'required',
            'email' => 'required',
            'phonenumber' => 'required'
        ];
    }
}
