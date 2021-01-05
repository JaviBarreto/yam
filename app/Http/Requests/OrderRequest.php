<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'OrderId'       => 'required',
            'StoreId'       => 'nullable',
            'OrderType'     => 'required',
            'CardType'      => 'required',
            'PaymentMethod' => 'required',
            'StartTime'     => 'nullable',
            'EndTime'       => 'nullable',
            'AddressId'     => 'required',
        ];
    }

    public function messages()
    {
        return
            [
            'OrderType.required' => 'Indica el tipo de Orden.',
            'CardType.required' => 'Debe proporcionar el tipo de Tarjeta.',
            'PaymentMethod.required' => 'Por favor indique un método de pago.',
            'AddressId.required' => 'Debe ingresar una dirección.',
        ];
    }
}
