<?php

namespace App\Models;

use Hamcrest\Core\Set;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }

    public function value()
    {
        return $this->belongsTo(Value::class);
    }
}
