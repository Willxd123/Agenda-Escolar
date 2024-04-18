<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Estudiante',
        'route' => route('admin.estudiantes.index'),
    ],
    [
        'name' => $estudiante->nombre,
    ],
]">


    <form action="{{ route('admin.estudiantes.update', $estudiante) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- select grado -->
                <div class="mb-4">
                    <x-label for="grado_id" class="mb-3">Grado</x-label>
                    <x-select name="grado_id" id="grado_id" class="w-full">
                        @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}"
                            @selected(old('familia_id',$estudiante->grado_id)==$grado->id)>
                            {{ $grado->nombre }}
                        </option>     
                           
                        @endforeach
                    </x-select>
                </div>
                <!-- select padre -->
                <div class="mb-4">
                    <x-label for="padre_id" class="mb-3">Padre</x-label>
                    <x-select name="padre_id" id="padreid" class="w-full">
                        @foreach ($padres as $padre)
                        <option value="{{ $padre->id }}"
                            @selected(old('familia_id',$estudiante->padre_id)==$padre->id)>
                            {{ $padre->nombre }} {{ $padre->apellido }}
                        </option>     
                           
                        @endforeach
                    </x-select>
                </div>
                


                <div>
                    <x-label for="nombre" class="mb-3">Nombre</x-label>
                    <x-input id="nombre" class="w-full" placeholder="Ingrese el nombre" name="nombre"
                        value="{{ old('nombre', $estudiante->nombre)}}" />
                </div>

                <div>
                    <x-label for="apellido" class="mb-3">apellido</x-label>
                    <x-input id="apellido" class="w-full" placeholder="Ingrese la fecha de apellido" name="apellido"
                        value="{{ old('apellido', $estudiante->apellido) }}" />
                </div>
            </div>
            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        </div>
    </form>

</x-admin-layout>
