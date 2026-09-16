<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Instrutor',
            'email' => 'instrutor@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'instrutor',
        ]);

        User::create([
            'name' => 'Aluno',
            'email' => 'usuario@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'aluno',
        ]);
    }
}