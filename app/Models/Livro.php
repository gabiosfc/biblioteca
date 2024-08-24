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
        'editora_id',  // Alterado para refletir a chave estrangeira
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

    /**
     * Define o relacionamento entre Livro e Editora.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editora()
    {
        return $this->belongsTo(Editora::class);
    }
}
