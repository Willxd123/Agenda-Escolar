<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'route' => route('admin.roles.index'),
    ],
    [
        'name' => $role->name,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <x-label class="mb-3">
                            Nombre
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre" name="name"
                            value="{{ old('name', $role->name) }}" />
                    </div>
                </div>

                <div>
                    {{-- Para tener checkboxes de roles --}}
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Permisos</h3>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="w-full sm:w-auto border border-gray-200 rounded-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="role_{{ $permission->id }}" type="checkbox" name="maestros[]"
                                        value="{{ $permission->id }}"
                                        {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="role_{{ $permission->id }}"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $permission->name }}
                                    </label>

                                </div>
                            </div>
                        @endforeach
                    </div>
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
    <form action="{{ route('admin.roles.destroy', $permission) }}" method="POST" id="delete-from">
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
