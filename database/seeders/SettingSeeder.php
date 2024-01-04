<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'name' => [
                'uz' => 'Til',
                'ru' => 'Language'
            ],
            'type' => SettingType::SELECT,

        ]);

        $setting->values()->create([
            'name' => [
                'uz' => "O'zbekcha",
                'ru' => "O'zbekcha"
            ]
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => "Ruscha",
                'ru' => "Ruscha"
            ]
        ]);


        $setting = Setting::create([
            'name' => [
                'uz' => 'Pul birligi',
                'ru' => 'Pul birligi'
            ],
            'type' => SettingType::SELECT,

        ]);

        $setting->values()->create([
            'name' => [
                'uz' => "So'm",
                'ru' => "Sum"
            ]
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => "Dollar",
                'ru' => "Dollar"
            ]
        ]);



        $setting = Setting::create([
            'name' => [
                'uz' => 'Dark Mode',
                'ru' => 'Dark Mode ru'
            ],
            'type' => SettingType::SWITCH,

        ]);

        $setting = Setting::create([
            'name' => [
                'uz' => 'Xabarnomalar',
                'ru' => 'Xabarnomalar ru'
            ],
            'type' => SettingType::SWITCH,

        ]);

        

        
    }
}
