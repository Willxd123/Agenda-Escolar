<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Actividad',
        'route' => route('admin.calendarios.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
   
        {{-- <form action="{{ route('admin.calendarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w-full">
                <x-label for="evento" class="mb-3">Nombre de Actividad</x-label>
                <x-input id="evento" placeholder="Ingrese el evento" name="evento" value="{{ old('evento') }}" />
            </div>
            <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                    <x-label for="fecha_inicio" class="mb-3">Fecha y Hora de Inicio*</x-label>
                    <input type="datetime-local" id="fecha_inicio" name="fecha_inicio"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ old('fecha_inicio') }}" />

                </div>
            </div>
            <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                    <x-label for="fecha_fin" class="mb-3">Fecha y Hora de Fin*</x-label>
                    <input type="datetime-local" id="fecha_fin" name="fecha_fin"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-4 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ old('fecha_fin') }}" />

                </div>
            </div>
            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        
        </form>

        <script>
            function showFileName(input, targetId) {
                const fileInput = document.getElementById(input);
                const fileName = fileInput.value.split('\\').pop(); // Obtener el nombre del archivo
                document.getElementById(targetId).innerText =
                    fileName; // Establecer el nombre del archivo en el elemento destino
            }
        </script>
     --}}
        @livewire('calendario.calendario-create')
 
</x-admin-layout>
