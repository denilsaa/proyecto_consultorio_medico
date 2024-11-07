@slot('estado', $estado)
<div class="flex items-center">
    <div class="h-2.5 w-2.5 rounded-full {{ $estado ? 'bg-green-500' : 'bg-red-700' }} me-2"></div>
    {{ $estado ? 'Activo' : 'Inactivo' }}
</div>