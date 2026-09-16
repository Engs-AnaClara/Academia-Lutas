<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:150',
            'cpf' => 'required|max:14|unique:alunos,cpf,' . $this->route('aluno')?->id,
            'idade' => 'required|integer|min:1',
            'endereco' => 'required|max:255',
            'modalidade_id' => 'required|exists:modalidades,id',
        ];
    }
}