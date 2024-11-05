@props(['titulo','id' => null])
<!-- un prop es un valor que se pasa a un componente de Blade. -->

<x-componentes.form-base :titulo="$titulo">

    <div class="grid gap-4 mb-4 grid-cols-2">
        <!-- Nombre -->
        <div class="col-span-2">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                wire:model.live="nombre" placeholder="Denilson Asis">
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <!-- Apellido Paterno -->
        <div class="col-span-2 sm:col-span-1">
            <label for="ap_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                Paterno</label>
            <input type="text" wire:model.live="ap_paterno"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Savedra">
            <x-input-error :messages="$errors->get('ap_paterno')" class="mt-2" />
        </div>
        <!-- Apellido Materno -->
        <div class="col-span-2 sm:col-span-1">
            <label for="ap_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                Materno</label>
            <input type="text" wire:model.live="ap_materno"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Mamani">
            <x-input-error :messages="$errors->get('ap_materno')" class="mt-2" />
        </div>
        <!-- Fecha de Contratacion -->
        <div class="col-span-2">
            <label for="fecha_contrato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feche de
                Contratacion</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input wire:model.live="fecha_contrato" datepicker datepicker-autohide type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="dd/mm/yyyy">
                <x-input-error :messages="$errors->get('fecha_contrato')" class="mt-2" />
            </div>
        </div>

        <!-- Correo Electronico -->
        <div class="col-span-2">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                Electrónico</label>
            <input wire:model.live="correo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="denil@gmail.com">
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>
        <!-- Telefono -->
        <div class="col-span-2 sm:col-span-1">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
            <input type="tel" wire:model.live="telefono"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="72072764">
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>
        <!-- Carnet de Identidad -->
        <div class="col-span-2 sm:col-span-1">
            <label for="carnet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carnet de
                Identidad</label>
            <input type="text" wire:model.live="carnet"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="12085546AE">
            <x-input-error :messages="$errors->get('carnet')" class="mt-2" />
        </div>
        <!-- Rol -->
        <div class="col-span-2 sm:col-span-1">
            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
            <select wire:model.live="cargo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option>Seleccione el cargo
                </option>
                <option value="Doctor">Doctor</option>
                <option value="Enfermera">Enfermera</option>
                <option value="Enfermero">Enfermero</option>
            </select>
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>
        <!-- Turno -->
        <div class="col-span-2 sm:col-span-1">
            <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turno</label>
            <select wire:model.live="turno"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="">Seleccione el
                    turno</option>
                <option value="Mañana">Mañana</option>
                <option value="Tarde">Tarde</option>
                <option value="Noche">Noche</option>
            </select>
            <x-input-error :messages="$errors->get('turno')" class="mt-2" />
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