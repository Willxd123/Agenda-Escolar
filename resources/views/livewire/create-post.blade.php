<div>

    <div id="botonAbrirModal" class="flex justify-end" wire:click = "$set('open',true)">
        <x-button>ver actividades</x-button>
    </div>

    <x-dialog-modal items-center wire:model="open">
        <x-slot name="title">
            Actividades Pendientes
        </x-slot>

        <x-slot name="content">

            @if ($calendarios->count())
                <x-table>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Actividad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        inicio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        fin
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        accion
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calendarios as $calendario)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $calendario->evento }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $calendario->fecha_inicio }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $calendario->fecha_fin }}
                                    </th>
                                    <td class="px-6 py-4">
                                        @switch($calendario->estado)
                                            @case('atrasado')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Atrasado
                                                </span>
                                                @break
                                            @case('pendiente')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pendiente
                                                </span>
                                                @break
                                            @case('entregado')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Entregado
                                                </span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </x-table>
            @endif





        </x-slot>

        <x-slot name="footer">

            <x-secondary-button wire:click="$set('open',false)">
                Cerrar
            </x-secondary-button>


        </x-slot>




    </x-dialog-modal>

</div>
