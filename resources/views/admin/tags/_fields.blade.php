<form wire:submit.prevent="{{ $saveMethod == "save" ? "store" : "update" }}">
  <div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
      <div class="relative form-group">
        <x-input type="text" name="name" id="name" wire:model.defer="name" />
        <x-label for="name" class="required" value="Nombre" />
        <x-error for="name" />
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