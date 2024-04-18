<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Calendario Academico',
    ],
]">
    <div class="mb-4 grid grid-cols-2 gap-4">

        <x-slot name="select">
            <a class="btn btn-blue" href="{{ route('admin.calendarios.create') }}">
                crear Actividad
            </a>
        </x-slot>
        <x-slot name="modal">
                @livewire('create-post')
        </x-slot> 
    </div>

    

    <!-- HTML para el botón que activa el modal -->
    <button id="botonAbrirModal" class="btn">Abrir Modal</button>
    <div id=calendario> </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendario');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',

                    events: @json($calendarios),
                    locale: "es",
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth',
                    },
                    // Opciones de configuración del calendario
                    dateClick: function(info) {
                        // Activar el modal cuando se hace clic en una fecha
                        document.getElementById('miModal').classList.remove('hidden');
                    },
                });
                calendar.render();

                // JavaScript para cerrar el modal
                document.getElementById('cerrarModal').addEventListener('click', function() {
                    document.getElementById('miModal').classList.add('hidden');
                });

                // JavaScript para abrir el modal cuando se hace clic en el botón
                document.getElementById('botonAbrirModal').addEventListener('click', function() {
                    document.getElementById('miModal').classList.remove('hidden');
                });
            });
        </script>
    @endpush

    {{-- @livewire('show-calendario') --}}
</x-admin-layout>
