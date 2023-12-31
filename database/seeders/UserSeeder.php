<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(['name' => 'Administrador', 'email' => 'admin@correo.com',
        'password' => Hash::make('12345678'), 'email_verified_at' => date('Y-m-d H:m:s'),]);
    }
}
