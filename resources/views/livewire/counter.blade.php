<div>
    <button wire:click="openModal">Abrir Modal</button>

    @teleport('body')
        <div class="fixed inset-0 flex items-center justify-center z-50"
            style="display: @if ($open) flex @else none @endif;">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <button wire:click="close">Cerrar</button>
                <div>
                    <!-- Contenido del modal -->
                    <p>Este es un modal</p>

                    <div wire:ignore inline-datepicker datepicker-buttons datepicker-autoselect-today
                        class="mx-auto sm:mx-0">

                    </div>

                    <x-formularios.form-citas titulo="Nuevo Cita" />
                </div>
            </div>
        </div>
    @endteleport
</div>
