<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Kevin Petersen",
            'email' => "KevinPetersen123@gmail.com"
        ]);

        User::create([
            'name' => "Komi Shouko",
            'email' => "KomiShouko@gmail.com"
        ]);

        User::create([
            'name' => "Testing123",
            'email' => "Testing123@gmail.com"
        ]);
    }
}
