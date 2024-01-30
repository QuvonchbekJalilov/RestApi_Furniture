<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'photo' => 'nullable|mimes:jpg,png,bmp|file|max:1000',
        ];
    }
}
