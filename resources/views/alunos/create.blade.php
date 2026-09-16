<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Novo aluno
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Cadastre um novo aluno na academia
            </p>
        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">

                <form action="{{ route('alunos.store') }}" method="POST">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Nome --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nome completo
                            </label>

                            <input
                                type="text"
                                name="nome"
                                value="{{ old('nome') }}"
                                placeholder="Digite o nome do aluno"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                            @error('nome')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- CPF --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                CPF
                            </label>

                            <input
                                type="text"
                                name="cpf"
                                id="cpf"
                                value="{{ old('cpf') }}"
                                maxlength="14"
                                inputmode="numeric"
                                placeholder="000.000.000-00"
                                oninput="formatarCPF(this)"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                            @error('cpf')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Idade --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Idade
                            </label>

                            <input
                                type="number"
                                name="idade"
                                value="{{ old('idade') }}"
                                min="1"
                                placeholder="Ex.: 20"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                            @error('idade')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Endereço --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Endereço
                            </label>

                            <input
                                type="text"
                                name="endereco"
                                value="{{ old('endereco') }}"
                                placeholder="Rua, número, bairro..."
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                            @error('endereco')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Modalidade --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Modalidade
                            </label>

                            <select
                                name="modalidade_id"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    Selecione uma modalidade
                                </option>

                                @foreach ($modalidades as $modalidade)

                                    <option
                                        value="{{ $modalidade->id }}"
                                        @selected(old('modalidade_id') == $modalidade->id)>
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

                            Cadastrar aluno

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        function formatarCPF(input) {
            let cpf = input.value.replace(/\D/g, '');

            cpf = cpf.substring(0, 11);

            if (cpf.length > 9) {
                cpf = cpf.replace(
                    /^(\d{3})(\d{3})(\d{3})(\d{1,2}).*/,
                    '$1.$2.$3-$4'
                );
            } else if (cpf.length > 6) {
                cpf = cpf.replace(
                    /^(\d{3})(\d{3})(\d{1,3}).*/,
                    '$1.$2.$3'
                );
            } else if (cpf.length > 3) {
                cpf = cpf.replace(
                    /^(\d{3})(\d{1,3}).*/,
                    '$1.$2'
                );
            }

            input.value = cpf;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const cpf = document.getElementById('cpf');

            if (cpf && cpf.value) {
                formatarCPF(cpf);
            }
        });
    </script>

</x-app-layout>;