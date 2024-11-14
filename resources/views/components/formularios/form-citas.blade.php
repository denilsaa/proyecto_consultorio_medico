@props(['titulo','id' => null,'presentaciones'])

<x-componentes.form-base :titulo="$titulo">

    <div class="mb-4 ">
        <!-- datos paciente -->
        <div class="col-span-2 sm:col-span-1 grid gap-4 mb-4 grid-cols-2">
            <p class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                Datos del Paciente
            </p>
            <!-- Nombre del Paciente -->
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Denilson Asis" required="">
            </div>
            <!-- Carnet de identidad del paciente -->
            <div class="col-span-2 sm:col-span-1">
                <label for="carnet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CI</label>
                <input type="text" name="carnet" id="carnet"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="12085546AE" required="">
            </div>
            <p class="text-lg font-semibold text-gray-900 dark:text-white mb-2 col-span-2"">
                Datos de la cita
            </p>


            <!-- Fecha de la cita -->
            <div class=" col-span-2 sm:col-span-1">
                <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de la
                    Cita</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input id="datepicker-autohic" datepicker datepicker-autohide type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="dd/mm/yyyy">
            </div>
        </div>

        <!-- Hora de la cita -->
        <div class="col-span-2 sm:col-span-1">
            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora de la
                Cita:</label>
            <div class="flex">
                <input type="time" id="time"
                    class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    min="09:00" max="18:00" value="00:00" required>
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Nombre del Paciente -->
        <div class="col-span-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo de la
                consulta </label>
            <textarea id="message" rows="6"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Describe los Motivos de la consulta ...."></textarea>
        </div>
    </div>
    </div>
    @if($id)
    <button type="button" wire:click="update"
        class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
        Guardar Cambios
    </button>

    @else
    <button type="button" wire:click="save"
        class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
        Agregar
    </button>

    @endif


</x-componentes.form-base>