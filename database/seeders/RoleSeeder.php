<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Pemilik',
                'guard_name' => 'web',
                'created_at' => '2023-01-16 18:29:49',
                'updated_at' => '2023-01-16 18:29:49',
            ],
            [
                'id' => 2,
                'name' => 'Pencari',
                'guard_name' => 'web',
                'created_at' => '2023-01-16 18:29:49',
                'updated_at' => '2023-01-16 18:29:49',
            ],
            [
                'id' => 3,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2023-01-16 18:29:49',
                'updated_at' => '2023-01-16 18:29:49',
            ],
        ]);
    }
}
