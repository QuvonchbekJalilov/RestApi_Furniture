<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->user()->can('category:create');
    }

    
    public function rules()
    {
        return [
            'parent_id' => 'nullable',
            'name' => 'required|unique:categories,name',
            'icon' => 'nullable',
            'order' => 'nullable'
        ];
    }
}
