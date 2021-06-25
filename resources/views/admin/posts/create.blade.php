<div>
  <x-jet-danger-button wire:click="$set('isModalOpen', true)">
    Crear Post
  </x-jet-danger-button>

  <x-jet-dialog-modal wire:model="isModalOpen">
    <x-slot name="title">
      Crear nuevo Post
    </x-slot>

    <x-slot name="content">
      <div class="mb-4">
        <x-jet-label value="Título" />
        <x-jet-input type="text" wire:model="title" class="w-full" />

        <x-jet-input-error for="title" />
      </div>

      <div class="mb-4">
        <x-jet-label value="Contenido" />
        <textarea wire:model="content" class="w-full form-control" rows="6"></textarea>

        <x-jet-input-error for="content" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('isModalOpen', false)">
        Cancelar
      </x-jet-secondary-button>

      <x-jet-danger-button wire:click="save()">
        Guardar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
</div>