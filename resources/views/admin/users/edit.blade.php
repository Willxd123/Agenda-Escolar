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
            <div>
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
                        <x-input class="w-full" placeholder="Ingrese la nueva contraseña" name="email"
                            value="{{ old('password') }}" />
                    </div>
                </div>
                <!-- Se utiliza grid para dividir en dos columnas -->
                <div class="mb-4 "> <!-- Se utiliza grid para dividir en dos columnas -->


                    <div>
                        {{-- Para tener checkboxes de roles --}}
                        <h3 class="mb-4 font-semibold text-center text-gray-900 dark:text-white">Roles</h3>
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($roles as $role)
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="role_{{ $role->id }}" type="radio" name="roles[]"
                                               value="{{ $role->id }}"
                                               {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="role_{{ $role->id }}"
                                               class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        
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
    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" id="delete-from">
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
