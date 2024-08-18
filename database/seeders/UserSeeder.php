<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Inserir ou atualizar UserA
        User::updateOrCreate(
            ['email' => 'usera@example.com'], // Condição para encontrar o registro
            [
                'name' => 'UserA',
                'password' => Hash::make('usera'), // Atualiza a senha
            ]
        );

        // Inserir ou atualizar UserB
        User::updateOrCreate(
            ['email' => 'userb@example.com'],
            [
                'name' => 'UserB',
                'password' => Hash::make('userb'),
            ]
        );
    }
}
