<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'latitude' => 'required',
            'longitude' => 'required',
            'region' => 'required',
            'district' => 'required',
            'street' => 'required',
            'home' => 'nullable',
        ];
    }
}
