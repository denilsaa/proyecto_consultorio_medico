<div>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>
    {{$title}}
    {{$content}}
    <form wire:submit="save">
        <label>
            <span>Title</span>
     
            <input type="text" wire:model.live="title"> 
        </label>
     
        <label>
            <span>Content</span>
     
            <textarea wire:model="content"></textarea> 
        </label>
     
        <button type="submit">Save</button>
    </form>
</div>
