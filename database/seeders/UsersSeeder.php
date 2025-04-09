<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('pemilik123'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'Pemilik'
        ]);
    }
}
