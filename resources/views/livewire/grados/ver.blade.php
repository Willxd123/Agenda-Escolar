<div>
    <x-dialog-modal items-center wire:model="open">
        <x-slot name="title">
            Materias asignadas al grado {{ $gradoVer->nombre }}
        </x-slot>

        <x-slot name="content">
            <form action="{{ route('admin.grados.store', $grado) }}" method="POST">
                {{-- Para tener checkboxes de materias --}}
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Materias:</h2>
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    @foreach ($grado->materias as $materia)
                    <li>{{ $materia->nombre }}</li>
                    @endforeach
                </ul>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="cerrarModal">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
