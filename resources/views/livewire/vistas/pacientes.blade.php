<div
    class="relative overflow-x-auto sm:rounded-2xl shadow-[0px_10px_50px_20px] shadow-sky-500/50 dark:shadow-gray-700/50">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <x-componentes.tb-encabezado titulo="Pacientes" viewBox="0 0 22 22" :estado="$estado">
            <x-slot name="icono">
                <path fill-rule="evenodd"
                    d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z"
                    clip-rule="evenodd" />

            </x-slot>
            <x-slot name="btn">

            </x-slot>
        </x-componentes.tb-encabezado>

        <x-componentes.tb-thead :campos="$cabeceras" :sort="$sort" :direction="$direction" />
        @if ($open)
        <div>
            <x-formularios.form-pacientes titulo="Nuevo Paciente" />
        </div>
        @endif
        @if ($open_edit)
        <div>
            <x-formularios.form-pacientes titulo="Editar Paciente" :id=$id />
        </div>
        @endif

        <tbody>
            @if($pacientes->isEmpty())
            <x-componentes.no-data colspan="{{count($cabeceras)+1}}" mensaje="No hay pacientes registrados." />
            @else
            @foreach($pacientes as $paciente)

            <x-componentes.tb-fila :fila="$paciente" :datos="$cabeceras" :estado="$estado">

            </x-componentes.tb-fila>
            @endforeach
            @endif

        </tbody>
    </table>
    @if ($pacientes->hasPages())
    <div
        class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        {{$pacientes->links()}}
    </div>
    @endif
</div>