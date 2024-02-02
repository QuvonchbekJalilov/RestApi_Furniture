<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('discount:create');
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'name' => 'string|nullable',
            'percentage' => 'required_without:sum',
            'sum' => 'required_without:percentage',
            'from' => 'nullable',
            'to' => 'nullable',
        ];
    }
}
