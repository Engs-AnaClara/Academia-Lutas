<x-app-layout>

```
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Editar aluno
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Atualize os dados de {{ $aluno->nome }}
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">

            <form action="{{ route('alunos.update', $aluno) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome completo
                        </label>

                        <input
                            type="text"
                            name="nome"
                            value="{{ old('nome', $aluno->nome) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('nome')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CPF
                        </label>

                        <input
                            type="text"
                            name="cpf"
                            value="{{ old('cpf', $aluno->cpf) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('cpf')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Idade
                        </label>

                        <input
                            type="number"
                            name="idade"
                            value="{{ old('idade', $aluno->idade) }}"
                            min="1"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('idade')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço
                        </label>

                        <input
                            type="text"
                            name="endereco"
                            value="{{ old('endereco', $aluno->endereco) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('endereco')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Modalidade
                        </label>

                        <select
                            name="modalidade_id"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                            @foreach ($modalidades as $modalidade)

                                <option
                                    value="{{ $modalidade->id }}"
                                    @selected((int) $modalidade->id === (int) $aluno->modalidade_id)>

                                    {{ $modalidade->nome }}

                                </option>

                            @endforeach

                        </select>

                        @error('modalidade_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                </div>


                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">

                    <a
                        href="{{ route('alunos.index') }}"
                        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">

                        Cancelar

                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-800 font-medium">

                        Salvar alterações

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
```

</x-app-layout>
