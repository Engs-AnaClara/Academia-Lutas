<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfileController;
use App\Models\Aluno;
use App\Models\Modalidade;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $totalAlunos = Aluno::count();
    $totalModalidades = Modalidade::count();

    $alunosRecentes = Aluno::with('modalidade')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalAlunos',
        'totalModalidades',
        'alunosRecentes'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Perfil
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Alunos
    |--------------------------------------------------------------------------
    */

    Route::resource('alunos', AlunoController::class);


    /*
    |--------------------------------------------------------------------------
    | Modalidades
    |--------------------------------------------------------------------------
    */

    Route::get('/modalidades', function () {

        $modalidades = Modalidade::withCount('alunos')
            ->orderBy('nome')
            ->get();

        return view('modalidades.index', compact('modalidades'));

    })->name('modalidades.index');


    /*
    |--------------------------------------------------------------------------
    | Área administrativa
    |--------------------------------------------------------------------------
    |
    | Mantemos a rota para não quebrar o que já existia.
    | O administrador será direcionado ao dashboard principal.
    |
    */

    Route::middleware(['admin'])
        ->prefix('admin')
        ->group(function () {

            Route::get('/dashboard', function () {
                return redirect()->route('dashboard');
            })->name('admin.dashboard');

        });

});


require __DIR__.'/auth.php';
