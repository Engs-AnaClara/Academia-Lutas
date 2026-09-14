<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'idade',
        'endereco',
        'modalidade_id',
    ];

    public function modalidade(): BelongsTo
    {
        return $this->belongsTo(Modalidade::class);
    }
}