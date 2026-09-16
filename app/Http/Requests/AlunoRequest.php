<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'max:14', 'unique:alunos,cpf,' . $this->aluno?->id],
            'idade' => ['required', 'integer', 'min:3'],
            'endereco' => ['required', 'string', 'max:255'],
            'modalidade_id' => ['required', 'integer', 'exists:modalidades,id'],
        ];
    }
}