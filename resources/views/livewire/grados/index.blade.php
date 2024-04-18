<div>
    @if ($grados->count())
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            accion
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($grados as $grado)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $grado->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $grado->nombre }}
                        </td>
                        <td class="px-6 py-4 flex items-center ">
                            <div class="mr-2">
                                <a href="{{ route('admin.grados.show', $grado) }}">
                                    Ver
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('admin.grados.edit', $grado) }}">
                                    Editar
                                </a>
                            </div>                           
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>


        <!-- paginacion-->
        <div>
            {{ $grados->links() }}
        </div>
    @else
        <!--estilo de alertas-->
        <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Aun no se reguistraron grados
            </div>
    @endif
</div>
