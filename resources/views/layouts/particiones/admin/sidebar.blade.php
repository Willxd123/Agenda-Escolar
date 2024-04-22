<!-- php del sidebar, declaracion para botones-->
@php
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
            'permission' => 'admin.dashboard', // Permiso requerido para ver el dashboard
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
            'permission' => 'admin.users.index', // Permiso requerido para ver la lista de usuarios
        ],

        [
            //Maestros
            'name' => 'Maestros',
            'icon' => 'fa-solid fa-users',
            'route' => route('admin.maestros.index'),
            'active' => request()->routeIs('admin.maestros.*'),
            'permission' => 'admin.maestros.index',
        ],
        [
            //Materias
            'name' => 'Materias',
            'icon' => 'fa-solid fa-book',
            'route' => route('admin.materias.index'),
            'active' => request()->routeIs('admin.materias.*'),
            'permission' => 'admin.materias.index',
        ],
        [
            //Grados
            'name' => 'Grados',
            'icon' => 'fa-solid fa-door-open',
            'route' => route('admin.grados.index'),
            'active' => request()->routeIs('admin.grados.*'),
            'permission' => 'admin.grados.index',
        ],

        [
            //Estudiantes
            'name' => 'Estudiantes',
            'icon' => 'fa-solid fa-graduation-cap',
            'route' => route('admin.estudiantes.index'),
            'active' => request()->routeIs('admin.estudiantes.*'),
            'permission' => 'admin.estudiantes.index',
        ],
        [
            //Padres
            'name' => 'Padres',
            'icon' => 'fa-solid fa-graduation-cap',
            'route' => route('admin.padres.index'),
            'active' => request()->routeIs('admin.padres.*'),
            'permission' => 'admin.padres.index',
        ],
        [
            //Clendarios
            'name' => 'Calendario',
            'icon' => 'fa-solid fa-graduation-cap',
            'route' => route('admin.calendarios.index'),
            'active' => request()->routeIs('admin.calendarios.*'),
            'permission' => 'admin.calendarios.index',
        ],
    ];
@endphp

<!--funcionalidad y estilo de sidebar -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100vh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <!-- declaracion de foreachs-->
            @foreach ($links as $link)
                <!-- gregar botones y estilos-->
                @can($link['permission'])
                <!--boton inicio-->
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">

                        <!-- estilo de icono-->
                        <span class="inline-flex w-6 h6 justify-center items-center">
                            <i class="{{ $link['icon'] }} text-gray-500"></i>
                        </span>
                        <!-- nombre del boton-->
                        <span class="ms-2">
                            {{ $link['name'] }}
                        </span>
                    </a>
                </li>
                @endcan
            @endforeach

        </ul>
    </div>
</aside>
