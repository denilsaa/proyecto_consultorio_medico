@props(['fila', 'datos','edit'])
@php
    $is_user = false;
@endphp
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <!-- checkbox -->
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>

    <!-- Nombre y correo -->
    @if (isset($fila->usuario->ap_paterno))
        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/12266/12266251.png" alt="Jese image">
            <div class="ps-3">
                <!-- Nombre -->
                <div class="text-base font-semibold">{{ $fila->usuario->nombre}} {{ $fila->usuario->ap_paterno}} {{ $fila->usuario->ap_materno}}</div>
                <!-- Correo -->
                <div class="font-normal text-gray-500">{{ $fila->usuario->correo }}</div>
            </div>
        </th>
        @php
            $datos = array_diff($datos, ['Nombre', 'correo']);
            $is_user = true;
        @endphp
    @endif

    @foreach ($datos as $dato)
        <!-- Datos -->
        @php
            $dato = strtolower(str_replace([' ', 'de', '___'], '_', $dato));
        @endphp
        <td class="px-6 py-4">
            @if($dato == 'estado')
                @if(isset($fila['usuario']['estado_usuario']))
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Activo
                    </div>
                @else
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-red-700 me-2"></div> Inactivo
                    </div>
                @endif
            @elseif($dato == '')
                <button class="text-blue-400 hover:text-white border border-blue-400 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-300 dark:text-blue-300 dark:hover:text-white dark:hover:bg-blue-400 dark:focus:ring-blue-900" data-modal-target="{{$edit}}" data-modal-toggle="{{$edit}}" >
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                    </svg>
                </button>
                {{$form}}
            @else
                @if (isset($fila->usuario->$dato))
                    {{ $fila->usuario->$dato }}
                @else
                    {{ $fila[$dato] }}
                @endif
            @endif
        </td>
    @endforeach
</tr>
