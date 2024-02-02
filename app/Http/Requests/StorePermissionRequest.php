<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->user()->can('permission:create');
    }

    
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}
