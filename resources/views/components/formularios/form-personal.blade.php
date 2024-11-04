@props(['titulo','id' => null, 'personal' => null]) <!-- un prop es un valor que se pasa a un componente de Blade. -->

<x-componentes.form-base :titulo="$titulo">

    <div class="grid gap-4 mb-4 grid-cols-2">
        <!-- Nombre -->
        <div class="col-span-2">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" wire:model="nombre" placeholder="Denilson Asis" >
        </div>
        <!-- Apellido Paterno -->
        <div class="col-span-2 sm:col-span-1">
            <label for="ap_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</label>
            <input type="text" wire:model="ap_paterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Savedra" >
        </div>
        <!-- Apellido Materno -->
        <div class="col-span-2 sm:col-span-1">
            <label for="ap_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
            <input type="text" wire:model="ap_materno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Mamani" >
        </div>
        <!-- Fecha de Contratacion -->
        <div class="col-span-2">
            <label for="fecha_contrato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feche de Contratacion</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input wire:model="fecha_contrato" datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy">
            </div>
        </div>

        <!-- Correo Electronico -->
        <div class="col-span-2">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
            <input wire:model="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="denil@gmail.com" >
        </div>
        <!-- Telefono -->
        <div class="col-span-2 sm:col-span-1">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
            <input type="tel" wire:model="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="72072764" >
        </div>
        <!-- Carnet de Identidad -->
        <div class="col-span-2 sm:col-span-1">
            <label for="carnet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carnet de Identidad</label>
            <input type="text" wire:model="carnet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="12085546AE" >
        </div>
        <!-- Rol -->
        <div class="col-span-2 sm:col-span-1">
            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
            <select wire:model="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="" {{ $personal && $personal->cargo == '' ? 'selected' : '' }}>Seleccione el cargo</option>
                <option value="Doctor" {{ $personal && Str::lower( $personal->cargo ) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="Enfermera" {{ $personal && Str::lower( $personal->cargo )  == 'enfermera' ? 'selected' : '' }}>Enfermera</option>
                <option value="Enfermero" {{ $personal && Str::lower( $personal->cargo )  == 'enfermero' ? 'selected' : '' }}>Enfermero</option>
            </select>
        </div>
        <!-- Turno -->
        <div class="col-span-2 sm:col-span-1">
            <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turno</label>
            <select wire:model="turno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="" {{ $personal && Str::lower($personal->turno) == '' ? 'selected' : '' }}>Seleccione el turno</option>
                <option value="Mañana" {{ $personal && Str::lower($personal->turno) == 'mañana' ? 'selected' : '' }}>Mañana</option>
                <option value="Tarde" {{ $personal && Str::lower($personal->turno) == 'tarde' ? 'selected' : '' }}>Tarde</option>
                <option value="Noche" {{ $personal && Str::lower($personal->turno) == 'noche' ? 'selected' : '' }}>Noche</option>
            </select>
        </div>
    </div>
    <button type="button" wire:click="save" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800" >
        {{ $personal ? 'Guardar Cambios' : 'Agregar' }}
    </button>

</x-componentes.form-base>
