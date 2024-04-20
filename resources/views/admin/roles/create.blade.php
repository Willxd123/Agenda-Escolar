<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
        'route' => route('admin.roles.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.roles.store') }}" method="POST">

            @csrf
            <div>
                <div class="mb-4">
                    <div>
                        <x-label class="mb-3">
                            Nombre
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre del rol" name="name"
                            value="{{ old('name') }}" />
                    </div>
                </div>

                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Technology</h3>
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($permissions as $permission)
                        <div class="w-full sm:w-auto border border-gray-200 rounded-lg dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="maestro_{{ $permission->id }}" type="checkbox" name="maestros[]"
                                    value="{{ $permission->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="maestro_{{ $permission->id }}"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
                            </div>
                        </div>
                    @endforeach
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
