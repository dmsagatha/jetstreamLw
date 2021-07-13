<form wire:submit.prevent="{{ $saveMethod=="save"?"store":"update" }}">
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
      <button type="submit"
        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 uppercase">
        {{ isset($this->tag->id) ? 'Actualizar' : 'Guardar'}}
      </button>
      <x-jet-danger-button wire:click="clearPage()">
        Cancelar
      </x-jet-danger-button>
    </div>
  </div>
</form>