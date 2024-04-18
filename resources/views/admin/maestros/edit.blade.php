<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Maestro',
        'route' => route('admin.maestros.index'),
    ],
    [
        'name' => $maestro->nombre,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.maestros.update', $maestro) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4"> <!-- Se utiliza grid para dividir en dos columnas -->
                <div>
                    <x-label class="mb-3">
                        Nombre
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre" name="nombre" value="{{ old('nombre') }}" />
                </div>
                <div>
                    <x-label class="mb-3">
                        Apellido
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el Apellido" name="apellido"
                        value="{{ old('apellido') }}" />
                </div>
                <div>
                    <x-label class="mb-3">
                        Telefono
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el teléfono" name="telefono"
                        value="{{ old('telefono') }}" />
                </div>

            </div>
            <div class="flex justify-end ">
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
    <form action="{{ route('admin.maestros.destroy', $maestro) }}" method="POST" id="delete-from">
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
