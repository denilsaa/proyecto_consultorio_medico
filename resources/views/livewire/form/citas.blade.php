<div>
    <div wire:ignore inline-datepicker datepicker-buttons datepicker-autoselect-today class="mx-auto sm:mx-0">

    </div>

    <div>
        <!-- Modal -->
        <div x-data="{ open: false }">
            <button @click="open = ! open">Toggle Modal</button>

            @teleport('body')
                <div x-show="open">
                    Modal contents...
                </div>
            @endteleport
        </div>
    </div>
</div>
