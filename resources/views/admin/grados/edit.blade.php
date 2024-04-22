<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'grados',
        'route' => route('admin.grados.index'),
    ],
    [
        'name' => $grado->nombre,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.grados.update', $grado) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4 "> <!-- Se utiliza grid para dividir en dos columnas -->
                <div>
                    <x-label class="mb-3">
                        Nombre
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre" name="nombre"
                        value="{{ old('nombre', $grado->nombre) }}" />
                </div>
            </div>


            {{-- Para tener checkboxes de materias --}}
            <h3 class="mb-4 font-semibold text-center text-gray-900 dark:text-white">Materias</h3>
            <ul
                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ($materias as $materia)
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="materia_{{ $materia->id }}" type="checkbox" name="materias[]"
                                value="{{ $materia->id }}"
                                {{ in_array($materia->id, $grado->materias->pluck('id')->toArray()) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="materia_{{ $materia->id }}"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ $materia->nombre }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="flex justify-end">
                <x-button>
                    Actualizar
                </x-button>
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
            </div>

        </form>
    </div>
    <form action="{{ route('admin.grados.destroy', $grado) }}" method="POST" id="delete-from">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, bórralo!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-from').submit();
                    }
                });
            }
        </script>
    @endpush

</x-admin-layout>
