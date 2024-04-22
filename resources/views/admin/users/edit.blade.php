<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'route' => route('admin.users.index'),
    ],
    [
        'name' => $user->name,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label class="mb-3">
                        Nombre
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre" name="name"
                        value="{{ old('name', $user->name) }}" />

                </div>
                <div>
                    <x-label class="mb-3">
                        Correo
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el Correo" name="email"
                        value="{{ old('email', $user->email) }}" />
                </div>
                <div>
                    <x-label class="mb-3">
                        Contraseña
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese la nueva contraseña" name="password"
                        value="{{ old('password') }}" />
                </div>
            </div>

         
                {{-- Para tener checkboxes de roles --}}
                <h3 class="mb-4 font-semibold text-center text-gray-900 dark:text-white">Roles</h3>
                <ul
                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($roles as $role)
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input name="roles[]" type="checkbox" value="{{ $role->name }}"
                                    {{ in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="role_{{ $role->name }}"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
       
            <div class="flex justify-end ">
                <x-button>
                    Actualizar
                </x-button>
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
            </div>
        </form>
    </div>

    <form id="delete-form" action="{{ route('admin.users.destroy', $user) }}" method="POST" name="delete-form">
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
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endpush


</x-admin-layout>
