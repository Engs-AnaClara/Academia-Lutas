<x-app-layout>

```
<x-slot name="header">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Modalidades
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Modalidades oferecidas pela Academia de Lutas
        </p>
    </div>
</x-slot>


<div class="py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-6">
            <p class="text-gray-600">
                Confira as modalidades disponíveis e a quantidade de alunos matriculados.
            </p>
        </div>


        @if ($modalidades->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($modalidades as $modalidade)

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">

                        <div class="flex items-start justify-between">

                            <div class="w-12 h-12 rounded-xl bg-gray-900 text-white flex items-center justify-center text-xl">
                                🥋
                            </div>

                            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                                {{ $modalidade->alunos_count }}
                                {{ $modalidade->alunos_count == 1 ? 'aluno' : 'alunos' }}
                            </span>

                        </div>


                        <h3 class="text-xl font-bold text-gray-800 mt-5">
                            {{ $modalidade->nome }}
                        </h3>


                        <p class="text-sm text-gray-500 mt-2">
                            Modalidade disponível na academia.
                        </p>


                        <div class="mt-5 pt-4 border-t border-gray-100">

                            <a
                                href="{{ route('alunos.index') }}"
                                class="text-sm font-medium text-blue-600 hover:text-blue-800">

                                Ver alunos →

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-10 text-center">

                <p class="text-gray-500">
                    Nenhuma modalidade cadastrada.
                </p>

            </div>

        @endif

    </div>

</div>
```

</x-app-layout>
