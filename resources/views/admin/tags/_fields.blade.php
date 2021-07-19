<form wire:submit.prevent="{{ $saveMethod == "save" ? "store" : "update" }}">
  <div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
      <div class="relative">
        <input id="name" wire:model.debounce.50="name" type="text" class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-rose-600" placeholder="john@doe.com" />
        <label for="name" class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Nombre</label>
            
        <x-jet-input-error for="name" />
      </div>
    </div>

    <div class="px-2 py-3 bg-gray-50 text-center sm:px-3">
      @if ($saveMethod == "save")
        <x-button-success>Guardar</x-button-success>
      @else
        <x-button-success>Actualizar</x-button-success>
      @endif

      <x-jet-danger-button wire:click="clearPage()">Cancelar</x-jet-danger-button>
    </div>
  </div>
</form>