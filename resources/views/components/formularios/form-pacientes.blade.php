@props(['titulo','id' => null]) 

<x-componentes.form-base :titulo="$titulo" >

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
            
            <!-- Telefono de emergencia  -->
            <div class="col-span-2 sm:col-span-1">
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono de Emegencia</label>
                <input type="tel" wire:model.live="telefono_emergencia"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="72072764">
                <x-input-error :messages="$errors->get('telefono_emergencia')" class="mt-2" />
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
    
    @endif    </form>

</x-componentes.form-base>
