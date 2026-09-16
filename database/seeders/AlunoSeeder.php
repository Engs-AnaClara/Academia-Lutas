<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        Aluno::create([
            'nome' => 'João Silva',
            'cpf' => '111.111.111-11',
            'idade' => 12,
            'endereco' => 'Rua A, 100, Guarapuava',
            'modalidade_id' => 1,
        ]);

        Aluno::create([
            'nome' => 'Maria Souza',
            'cpf' => '222.222.222-22',
            'idade' => 25,
            'endereco' => 'Rua B, 200, Guarapuava',
            'modalidade_id' => 2,
        ]);

        Aluno::create([
            'nome' => 'Pedro Santos',
            'cpf' => '333.333.333-33',
            'idade' => 8,
            'endereco' => 'Rua C, 300, Guarapuava',
            'modalidade_id' => 3,
        ]);
    }
}