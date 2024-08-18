<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'user_id',
        'data_emprestimo',
        'data_devolucao',
        'multa',
    ];

    /**
     * Define o relacionamento entre Emprestimo e Livro.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
