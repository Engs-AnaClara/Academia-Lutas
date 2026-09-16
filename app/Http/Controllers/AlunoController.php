<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Modalidade;
use App\Http\Requests\StoreAlunoRequest;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('modalidade')->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $this->authorize('create', Aluno::class);
        $modalidades = Modalidade::all();
        return view('alunos.create', compact('modalidades'));
    }

    public function store(StoreAlunoRequest $request)
    {
        $this->authorize('create', Aluno::class);
        Aluno::create($request->validated());
        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado!');
    }

    public function show(Aluno $aluno)
    {
        $aluno->load('modalidade');
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        $this->authorize('update', $aluno);
        $modalidades = Modalidade::all();
        return view('alunos.edit', compact('aluno', 'modalidades'));
    }

    public function update(StoreAlunoRequest $request, Aluno $aluno)
    {
        $this->authorize('update', $aluno);
        $aluno->update($request->validated());
        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado!');
    }

    public function destroy(Aluno $aluno)
    {
        $this->authorize('delete', $aluno);
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno removido!');
    }
}