<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignRoleToUserRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->user()->can('role:assign');
    }

    
    public function rules()
    {
        return [
            'user_id' => 'required',
            'role_id' => 'required',
        ];
    }
}
