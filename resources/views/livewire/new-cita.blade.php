<div>
    <button type="button" wire:click="set('open', true)"
        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg
            bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
        Agendar cita
    </button>
    @if ($open)
    <x-componentes.form-base titulo='Agendar Cita'>
        <div class="mb-4 ">
            <!-- datos paciente -->
            <div class="col-span-2 sm:col-span-1 pt-4 grid gap-4 mb-4 grid-cols-2">

                <!-- Fecha de la cita -->
                <div class=" col-span-2 sm:col-span-1">
                    <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de la
                        Cita</label>
                    <div class="relative max-w-sm">
                        <input type="text" wire:model.live="fecha"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="dd/mm/yyyy">
                    </div>
                </div>

                <!-- Hora de la cita -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora de la
                        Cita:</label>
                    <div class="flex">
                        <input type="time" wire:model.live="hora"
                            class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            min="09:00" max="18:00" value="00:00">

                        </span>
                    </div>
                </div>

                <!-- motivo -->
                <div class="col-span-2">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Motivo de la
                        consulta </label>
                    <textarea wire:model.live='motivo' rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Describe los Motivos de la consulta ...."></textarea>
                </div>
            </div>
            <button type="button" wire:click="save"
                class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800  ">
                Agregar
            </button>

    </x-componentes.form-base>

    @endif
    {{$motivo}}
    {{$fecha}}
    {{$hora}}
</div>