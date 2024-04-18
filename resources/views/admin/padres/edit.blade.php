<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Padres',
        'route' => route('admin.padres.index'),
    ],
    [
        'name' => $padre->nombre,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.padres.update', $padre) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4"> <!-- Se utiliza grid para dividir en dos columnas -->
                <div>
                    <x-label class="mb-3">
                        Nombre
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre" name="nombre"
                        value="{{ old('nombre', $padre->nombre) }}" />
                </div>
                <div>
                    <x-label class="mb-3">
                        Apellido
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el Apellido" name="apellido"
                        value="{{ old('apellido', $padre->apellido) }}" />
                </div>
                <div>
                    <x-label class="mb-3">
                        Direccion
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el Dirreccion" name="direccion"
                        value="{{ old('direccion', $padre->direccion) }}" />
                </div>

                <div>
                    <x-label class="mb-3">
                        Telefono
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el teléfono" name="telefono"
                        value="{{ old('telefono', $padre->telefono) }}" />
                </div>

            </div>
        <!------------------------------------------------------------------->
        <x-table>
            <h3 class="mb-4 font-semibold text-center text-gray-900 dark:text-white">Hijos</h3>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                apellido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Grado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                accion
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($padre->estudiantes as $estudiante)
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4">
                                    {{ $estudiante->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $estudiante->apellido }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $estudiante->grado->nombre }}
                                </td>

                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.estudiantes.edit', $estudiante) }}">
                                        Editar
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </x-table>
        <!------------------------------------------------------------------->

            <div class="flex justify-end mt-4">
                <form action="">
                    <x-danger-button onclick="confirmDelete()">
                        Eliminar
                    </x-danger-button>
                </form>

                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>
        </form>

    </div>
    <form action="{{ route('admin.padres.destroy', $padre) }}" method="POST" id="delete-from">
        @csrf
        @method('DELETE')
    </form>
    @push('js')
        <script>
            function confirmDelete() {
                document.getElementById('delete-from').submit();
            }
        </script>
    @endpush
</x-admin-layout>
