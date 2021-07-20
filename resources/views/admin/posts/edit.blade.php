<div>
  <a class="btn btn-green" wire:click="$set('isModalOpen', true)">
    <i class="fas fa-edit"></i>
  </a>

  <x-jet-dialog-modal wire:model="isModalOpen">
    <x-slot name="title">
      Actualizar Post
    </x-slot>

    <x-slot name="content">
      <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Imagen cargando!</strong>
        <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
        </span>
      </div>

      @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="" class="mb-4">
      @else
        <img src="{{ Storage::url($post->image) }}" alt="" class="mb-4">
      @endif

      <div class="relative mt-2">
        <x-input type="text" name="post.title" label="Título" />
        <x-error for="title" />
      </div>

      <div class="relative mt-12">
        <x-jet-label value="Contenido" />
        <textarea wire:model="post.content" class="w-full form-control" rows="6"></textarea>

        <x-jet-input-error for="content" />
      </div>

      <div class="mb-4">
        <x-jet-input type="file" wire:model="image" />
        <x-jet-input-error for="image" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('isModalOpen', false)">
        Cancelar
      </x-jet-secondary-button>
      
      <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
        Actualizar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
</div>