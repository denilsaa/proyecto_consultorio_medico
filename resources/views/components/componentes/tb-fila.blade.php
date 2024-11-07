@props(['fila', 'datos', 'estado' => true])

<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    {{-- Información del Usuario --}}
    @if (isset($fila->usuario->ap_paterno))
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/12266/12266251.png"
            alt="Usuario">
        <div class="ps-3">
            <div class="text-base font-semibold">
                {{ implode(' ', [$fila->usuario->nombre, $fila->usuario->ap_paterno, $fila->usuario->ap_materno]) }}
            </div>
            <div class="font-normal text-gray-500">{{ $fila->usuario->correo }}</div>
        </div>
    </th>
    @php
    $datos = array_diff($datos, ['Nombre', 'correo']);
    @endphp
    @endif

    {{-- Campos Dinámicos --}}
    @foreach ($datos as $dato)
    @php
    $dato = strtolower(str_replace([' ', 'de', '___'], '_', $dato));
    @endphp
    <td class="px-6 py-4">
        @if($dato == 'estado')
        <x-componentes.estado-indicador
            :estado="isset($fila['usuario']['estado_usuario']) ? $fila['usuario']['estado_usuario'] : $fila['estado']" />
        @elseif($dato == '')
        <div class="flex space-x-2">
            <x-componentes.boton-editar :id="$fila['id']" />
            <x-componentes.boton-estado :estado="$estado" :id="$fila['id']" />
        </div>
        @else
        {{ $fila->usuario->$dato ?? $fila[$dato]['nombre'] ?? $fila[$dato]?? '' }}
        @endif
    </td>
    @endforeach
</tr>