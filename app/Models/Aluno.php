<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome', 'cpf', 'idade', 'endereco', 'modalidade_id'];

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }
}