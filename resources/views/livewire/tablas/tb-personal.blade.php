@php
    $cabeceras = [
        'Nombre',
        'Fecha de Contratación',
        'Turno',
        'Cargo',
        'Telefono',
        'Estado',
        ''
    ];

@endphp

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <!-- bucador y otras acciones  -->
    <x-componentes.tb-encabezado titulo="Pesonal">
        <x-slot name="icono">
            <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
        </x-slot>
        <x-slot name="modal">                
            <x-formularios.form-pacientes></x-formularios.form-pacientes>
        </x-slot>
    </x-componentes.tb-encabezado>
    <!-- encabezado de la tabla -->
    <x-componentes.tb-thead :campos="$cabeceras" />

    <tbody>
        @if($pacientes->isEmpty())
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <!-- mensaje -->
                <td class="px-6 py-4 text-center" colspan="{{ count($cabeceras) + 1 }}">
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Alerta !</span> No hay pacientes registrados.
                        </div>
                    </div>
                    
                </td>
            </tr>
        @else
            @foreach($pacientes as $paciente)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <!-- checkbox -->
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <!-- Nombre  y correo -->
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/12266/12266251.png" alt="Jese image">
                        <div class="ps-3">
                            <!-- Nombre -->
                            <div class="text-base font-semibold">{{$paciente->nombre}}</div>
                            <!-- Correo -->
                            <div class="font-normal text-gray-500">{{$paciente->correo}}</div>
                        </div>
                    </th>
                    <!-- Carnet -->
                    <td class="px-6 py-4">
                        {{$paciente->carnet}}
                    </td>
                    <!-- telefono -->
                    <td class="px-6 py-4">
                        {{$paciente->telefono}}
                    </td>
                    <!-- telefono de emergencia -->
                    <td class="px-6 py-4">
                        {{$paciente->telefono_emergencia}}
                    </td>
                    <!-- estado -->
                    <td class="px-6 py-4">
                        @if($paciente->estado_usuario )
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Activo
                        </div>
                        @else
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-red-700 me-2"></div> Inactivo
                        </div>
                        @endif
                    </td>
                    <!-- btn Editar -->
                    <td class="px-6 py-4">
                        <button class="text-blue-400 hover:text-white border border-blue-400 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-300 dark:text-blue-300 dark:hover:text-white dark:hover:bg-blue-400 dark:focus:ring-blue-900">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>