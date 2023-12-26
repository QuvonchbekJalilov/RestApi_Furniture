<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => [
                'uz' => 'Yangi',
                'ru' => 'Yangi'
            ],
            'code' => 'new',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tasdiqlandi',
                'ru' => 'Tasdiqlandi'
            ],
            'code' => 'confirmed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Ishlanmoqda',
                'ru' => 'Ishlanmoqda'
            ],
            'code' => 'processing',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berilmoqda',
                'ru' => 'Yetkazib berilmoqda'
            ],
            'code' => 'shipping',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berildi',
                'ru' => 'Yetkazib berildi'
            ],
            'code' => 'delivered',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => "To'lov kutilmoqda",
                'ru' => "To'lov kutilmoqda"
            ],
            'code' => 'waiting_payment',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tugatildi',
                'ru' => 'Tugatildi'
            ],
            'code' => 'copleted',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yopildi',
                'ru' => 'Yopildi'
            ],
            'code' => 'closed',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => "To'landi",
                'ru' => "To'landi"
            ],
            'code' => 'paid',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Qaytarib berildi',
                'ru' => 'Qaytarib berildi'
            ],
            'code' => 'refund',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'Bekor qilindi',
                'ru' => 'Bekor qilindi'
            ],
            'code' => 'canceled',
            'for' => 'order'
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'lovda xato',
                'ru' => 'To\'lovda xato'
            ],
            'code' => 'payment_error',
            'for' => 'order'
        ]);
    }
}
