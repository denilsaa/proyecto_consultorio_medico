@php

    $cabeceras = [
        'Nombre',
        'Cantidad',
        'Presentacion',
        'Fecha de Vencimiento',
        'Estado',
        ''
    ];
    $tituloedit = 'Editar Informacion';
    $tituloadd = 'Agregar Farmaco';
    $edit = "edit-crud-modal";
    $new = "crud-modal";
@endphp

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <!-- bucador y otras acciones  -->
    <x-componentes.tb-encabezado titulo="Farmacos" viewBox="0 0 22 22">
        <x-slot name="icono">
            <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd" />   
        </x-slot>
        <x-slot name="modal">                
            <x-formularios.form-pacientes :titulo="$tituloadd" modal="{{$new}}"/>
        </x-slot>
    </x-componentes.tb-encabezado>
    
    <!-- encabezado de la tabla -->
    <x-componentes.tb-thead :campos="$cabeceras" :sort="$sort" :direction="$direction"/>

    <tbody>
        
        @if($farmacos->isEmpty())        
            <x-componentes.no-data colspan="{{count($cabeceras)+1}}" mensaje="No hay farmacos registrados." />
        @else
            @foreach($farmacos as $farmaco)

                <x-componentes.tb-fila :fila="$farmaco" :datos="$cabeceras" edit="{{$edit}}">
                    <x-slot name="form">
                        <x-formularios.form-farmaco :titulo="$tituloadd" modal="{{$edit}}" />
                    </x-slot>
                        
                </x-componentes.tb-fila>
            @endforeach
        @endif
    </tbody>
</table>