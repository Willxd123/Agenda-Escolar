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
        'name' => 'Nuevo',
    ],
]">
<div class="card">
    <form action="{{ route('admin.padres.store')}}" method="POST">
        @csrf
        <div class="mb-4 grid grid-cols-2 gap-4"> <!-- Se utiliza grid para dividir en dos columnas -->
            <div>
                <x-label class="mb-3">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre" name="nombre" value="{{ old('nombre') }}"/>
            </div>
            <div>
                <x-label class="mb-3">
                    Apellido
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el apellido" name="apellido" value="{{ old('apellido') }}"/>
            </div>
            <div>
                <x-label class="mb-3">
                    Direccion
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el direccion" name="direccion" value="{{ old('direccion') }}"/>
            </div>
            <div>
                <x-label class="mb-3">
                    Telefono
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el teléfono" name="telefono" value="{{ old('telefono') }}"/>
            </div>
            <div>

        </div>
        <div class="flex justify-end">
            <x-button>
                Guardar
            </x-button>
        </div>
    </form>
</div>
</x-admin-layout>
