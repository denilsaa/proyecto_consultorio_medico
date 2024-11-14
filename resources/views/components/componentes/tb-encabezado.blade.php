@props(['titulo', 'viewBox' => '0 0 0 0','estado','estados'=> ['Activo'=>true,'Inactivo'=>false]])
<caption
    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
    <!-- Titulo -->
    <h1
        class="text-3xl text-black dark:text-white mb-2 flex items-center w-full p-2 text-basetransition duration-75 rounded-lg group">
        <!-- Icono -->
        <svg class="w-8 h-8 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="35" height="35" fill="currentColor" viewBox="{{$viewBox}}">
            {{$icono}}
        </svg>
        <!-- Titulo -->
        Lista de {{$titulo}}
    </h1>
    <!-- Buscador y acciones -->
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0">
        <!-- buscador -->
        <div class="">
            <label for="buscar_{{$titulo}}" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="buscar_{{$titulo}}" wire:model.live="search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar {{$titulo}}">
            </div>
        </div>
        <!-- Acciones -->
        <div class="ml-2">
            <select
                class="block text-sm text-gray-500 bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:focus:ring-gray-700"
                wire:model.live="cant">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="ml-2">
            <select
                class="block text-sm text-gray-500 bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:focus:ring-gray-700"
                wire:model.live="estado">
                @foreach ($estados as $key => $value)
                    <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex">

{{--             <div class="ml-2">
                @if ($estado == 'true')
                <button wire:click="delete"
                    class="text-white hover:text-white bg-red-600 border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-red-500 dark:text-gray-100 dark:hover:text-black dark:hover:bg-red-500 dark:focus:ring-red-800 transition-all duration-200">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a 1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                </button>
                @else
                <button wire:click="undo"
                    class="text-white hover:text-white bg-yellow-400 border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-yellow-500 dark:text-gray-100 dark:hover:text-black dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 transition-all duration-200">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                    </svg>
                </button>
                @endif
            </div> --}}
            
            <!-- Nuevo -->
            <div class="ml-2 mr-8">
                <!-- Modal toggle -->
                <x-componentes.btn-new wire:click="$set('open',true)">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>                    
                </x-componentes.btn-new>
            </div>
        </div>
    </div>
</caption>