<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Grados',
        'route' => route('admin.grados.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.grados.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label class="mb-3">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre" name="nombre" value="{{ old('nombre') }}"/>
            </div>

            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Materias</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ($materias as $materia)
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="materia_{{ $materia->id }}" type="checkbox" name="materias[]" value="{{ $materia->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="materia_{{ $materia->id }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $materia->nombre }}</label>
                    </div>
                </li>
                @endforeach
            </ul>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
