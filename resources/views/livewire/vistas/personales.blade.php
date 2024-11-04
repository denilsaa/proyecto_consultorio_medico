<div
    class="relative overflow-x-auto sm:rounded-2xl shadow-[0px_10px_50px_20px] shadow-sky-500/50 dark:shadow-gray-700/50 ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <x-componentes.tb-encabezado titulo="Personal" viewBox="0 0 24 24">
            <x-slot name="icono">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                    clip-rule="evenodd" />
            </x-slot>

        </x-componentes.tb-encabezado>

        <x-componentes.tb-thead :campos="$cabeceras" :sort="$sort" :direction="$direction" />
        @if ($open)
        <div>
            <x-formularios.form-personal titulo="Nuevo Personal" />
        </div>
        @endif

        <tbody>

            @if($personales->isEmpty())
            <x-componentes.no-data colspan="{{count($cabeceras)+1}}" mensaje="No hay personales registrados." />
            @else
            @foreach($personales as $personal)

            <x-componentes.tb-fila :fila="$personal" :datos="$cabeceras">

            </x-componentes.tb-fila>
            @endforeach
            @endif
        </tbody>{{--
        {{$personales->links()}} --}}
    </table>
</div>