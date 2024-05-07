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
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'dob' => '1999-06-28',
            'type' => 'admin',
            'address' => 'address',
            'nrc' => '12/PABATA(N)123123',
            'gender' => 'male',
            'phone' => '1234567890',
        ]);
    }
}
