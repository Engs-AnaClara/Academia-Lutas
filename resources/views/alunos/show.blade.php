<x-app-layout>

```
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Detalhes do aluno
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Informações cadastrais
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Cabeçalho --}}
            <div class="bg-gray-900 px-6 py-8 text-white">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 rounded-full bg-white text-gray-900 flex items-center justify-center text-2xl font-bold">

                        {{ strtoupper(substr($aluno->nome, 0, 1)) }}

                    </div>

                    <div>

                        <h1 class="text-2xl font-bold">
                            {{ $aluno->nome }}
                        </h1>

                        <p class="text-gray-300 mt-1">
                            Aluno #{{ $aluno->id }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Informações --}}
            <div class="p-6 sm:p-8">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-400">
                            CPF
                        </p>

                        <p class="mt-1 text-gray-800 font-medium">
                            {{ $aluno->cpf }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-400">
                            Idade
                        </p>

                        <p class="mt-1 text-gray-800 font-medium">
                            {{ $aluno->idade }} anos
                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-400">
                            Endereço
                        </p>

                        <p class="mt-1 text-gray-800 font-medium">
                            {{ $aluno->endereco }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-400">
                            Modalidade
                        </p>

                        <span class="inline-flex mt-1 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

                            {{ $aluno->modalidade->nome ?? 'Sem modalidade' }}

                        </span>
                    </div>

                </div>


                {{-- Ações --}}
                <div class="flex flex-wrap items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">

                    <a
                        href="{{ route('alunos.index') }}"
                        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">

                        Voltar

                    </a>


                    @can('update', $aluno)

                        <a
                            href="{{ route('alunos.edit', $aluno) }}"
                            class="px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-800">

                            Editar

                        </a>

                    @endcan


                    @can('delete', $aluno)

                        <form
                            action="{{ route('alunos.destroy', $aluno) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Tem certeza que deseja excluir este aluno?')"
                                class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">

                                Excluir

                            </button>

                        </form>

                    @endcan

                </div>

            </div>

        </div>

    </div>

</div>
```

</x-app-layout>
