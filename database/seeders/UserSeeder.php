<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  User::create([
            "first_name"=> "Admin",
            "last_name"=> "Admin",
            "email"=> "admin@gmail.com",
            "phone"=> "+998935889114",
            "password"=> Hash::make("secret"),
        ]);

        $admin->roles()->attach(1);

        User::factory()->count(10)->hasAttached([Role::find(2)])->create();
    }
}
