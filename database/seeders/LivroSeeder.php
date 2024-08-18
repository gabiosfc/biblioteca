<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livros = [
            [
                'titulo' => 'Dom Casmurro',
                'autor' => 'Machado de Assis',
                'isbn' => '978-85-359-0277-5',
                'editora' => 'Editora Record',
                'ano_publicacao' => 1899,
                'quantidade_disponivel' => 5,
            ],
            [
                'titulo' => 'O Cortiço',
                'autor' => 'Aluísio Azevedo',
                'isbn' => '978-85-359-0288-1',
                'editora' => 'Editora Record',
                'ano_publicacao' => 1890,
                'quantidade_disponivel' => 5,
            ],
            [
                'titulo' => 'Vidas Secas',
                'autor' => 'Graciliano Ramos',
                'isbn' => '978-85-359-0299-7',
                'editora' => 'Editora Record',
                'ano_publicacao' => 1938,
                'quantidade_disponivel' => 5,
            ],
            [
                'titulo' => 'Memórias Póstumas de Brás Cubas',
                'autor' => 'Machado de Assis',
                'isbn' => '978-85-359-0300-0',
                'editora' => 'Editora Globo',
                'ano_publicacao' => 1881,
                'quantidade_disponivel' => 5,
            ],
            [
                'titulo' => 'Grande Sertão: Veredas',
                'autor' => 'João Guimarães Rosa',
                'isbn' => '978-85-359-0311-6',
                'editora' => 'Nova Fronteira',
                'ano_publicacao' => 1956,
                'quantidade_disponivel' => 7,
            ],
            [
                'titulo' => 'O Guarani',
                'autor' => 'José de Alencar',
                'isbn' => '978-85-359-0322-2',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1857,
                'quantidade_disponivel' => 1,
            ],
            [
                'titulo' => 'Iracema',
                'autor' => 'José de Alencar',
                'isbn' => '978-85-359-0333-9',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1865,
                'quantidade_disponivel' => 2,
            ],
            [
                'titulo' => 'Senhora',
                'autor' => 'José de Alencar',
                'isbn' => '978-85-359-0344-6',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1875,
                'quantidade_disponivel' => 3,
            ],
            [
                'titulo' => 'Capitães da Areia',
                'autor' => 'Jorge Amado',
                'isbn' => '978-85-359-0355-3',
                'editora' => 'Companhia das Letras',
                'ano_publicacao' => 1937,
                'quantidade_disponivel' => 10,
            ],
            [
                'titulo' => 'A Moreninha',
                'autor' => 'Joaquim Manuel de Macedo',
                'isbn' => '978-85-359-0366-0',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1844,
                'quantidade_disponivel' => 5,
            ],
        ];
        foreach ($livros as $livro) {
            Livro::updateOrCreate(
                ['isbn' => $livro['isbn']],
                $livro
            );
        }
    }
}
