<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::find(2)->addresses()->create([
            "latitude"=> "41.310014",
            "longitude" => "69.280742",
            "region" => "Tashkent",
            "district"=> "Mirabad district",
            "street" => "Mingurik street",
            "home" => "666"
        ]);
        User::find(2)->addresses()->create([
            "latitude"=> "41.310014",
            "longitude" => "69.280742",
            "region" => "Tashkent",
            "district"=> "Yashnobod district",
            "street" => "Sho'rtan street",
            "home" => "123"
        ]);
    }
}
