<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear el usuario Administrador
        User::create([
            'name' => 'Juanfer Admin',
            'email' => 'admin@mundial.com',
            'password' => Hash::make('123456'),
            'es_admin' => true,
        ]);

        // 2. Crear un usuario normal
        User::create([
            'name' => 'Compañero Regular',
            'email' => 'user@mundial.com',
            'password' => Hash::make('123456'),
            'es_admin' => false,
        ]);
    }
}