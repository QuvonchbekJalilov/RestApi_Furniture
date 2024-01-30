<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPhotoRequest extends FormRequest
{
    
    public function authorize()
    {
        return request()->user()->can('product:create');
    }

    
    public function rules()
    {
        return [
            'photos.*' => 'required|mimes:png,jpg,bmp|file|max:4048'
        ];
    }
}
