<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'permissions',
        'route' => route('admin.permissions.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.permissions.store') }}" method="POST">

            @csrf
            <div>
                <div class="mb-4">
                    <div>
                        <x-label class="mb-3">
                            Nombre
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre del permiso" name="name"
                            value="{{ old('name') }}" />
                    </div>
                </div>

                <div class="flex justify-end ">
                    <div class="flex justify-end">
                        <x-button>
                            Guardar
                        </x-button>
                    </div>
                </div>
        </form>
    </div>


</x-admin-layout>
