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
        $user =  User::create([
            "first_name"=> "Admin",
            "last_name"=> "Admin",
            "email"=> "admin@gmail.com",
            "phone"=> "+998935889114",
            "password"=> Hash::make("secret"),
        ]);
        $user->assignRole("admin");

        $user =  User::create([
            "first_name"=> "Quvonchbek",
            "last_name"=> "Jalilov",
            "email"=> "jalilovquvonchbek@gmail.com",
            "phone"=> "+998935889115",
            "password"=> Hash::make("secret"),
        ]);
        $user->assignRole('customer');

        $user =  User::create([
            "first_name"=> "Sanjar",
            "last_name"=> "Jo'rayev",
            "email"=> "sanjar@gmail.com",
            "phone"=> "+998935669115",
            "password"=> Hash::make("secret"),
        ]);
        $user->assignRole('shop-manager');

        $user =  User::create([
            "first_name"=> "Komila",
            "last_name"=> "Jo'rayeva",
            "email"=> "Komila@gmail.com",
            "phone"=> "+998935769115",
            "password"=> Hash::make("secret"),
        ]);
        $user->assignRole('helpdesk-support');
        
        $user =  User::create([
            "first_name"=> "Sherali",
            "last_name"=> "Jalilov",
            "email"=> "jalilov5@gmail.com",
            "phone"=> "+998935889116",
            "password"=> Hash::make("secret"),
        ]);
        $user->assignRole('editor');

        $users = User::factory()->count(10)->create();
        foreach($users as $user){
            $user->assignRole('customer');
        }
    }
}
