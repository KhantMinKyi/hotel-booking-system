<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => bcrypt('password'),
            'dob' => '1999-06-28',
            'type' => 'user',
            'address' => 'address',
            'nrc' => '12/PABATA(N)456456',
            'gender' => 'male',
            'phone' => '1234567890',
        ]);
    }
}
