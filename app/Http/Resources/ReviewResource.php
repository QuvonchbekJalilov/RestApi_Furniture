<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rating' => $this->rating,
            'body' => $this->body,
            'product_id' => $this->product_id,
            'user' => $this->user,
            'created_at' => $this->created_at,
        ];
    }
}
