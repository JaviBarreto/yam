<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'Latitude'              => 'required|numeric',
            'Longitude'             => 'required|numeric',
            'AddressName'           => 'required',
            'StreetAddress'         => 'required',
            'FloorNo'               => 'required',
            'HouseNo'               => 'required',
            'ZipCode'               => 'required',
            'City'                  => 'required', 
            'State'                 => 'required',
            'BuildingType'          => 'required',
            'District'              => 'required'
        ];
    }

    public function messages()
    {
        return
            [
            'Latitude.required' => 'Debe proporcionar una Latitude.',
            'Longitude.required' => 'Debe proporcionar una Longitude.',
            'Latitude.numeric' => 'Los datos deben ser numericos.',
            'Longitude.numeric' => 'Los datos deben ser numericos.',
            'AddressName.required' => 'Debe proporcionar el Nombre de la Dirección.',
            'StreetAddress.required' => 'Debe proporcionar una dirección.',
            'FloorNo.required' => 'Debe proporcionar el Número de piso',
            'HouseNo.required' => 'Debe proporcionar el Número de la casa',
            'ZipCode.required' => 'Ingrese el número postal',
            'City.required' => 'Por favor ingrese la Ciudad',
            'State.required' => 'Por favor ingrese el Estado',
            'BuildingType.required' => 'Por favor ingrese el tipo de construcción',
            'District.required' => 'Ingrese el distrito'
        ];
    }

}
