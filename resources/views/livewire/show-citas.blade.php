<div>
    <button
        class="text-left w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
        role="menuitem" type="button" wire:mouseenter="set('open', true)">
        {{__('Citas')}}
    </button>
    @if ($open)
    <div
        class="fixed top-0 left-0 z-40 h-auto p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800 rounded-xl drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
        <h5 id="drawer-left-label"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
                class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>Lista de citas</h5>
        <button wire:click="set('open', false)"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>

        @foreach ($citas as $cita )
        <div
            class="block items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 ">
            <div class="flex items-center">
                <div class="mr-6">
                    <h6 class="text-base font-semibold text-gray-700 dark:text-gray-300">{{$cita->paciente->nombre}}
                    </h6>
                    <p class="text-base text-gray-500 dark:text-gray-400">{{$cita->fecha}} {{$cita->hora}}</p>
                </div>
                <button wire:click="showCita({{$cita->id}})"
                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-500 dark:focus:ring-red-800 ">cancelar
                </button>
            </div>

        </div>
        @endforeach

        @endif
    </div>