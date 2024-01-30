<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPaymentCardResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => decrypt($this->name),
            "number" => "************".decrypt($this->last_four_numbers),
            "card_type" => $this->type,
        ];
    }
}
