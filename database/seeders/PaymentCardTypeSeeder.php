<?php

namespace Database\Seeders;

use App\Models\PaymentCardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentCardType::create([
            'name' => 'uzcard',
            'code' => 'uzcard',
            'icon' => 'uzcard',
        ]);

        PaymentCardType::create([
            'name' => 'humo',
            'code' => 'humo',
            'icon' => 'humo',
        ]);

        PaymentCardType::create([
            'name' => 'visa',
            'code' => 'visa',
            'icon' => 'visa',
        ]);
    }
}
