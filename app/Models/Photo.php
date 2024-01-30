<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    //protected $fillable = [
    //    'full_name',
    //    'path'
    //];

    protected $guarded = [];
    public function photoable(){
        return $this->morphTo();
    }
}
