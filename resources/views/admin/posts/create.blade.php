<div>
  <x-jet-danger-button wire:click="$set('isModalOpen', true)" class="ml-2">
    Crear Post
  </x-jet-danger-button>

  <x-jet-dialog-modal wire:model="isModalOpen">
    <x-slot name="title">
      Crear nuevo Post
    </x-slot>

    <x-slot name="content">
      <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Imagen cargando!</strong>
        <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
        </span>
      </div>

      @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="" class="mb-4">
      @endif

      <div class="relative form-group mt-2">
        <x-input type="text" name="title" id="title" wire:model.defer="title" />
        <x-label for="title" class="required" value="Título" />
        <x-error for="title" />
      </div>

      <div class="relative form-group mt-12">
        <x-label for="content" class="required" value="Contenido" />
        <textarea wire:model="content" class="w-full form-control" rows="4"></textarea>
        <x-error for="content" />
      </div>

      <div class="form-group mt-8">
        <x-jet-input type="file" wire:model="image" id="{{ $identifier }}" />
        <x-error for="image" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('isModalOpen', false)">
        Cancelar
      </x-jet-secondary-button>
      
      <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
        Guardar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
</div>