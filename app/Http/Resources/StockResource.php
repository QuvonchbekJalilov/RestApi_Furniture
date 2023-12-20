<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    
    public function toArray($request)
    {
        $result =  [
            'stock_id' => $this->id,
            "quantity" => $this->quantity
        ];

        return $this->getAttributes($result);
    }

    public function getAttributes($result)
    {
        $attributes = json_decode($this->attributes);

        foreach ($attributes as $stockattribute) {
            $attribute = Attribute::find($stockattribute->attribute_id);
            $value = Value::find($stockattribute->value_id);

            $result[$attribute->name] = $value->getTranslations('name');
        }

        return $result;
    }
}
