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
        Livro::insert([
            [
                'titulo' => 'Dom Casmurro',
                'autor' => 'Machado de Assis',
                'isbn' => '978-85-359-0277-5',
                'editora' => 'Editora Record',
                'ano_publicacao' => 1899,
                'disponivel' => true,
            ],
            [
                'titulo' => 'O Cortiço',
                'autor' => 'Aluísio Azevedo',
                'isbn' => '978-85-359-0288-1',
                'editora' => 'Editora Record',
                'ano_publicacao' => 1890,
                'disponivel' => true,
            ],
            [
                'titulo' => 'Vidas Secas',
                'autor' => 'Graciliano Ramos',
                'isbn' => '978-85-359-0299-7',
                'editora' => 'Editora Record',
                'ano_publicacao' => 1938,
                'disponivel' => false,
            ],
            [
                'titulo' => 'Memórias Póstumas de Brás Cubas',
                'autor' => 'Machado de Assis',
                'isbn' => '978-85-359-0300-0',
                'editora' => 'Editora Globo',
                'ano_publicacao' => 1881,
                'disponivel' => true,
            ],
            [
                'titulo' => 'Grande Sertão: Veredas',
                'autor' => 'João Guimarães Rosa',
                'isbn' => '978-85-359-0311-6',
                'editora' => 'Nova Fronteira',
                'ano_publicacao' => 1956,
                'disponivel' => false,
            ],
            [
                'titulo' => 'O Guarani',
                'autor' => 'José de Alencar',
                'isbn' => '978-85-359-0322-2',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1857,
                'disponivel' => true,
            ],
            [
                'titulo' => 'Iracema',
                'autor' => 'José de Alencar',
                'isbn' => '978-85-359-0333-9',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1865,
                'disponivel' => true,
            ],
            [
                'titulo' => 'Senhora',
                'autor' => 'José de Alencar',
                'isbn' => '978-85-359-0344-6',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1875,
                'disponivel' => false,
            ],
            [
                'titulo' => 'Capitães da Areia',
                'autor' => 'Jorge Amado',
                'isbn' => '978-85-359-0355-3',
                'editora' => 'Companhia das Letras',
                'ano_publicacao' => 1937,
                'disponivel' => true,
            ],
            [
                'titulo' => 'A Moreninha',
                'autor' => 'Joaquim Manuel de Macedo',
                'isbn' => '978-85-359-0366-0',
                'editora' => 'Editora Ática',
                'ano_publicacao' => 1844,
                'disponivel' => true,
            ],
        ]);
    }
}
