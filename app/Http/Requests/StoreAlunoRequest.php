<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

            'cpf' => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
                Rule::unique('alunos', 'cpf')->ignore($this->route('aluno')),
            ],

            'idade' => 'required|integer|min:1',

            'endereco' => 'required|max:255',

            'modalidade_id' => 'required|exists:modalidades,id',
        ];
    }
};