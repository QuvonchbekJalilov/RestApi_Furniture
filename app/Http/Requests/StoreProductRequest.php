<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return request()->user()->can('product:create');
    }

  
    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];
    }
}
