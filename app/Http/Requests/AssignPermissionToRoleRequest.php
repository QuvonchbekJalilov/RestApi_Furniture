<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionToRoleRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->user()->can('permission:assign');
    }

    
    public function rules()
    {
        return [
            'permission_id' => 'required',
            'role_id' => 'required',
        ];
    }
}
