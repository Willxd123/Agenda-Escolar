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
        'name' => 'Nuevo',
    ],
]">

    <div class="card">
        <form action="{{route('admin.estudiantes.store') }}" method="POST" >
            @csrf
            
   
          
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- select grado -->
                <div class="mb-4">
                    <x-label for="grado_id" class="mb-3">Grado</x-label>
                    <x-select name="grado_id" id="grado_id" class="w-full">
                        <option disabled selected>Seleccione un Grado</option>
                        @foreach ($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                        @endforeach
                    </x-select>
                </div>

                <!-- select padre -->
                <div class="mb-4">
                    <x-label for="padre_id" class="mb-3">Padre/Madre</x-label>
                    <x-select name="padre_id" id="padre_id" class="w-full">
                        <option value="" disabled selected>Seleccione un Padre/Madre</option>
                        @foreach ($padres as $padre)
                            <option value="{{ $padre->id }}">{{ $padre->nombre }} {{ $padre->apellido }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div>
                    <x-label for="nombre" class="mb-3">Nombre</x-label>
                    <x-input id="nombre" class="w-full" placeholder="Ingrese el nombre del estudiante" name="nombre"
                        value="{{ old('nombre') }}" />
                </div>
                <div>
                    <x-label for="apellido" class="mb-3">Apellido</x-label>
                    <x-input id="apellido" class="w-full" placeholder="Ingrese el apellido" name="apellido"
                        value="{{ old('apellido') }}"/>
                </div>
            </div>
            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
