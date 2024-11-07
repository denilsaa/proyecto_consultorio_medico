@props(['estado', 'id'])
@if ($estado == 'true')
<button wire:click="new_estado({{ $id }}, 0)" class="text-red-400 hover:text-white border border-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-300 dark:text-red-300 dark:hover:text-white dark:hover:bg-red-400 dark:focus:ring-red-900">
    <x-icons.delete />
</button>
@else
<button wire:click="new_estado({{ $id }}, 1)" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
    <x-icons.restore />
</button>
@endif