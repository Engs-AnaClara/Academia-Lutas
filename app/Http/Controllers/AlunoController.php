<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\Modalidade;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function create()
    {
        $aluno = new Aluno();
        $modalidades = Modalidade::all();
        return view('alunos.create', compact('aluno', 'modalidades'));
    }

    public function store(AlunoRequest $request)
    {
        $this->authorize('create', Aluno::class);

        $dados = $request->validated();
        Aluno::create($dados);

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit(Aluno $aluno)
    {
        $modalidades = Modalidade::all();
        return view('alunos.edit', compact('aluno', 'modalidades'));
    }

    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $this->authorize('update', $aluno);

        $dados = $request->validated();
        $aluno->update($dados);

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $this->authorize('delete', $aluno);

        $aluno->delete();
        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}