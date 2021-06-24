<div>
  <x-jet-danger-button wire:click="$set('isModalOpen', true)">
    {{ __('Create') }}
  </x-jet-danger-button>

  <x-jet-dialog-modal wire:model="isModalOpen">
    <x-slot name="title">
     Crear Categoría
    </x-slot>

    <x-slot name="content">
      <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" class="w-full" wire:model="name" />
      </div>
      {{ $name }}

      <x-jet-input-error for="name" />

      <div class="mb-4">
        <x-jet-label value="Descripción" />
        <textarea class="form-control w-full" rows="6" wire:model="description"></textarea>
        <x-jet-input-error for="description" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('isModalOpen', false)">
        Cancelar
      </x-jet-secondary-button>

      <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
        class="disabled:opacity-25">
        Crear Categoría
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
</div>