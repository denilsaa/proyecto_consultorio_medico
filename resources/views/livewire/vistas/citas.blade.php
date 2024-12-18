<div
    class="relative overflow-x-auto sm:rounded-2xl shadow-[0px_10px_50px_20px] shadow-sky-500/50 dark:shadow-gray-700/50">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <x-componentes.tb-encabezado titulo="Citas" viewBox="0 0 16 16" :estado="$estado">
            <x-slot name="icono">
                <path
                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />

            </x-slot>
        </x-componentes.tb-encabezado>

        <div class="p-4">
            <a href="{{ route('reporte.citas') }}" target="_blank">
                <button class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Generar Reporte
                </button>
            </a>
        </div>
        

        <div>

            <x-componentes.tb-thead :campos="$cabeceras" :sort="$sort" :direction="$direction" />
            @if ($open)
                <div>
                    <x-formularios.form-citas titulo="Nuevo Cita" :pacientes="$pacientes" />
                </div>
            @endif
            @if ($open_edit)
                <div>
                    <x-formularios.form-citas titulo="Editar Cita" :id=$id />
                </div>
            @endif

            <tbody>
                @if ($citas->isEmpty())
                    <x-componentes.no-data colspan="{{ count($cabeceras) + 1 }}" mensaje="No hay citas registrados." />
                @else
                    @foreach ($citas as $cita)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://cdn-icons-png.flaticon.com/512/12266/12266251.png" alt="Usuario">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">
                                        {{ $cita->paciente }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{ $cita->carnet }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $cita->telefono }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $cita->fecha }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $cita->doctor }}
                            </td>
                            <td class="px-6 py-4">
                                <x-componentes.estado-indicador :estado="$cita->confirmada" />
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
    </table>
    @if ($citas->hasPages())
        <div
            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            {{ $citas->links() }}
        </div>
    @endif
</div>
