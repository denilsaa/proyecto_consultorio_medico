@props(['titulo','modal','id' => null, 'paciente' => null]) 

<x-componentes.form-base :titulo="$titulo" :modal="$modal">
    <!-- Modal body -->
    <form method="POST" action="{{ $paciente ? route('pacientes.update', $paciente->paciente_id) : route('pacientes.store') }}" class="p-4 md:p-5">
        @csrf
        @if ($id !== null)
            @method('PUT')            
        @endif
        <div class="grid gap-4 mb-4 grid-cols-2">
            <!-- Nombre -->
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Denilson Asis" required="" value="{{$paciente->usuario->nombre ?? ''}}">
            </div>
            <!-- Apellido Paterno -->
            <div class="col-span-2 sm:col-span-1">
                <label for="ap_pa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</label>
                <input type="text" name="ap_pa" id="ap_pa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Savedra" required="" value="{{$paciente->usuario->ap_paterno ?? ''}}">
            </div>
            <!-- Apellido Materno -->
            <div class="col-span-2 sm:col-span-1">
                <label for="ap_ma" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                <input type="text" name="ap_ma" id="ap_ma" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mamani" required="" value="{{$paciente->usuario->ap_materno ?? ''}}">
            </div>
            <!-- Carnet de Identidad -->
            <div class="col-span-2 sm:col-span-1">
                <label for="carnet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">C.I.</label>
                <input type="text" name="carnet" id="carnet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12085546AE" required="" value="{{$paciente->usuario->carnet ?? ''}}">
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="col-span-2 sm:col-span-1">
                <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Nacimiento</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-autohide" datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xx/xx/xxxx" value="{{$paciente->usuario->fecha_nacimiento ?? ''}}">
                </div>
            </div>
            <!-- Telefono -->
            <div class="col-span-2 sm:col-span-1">
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                <input type="tel" pattern="[0-9]{7}" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="72072764" required="" value="{{$paciente->usuario->telefono ?? ''}}">
            </div>
            <!-- Telefono de emergencia  -->
            <div class="col-span-2 sm:col-span-1">
                <label for="telefono_emergencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono de Emergencia</label>
                <input type="tel" pattern="[0-9]{7}" name="telefono_emergencia" id="telefono_emergencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="72072764" required="" value="{{$paciente->telefono_emergencia ?? ''}}">
            </div>
            <!-- Correo Electronico -->
            <div class="col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electronico</label>
                <input type="email" pattern=".+@example\.com" email="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="denil@gmai.com" required="" value="{{$paciente->usuario->correo ?? ''}}">
            </div>
        </div>
        <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800" >
            {{ $paciente ? 'Guardar Cambios' : 'Agregar' }}
        </button>
    </form>

</x-componentes.form-base>
