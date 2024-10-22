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
    <x-componentes.tb-encabezado titulo="Pesonal" viewBox="0 0 18 18">
        <x-slot name="icono">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/>     
        </x-slot>
        <x-slot name="modal">                
            <x-formularios.form-personal/>
        </x-slot>
    </x-componentes.tb-encabezado>
    <!-- encabezado de la tabla -->
    <x-componentes.tb-thead :campos="$cabeceras" />

    <tbody>
        @if($personal->isEmpty())
            <x-componentes.no-data colspan="{{count($cabeceras)+1}}" mensaje="No hay Personal registrado." />
        @else
            @foreach($personal as $persona)
                <x-componentes.tb-fila :fila="">
            @endforeach
        @endif
    </tbody>
</table>