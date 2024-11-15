<div>
    <h1 class="text-4xl font-bold mb-6 text-center text-gray-900">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M3 10h18M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <span class="ml-2">Agenda - {{ ucfirst(\Carbon\Carbon::create($anio, $mes)->locale('es')->translatedFormat('F Y')) }}</span>
        </div>
    </h1>

    <!-- Filtros para cambiar el mes y año -->
    <div class="flex justify-center space-x-4 mb-4">
        <select wire:model="mes" wire:change="actualizarMes($event.target.value, {{ $anio }})" class="p-2 border rounded">
            @foreach(range(1, 12) as $m)
                <option value="{{ $m }}" @if($m == $mes) selected @endif>
                    {{ \Carbon\Carbon::create()->month($m)->locale('es')->isoFormat('MMMM') }}
                </option>
            @endforeach
        </select>
        
        <select wire:model="anio" wire:change="actualizarMes({{ $mes }}, $event.target.value)" class="p-2 border rounded">
            @foreach(range(now()->year - 1, now()->year) as $año)
                <option value="{{ $año }}" @if($año == $anio) selected @endif>{{ $año }}</option>
            @endforeach
        </select>
    </div>

    <!-- Mostrar el calendario -->
    <div class="grid grid-cols-7 gap-2 px-4 sm:px-6 md:px-8 lg:px-10">
        @php
            $primerDia = \Carbon\Carbon::create($anio, $mes, 1)->dayOfWeek;
            $diasDelMes = \Carbon\Carbon::create($anio, $mes, 1)->daysInMonth;
        @endphp
        
        <!-- Encabezado del calendario -->
        <div class="text-center font-semibold text-gray-700 py-2">Lun</div>
        <div class="text-center font-semibold text-gray-700 py-2">Mar</div>
        <div class="text-center font-semibold text-gray-700 py-2">Mié</div>
        <div class="text-center font-semibold text-gray-700 py-2">Jue</div>
        <div class="text-center font-semibold text-gray-700 py-2">Vie</div>
        <div class="text-center font-semibold text-gray-700 py-2">Sáb</div>
        <div class="text-center font-semibold text-gray-700 py-2">Dom</div>

        <!-- Celdas del calendario -->
        @for ($i = 1; $i <= $primerDia + $diasDelMes; $i++)
            @if ($i < $primerDia + 1)
                <div class="flex items-center justify-center"></div>
            @else
                @php
                    $dia = $i - $primerDia;
                    $citasDelDia = $citasPorDia[$dia] ?? [];
                @endphp

                <div class="relative p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                    <span class="absolute top-2 right-2 text-sm sm:text-base font-semibold text-gray-600">{{ $dia }}</span>

                    <!-- Mostrar las citas del día -->
                    @foreach($citasDelDia as $cita)
                        <div class="bg-blue-200 p-2 mt-2 text-xs text-gray-800 rounded-md shadow-sm hover:bg-blue-100 transition duration-150">
                            <h3 class="font-semibold text-sm text-blue-600">Motivo</h3>
                            <p>{{ $cita->motivo }} - {{ $cita->hora }}</p>
                            <h3 class="font-semibold text-sm text-blue-600 mt-2">Paciente</h3>
                            <p>{{ $cita->paciente->usuario->nombre }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        @endfor
    </div>
</div>
