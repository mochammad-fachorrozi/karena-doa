<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Andre',
                'email' => 'andre@gmail.com',
                'password' => Hash::make('pantiK4123N4!!'),
                'role' => 1,
            ],
            [
                'name' => 'Rozi',
                'email' => 'rozi@gmail.com',
                'password' => Hash::make('pantiK4123N4!!'),
                'role' => 1,
            ]
        ]);
    }
}
