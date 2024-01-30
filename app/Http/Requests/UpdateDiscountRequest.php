<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'string|nullable',
            'percentage' => 'required_without:sum',
            'sum' => 'required_without:percentage',
            'from' => 'nullable',
            'to' => 'nullable',
        ];
    }
}
