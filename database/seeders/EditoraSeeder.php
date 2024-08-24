<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editora;

class EditoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editoras = [
            ['nome' => 'Editora Record'],
            ['nome' => 'Editora Globo'],
            ['nome' => 'Nova Fronteira'],
            ['nome' => 'Editora Ática'],
            ['nome' => 'Companhia das Letras'],
        ];

        foreach ($editoras as $editora) {
            Editora::updateOrCreate(
                ['nome' => $editora['nome']],
                $editora
            );
        }
    }
}
