<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
  
    public function authorize()
    {
        return auth()->user()->can('role:create');
    }

    
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name'
        ];
    }
}
