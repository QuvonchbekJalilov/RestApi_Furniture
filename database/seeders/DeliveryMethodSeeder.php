<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    
    public function run()
    {
        DeliveryMethod::create([
            'name' => [
                'uz' => 'tekin',
                'ru' => 'бесплатно'
            ],
            'estimated_time' => [
                'uz' => '5 kun',
                'ru' => 'ru 5 kun',
            ],
            'sum' => 0,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => 'standard',
                'ru' => 'стандартный'
            ],
            'estimated_time' => [
                'uz' => '3 kun',
                'ru' => 'ru 3 kun',
            ],
            'sum' => 0,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => 'tez',
                'ru' => 'быстрый'
            ],
            'estimated_time' => [
                'uz' => '1 kun',
                'ru' => 'ru 1 kun',
            ],
            'sum' => 0,
        ]);
        
    }
}
