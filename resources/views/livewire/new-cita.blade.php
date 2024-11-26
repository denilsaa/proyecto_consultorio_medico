<div>
    <button wire:click="openModal"
        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg
            bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
        Agendar Cita        
    </button>

    @teleport('body')
        <div class="fixed inset-0 flex items-center justify-center z-50"
            style="display: @if ($open) flex @else none @endif;">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <x-componentes.form-base titulo="Agendar una Cita" width="max-w-2xl">

                <div class="grid grid-cols-2 gap-4">
                
                <div class="mb-4">
                    <label for="fecha" wire:model='fecha' class="block text-sm font-medium text-gray-700">Fecha</label>
                    <input type="date" id="fecha" wire:model="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                    <input type="time" id="hora" wire:model="hora" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                </div>
                <div class="mb-4">
                    <label for="motivo" class="block text-sm font-medium text-gray-700">Motivo</label>
                    <textarea id="motivo" wire:model="motivo" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <BUTTON wire:click="save" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">Agendar</BUTTON>
                </x-componentes.form-base>
            </div>
        </div>
    @endteleport
</div>
