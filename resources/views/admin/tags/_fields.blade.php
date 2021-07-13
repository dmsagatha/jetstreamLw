<form wire:submit.prevent="{{ $saveMethod == "save" ? "store" : "update" }}">
  <div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6">
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
          <input type="text" wire:model.debounce.50="name" autocomplete="name"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

            <x-jet-input-error for="name" />
        </div>
      </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
      @if ($saveMethod == "save")
        <x-button-success>
          Guardar
        </x-button-success>
      @else
        <x-button-success>
          Actualizar
        </x-button-success>
      @endif

      <x-jet-danger-button wire:click="clearPage()">
        Cancelar
      </x-jet-danger-button>
    </div>
  </div>
</form>