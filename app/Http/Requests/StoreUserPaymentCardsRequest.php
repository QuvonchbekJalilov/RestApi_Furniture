<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPaymentCardsRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            "name"=>"required",
            "number"=>"required",
            "exp_date"=>"required",
            "holder_name"=>"required",
            'payment_card_type_id'=>"required",
        ];
    }
}
