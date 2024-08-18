<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'editora',
        'ano_publicacao',
        'quantidade_disponivel',
    ];
    /**
     * Define o relacionamento entre Livro e Emprestimo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }    
}

