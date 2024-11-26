@props(['titulo', 'id' => null, 'presentaciones', 'pacientes' => null, 'pacientes'])

<x-componentes.form-base :titulo="$titulo" width="max-w-2xl">

    <div class="bg-white p-4 rounded-lg shadow-lg">
        <div class="mb-4">
            <label for="paciente" class="block text-sm font-medium text-gray-700">Paciente</label>
            <select id="paciente" wire:model="paciente_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Seleccione un paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="fecha" wire:model='fecha' class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="fecha" wire:model="fecha_cita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                <input type="time" id="hora" wire:model="hora_cita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>
        <div class="mb-4">
            <label for="motivo" class="block text-sm font-medium text-gray-700">Motivo</label>
            <textarea id="motivo" wire:model="motivo_cita" rows="3"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
        </div>
        <button wire:click="save"
            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
            Agendar
        </button>
    </div>
</x-componentes.form-base>
