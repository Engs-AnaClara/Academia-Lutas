<x-app-layout>

```
<x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Alunos
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Gerenciamento dos alunos cadastrados
            </p>
        </div>

        @can('create', \App\Models\Aluno::class)

            <a
                href="{{ route('alunos.create') }}"
                class="inline-flex items-center justify-center px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition font-medium">

                + Novo aluno

            </a>

        @endcan

    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Mensagem --}}
        @if (session('success'))

            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>

        @endif


        {{-- Total --}}
        <div class="mb-6 bg-white rounded-xl border border-gray-100 shadow-sm p-5">

            <p class="text-sm text-gray-500">
                Total de alunos cadastrados
            </p>

            <p class="text-3xl font-bold text-gray-800 mt-1">
                {{ $alunos->count() }}
            </p>

        </div>


        {{-- Tabela --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

            @if ($alunos->count())

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-50 border-b border-gray-200">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Aluno
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    CPF
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Idade
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Modalidade
                                </th>

                                <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @foreach ($alunos as $aluno)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold">

                                                {{ strtoupper(substr($aluno->nome, 0, 1)) }}

                                            </div>

                                            <div>

                                                <p class="font-semibold text-gray-800">
                                                    {{ $aluno->nome }}
                                                </p>

                                                <p class="text-xs text-gray-500">
                                                    Aluno #{{ $aluno->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $aluno->cpf }}
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $aluno->idade }} anos
                                    </td>


                                    <td class="px-6 py-4">

                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">

                                            {{ $aluno->modalidade->nome ?? 'Sem modalidade' }}

                                        </span>

                                    </td>


                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-end gap-3">

                                            <a
                                                href="{{ route('alunos.show', $aluno) }}"
                                                class="text-sm font-medium text-blue-600 hover:text-blue-800">

                                                Ver

                                            </a>


                                            @can('update', $aluno)

                                                <a
                                                    href="{{ route('alunos.edit', $aluno) }}"
                                                    class="text-sm font-medium text-gray-600 hover:text-gray-900">

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
                                                        class="text-sm font-medium text-red-600 hover:text-red-800">

                                                        Excluir

                                                    </button>

                                                </form>

                                            @endcan

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="p-12 text-center">

                    <div class="text-4xl mb-4">
                        👥
                    </div>

                    <h3 class="text-lg font-bold text-gray-800">
                        Nenhum aluno cadastrado
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Comece cadastrando o primeiro aluno.
                    </p>

                    @can('create', \App\Models\Aluno::class)

                        <a
                            href="{{ route('alunos.create') }}"
                            class="inline-block mt-5 px-4 py-2 bg-gray-900 text-white rounded-lg">

                            Cadastrar aluno

                        </a>

                    @endcan

                </div>

            @endif

        </div>

    </div>

</div>
```

</x-app-layout>
