<div>
    <div id="botonAbrirModal" class="flex justify-end" wire:click="$set('open', true)">
        <x-button>Ver materias</x-button>
    </div>
    <x-dialog-modal items-center wire:model="open">
        <x-slot name="title">
            Materias asignadas al grado

            <h1>
                Grado {{$grado->nombre}}
            </h1>
        </x-slot>
    
        <x-slot name="content">
                <x-table>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        materias
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grado->$materias as $materia)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $materia->nombre }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-table>
        </x-slot> 
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
