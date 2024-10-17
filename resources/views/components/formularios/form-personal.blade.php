@props(['titulo','modal','id' => null, 'personal' => null]) <!-- un prop es un valor que se pasa a un componente de Blade. -->

<x-componentes.form-base :titulo="$titulo" :modal="$modal">
    <!-- Modal body -->
    <form method="POST" action="{{ $personal ? route('personal.update', $personal->id) : route('personal.insert') }}" class="p-4 md:p-5">
        @csrf
        @if ($id !== null)
            @method('PUT')            
        @endif
        <div class="grid gap-4 mb-4 grid-cols-2">
            <!-- Nombre -->
            <div class="col-span-2">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$personal->usuario->nombre ?? '' }}" placeholder="Denilson Asis" required>
            </div>
            <!-- Apellido Paterno -->
            <div class="col-span-2 sm:col-span-1">
                <label for="ap_pa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</label>
                <input type="text" name="ap_pa" id="ap_pa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$personal->usuario->ap_paterno ?? '' }}"   placeholder="Savedra" required>
            </div>
            <!-- Apellido Materno -->
            <div class="col-span-2 sm:col-span-1">
                <label for="ap_ma" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                <input type="text" name="ap_ma" id="ap_ma" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$personal->usuario->ap_materno ?? '' }}"  placeholder="Mamani" required>
            </div>
            <!-- Fecha de Contratacion -->
            <div class="col-span-2">
                <div class="relative w-full"> 
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input name="fecha_contratacion" id="fecha_contratacion" datepicker datepicker-title="fecha_contratacion" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$personal->fecha_contrato ?? '' }}" placeholder="Fecha de Contratacion">
                </div>
            </div>

            <!-- Correo Electronico -->
            <div class="col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$personal->usuario->correo ?? '' }}"  placeholder="denil@gmail.com" required>
            </div>
            <!-- Telefono -->
            <div class="col-span-2 sm:col-span-1">
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$personal->usuario->telefono ?? '' }}" placeholder="72072764" required>
            </div>
            <!-- Carnet de Identidad -->
            <div class="col-span-2 sm:col-span-1">
                <label for="carnet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carnet de Identidad</label>
                <input type="text" name="carnet" id="carnet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$personal->usuario->carnet ?? '' }}"  placeholder="12085546AE" required>
            </div>
            <!-- Rol -->
            <div class="col-span-2 sm:col-span-1">
                <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                <select name="rol" id="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="" {{ $personal && $personal->cargo == '' ? 'selected' : '' }}>Seleccione el cargo</option>
                    <option value="Doctor" {{ $personal && Str::lower( $personal->cargo ) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="Enfermera" {{ $personal && Str::lower( $personal->cargo )  == 'enfermera' ? 'selected' : '' }}>Enfermera</option>
                    <option value="Enfermero" {{ $personal && Str::lower( $personal->cargo )  == 'enfermero' ? 'selected' : '' }}>Enfermero</option>
                </select>
            </div>
            <!-- Turno -->
            <div class="col-span-2 sm:col-span-1">
                <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turno</label>
                <select name="turno" id="turno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="" {{ $personal && Str::lower($personal->turno) == '' ? 'selected' : '' }}>Seleccione el turno</option>
                    <option value="Mañana" {{ $personal && Str::lower($personal->turno) == 'mañana' ? 'selected' : '' }}>Mañana</option>
                    <option value="Tarde" {{ $personal && Str::lower($personal->turno) == 'tarde' ? 'selected' : '' }}>Tarde</option>
                    <option value="Noche" {{ $personal && Str::lower($personal->turno) == 'noche' ? 'selected' : '' }}>Noche</option>
                </select>
            </div>
        </div>
        <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800" >{{ $personal ? 'Guardar Cambios' : 'Agregar' }}</button>
    </form>
</x-componentes.form-base>
