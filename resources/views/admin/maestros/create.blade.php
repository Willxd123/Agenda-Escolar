<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Maestros',
        'route' => route('admin.maestros.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
<div class="card">
    <form action="{{ route('admin.maestros.store') }}" method="POST">
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
                <x-input class="w-full" placeholder="Ingrese el Apellido" name="apellido" value="{{ old('apellido') }}"/>
            </div>
            <div>
                <x-label class="mb-3">
                    CI
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el carnet de identidad" name="ci" value="{{ old('ci') }}"/>
            </div>
            <div>
                <x-label class="mb-3">
                    Telefono
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el teléfono" name="telefono" value="{{ old('telefono') }}"/>
            </div>

        </div>
        <div class="flex justify-end">
            <x-button>
                Guardar
            </x-button>
        </div>
    </form>
</div>
</x-admin-layout>
