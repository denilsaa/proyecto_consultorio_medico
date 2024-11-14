<div
    class="relative overflow-x-auto sm:rounded-2xl shadow-[0px_10px_50px_20px] shadow-sky-500/50 dark:shadow-gray-700/50">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <x-componentes.tb-encabezado titulo="Farmaco" viewBox="0 0 16 16" :estado="$estado">
            <x-slot name="icono">
                <path fill-rule="evenodd" d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />

            </x-slot>
            <x-slot name="btn">

            </x-slot>
        </x-componentes.tb-encabezado>

        <x-componentes.tb-thead :campos="$cabeceras" :sort="$sort" :direction="$direction" />
        @if ($open)
        <div>
            <x-formularios.form-farmaco titulo="Nuevo Farmaco" :presentaciones="$presentaciones"/>
        </div>
        @endif
        @if ($open_edit)
        <div>
            <x-formularios.form-farmaco titulo="Editar Farmaco" :id=$id :presentaciones="$presentaciones"/>
        </div>
        @endif

        <tbody>
            @if($farmacos->isEmpty())
                <x-componentes.no-data colspan="{{count($cabeceras)+1}}" mensaje="No hay farmacos registrados." />
            @else
                @foreach($farmacos as $farmaco)
                    <x-componentes.tb-fila :fila="$farmaco" :datos="$cabeceras" :estado="$estado"/>
                @endforeach
            @endif
        </tbody>
    </table>
    @if ($farmacos->hasPages())
    <div
        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        {{$farmacos->links()}}
    </div>
    @endif
</div>