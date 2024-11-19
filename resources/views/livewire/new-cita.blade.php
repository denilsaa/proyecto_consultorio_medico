<div>
    <button wire:click="openModal"
        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg
            bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">Abrir
        Modal</button>

    @teleport('body')
        <div class="fixed inset-0 flex items-center justify-center z-50"
            style="display: @if ($open) flex @else none @endif;">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <x-componentes.form-base titulo="Agendar una Cita" width="max-w-2xl">

                    <h2 class="text-xl text-gray-900 dark:text-white font-bold mb-2">Digital Transformation</h2>
                    <div class="flex items-center space-x-4 rtl:space-x-reverse mb-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-900 dark:text-white text-base font-medium">30.06.2024</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-900 dark:text-white text-base font-medium">California, USA</span>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 rtl:space-x-reverse mb-5">
                        <div>
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">Participants</div>
                            <div class="flex -space-x-4 rtl:space-x-reverse"> <a
                                    class="flex items-center justify-center w-8 h-8 text-xs font-medium text-white bg-gray-700 border border-white rounded-full hover:bg-gray-600 dark:border-gray-800"
                                    href="#">+99</a>
                            </div>
                        </div>
                        <div>
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400 mb-3">Duration</div>
                            <span class="text-gray-900 dark:text-white text-base font-medium block">30 min</span>
                        </div>
                        <div>
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400 mb-3">Meeting Type</div>
                            <span class="text-gray-900 dark:text-white text-base font-medium block">Web conference</span>
                        </div>
                    </div>
                    <div
                        class="pt-5 border-t border-gray-200 dark:border-gray-800 flex sm:flex-row flex-col sm:space-x-5 rtl:space-x-reverse">
                        <div id="datepicker" wire:ignore class="mx-auto sm:mx-0"></div>
                        <div
                            class="sm:ms-7 sm:ps-5 sm:border-s border-gray-200 dark:border-gray-800 w-full sm:max-w-[15rem] mt-5 sm:mt-0">
                            <h3 class="text-gray-900 dark:text-white text-base font-medium mb-3 text-center">Wednesday 30
                                June 2024</h3>
                            <button type="button" data-collapse-toggle="timetable"
                                class="inline-flex items-center w-full py-2 px-5 me-2 justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 text-gray-800 dark:text-white me-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pick a time
                            </button>
                            <label class="sr-only">
                                Pick a time
                            </label>
                            <ul id="timetable" class="grid w-full grid-cols-2 gap-2 mt-5">

                                @foreach ($horarios as $hora)
                                    <li>
                                        <input type="radio" id="{{ $hora }}" value="" class="hidden peer"
                                            name="timetable">
                                        <label for="3-30-pm"
                                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                                            {{ $hora }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <script>
                        const options = {
                            defaultDatepickerId: null,
                            language: 'es',
                            autohide: false,
                            format: 'dd/mm/yyyy',
                            maxDate: null,
                            minDate: 'today',
                            orientation: 'bottom',
                            buttons: true,
                            autoSelectToday: true,
                            title: null,
                            rangePicker: true,
                            onShow: () => {},
                            onHide: () => {},
                        };

                        const instanceOptions = {
                            id: 'datepicker-custom-example',
                            override: true
                        };
                        const datepickerEl = document.getElementById('datepicker');
                        console.log('Options', options);
                        console.log('Instance Options', instanceOptions);
                        console.log('Datepicker Element', datepickerEl);
                        var datepicker = new Datepicker(datepickerEl, options);
                        console.log('Datepicker', datepicker);

                        console.log('fecha', datepicker.getDate());
                    </script>
                </x-componentes.form-base>
            </div>
        </div>
    @endteleport
</div>
