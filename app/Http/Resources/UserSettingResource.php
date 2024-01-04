<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSettingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'setting' => $this->setting,
            'value' => $this->value,
            'switch' => $this->switch == null ? null : (bool)$this->switch,

        ];
    }
}
