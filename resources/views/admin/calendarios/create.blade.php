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
    <div class="card">
        <form action="{{ route('admin.calendarios.store') }}" method="POST" enctype="multipart/form-data">
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
            {{--        
                <div>
                    <x-label class="mb-3">Descripsion</x-label>
                    <x-textarea class="w-full" placeholder="Ingrese la descripsion del producto" name="fecha_fin"
                        value="{{ old('descripsion') }}" />
                </div>
            </div>
            <!------------------------------------------------------------------------->
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file1"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Haga clic
                                para subir</span> o arrastra y suelta</p>
                        <!-- <p class="text-xs text-gray-500 dark:text-gray-400">Seleccionar archivo Excel</p> -->
                        <span id="file-name1" class="text-xs text-gray-500 dark:text-gray-400"></span>
                    </div>
                    <input id="dropzone-file1" type="file" name="import_file" class="hidden"
                        onchange="showFileName('dropzone-file1', 'file-name1')" />
                    <button class="btn btn-blue" type="submit">
                        Guardar actividad
                    </button>
                </label>
            </div> --}}

        </form>

        <script>
            function showFileName(input, targetId) {
                const fileInput = document.getElementById(input);
                const fileName = fileInput.value.split('\\').pop(); // Obtener el nombre del archivo
                document.getElementById(targetId).innerText =
                    fileName; // Establecer el nombre del archivo en el elemento destino
            }
        </script>
    </div>

</x-admin-layout>
