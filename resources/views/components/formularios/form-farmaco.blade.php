@props(['titulo','id' => null,'presentaciones'])

<x-componentes.form-base :titulo="$titulo">

    <div class="grid gap-4 mb-4 grid-cols-2">
        <!-- Nombre -->
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" wire:model.live="nombre" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="ibuprofeno" >
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <!--  cantidad -->
        <div class="col-span-2 sm:col-span-1">
            <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
            <input type="number" wire:model.live="cantidad"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="10">
            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
        </div>
        <!-- Fecha de Vencimiento -->
        <div class="col-span-2 sm:col-span-1" >
            <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                Vencimiento</label>
            <div class="relative max-w-sm" >
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker type="text" wire:model.live="fecha_vencimiento"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="dd/mm/yyyy">
            </div>
            <x-input-error :messages="$errors->get('fecha_vencimiento')" class="mt-2" />
        </div>
        <!-- Presentacion -->
        <div class="col-span-2">
            <label for="presentacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Presentacion</label>
            <select wire:model.live="presentacion"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected="">Seleccione la presentacion</option>

                @foreach ($presentaciones as $presentacion )
                    <option value="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                @endforeach
            </select>
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