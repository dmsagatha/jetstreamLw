<x-jet-dialog-modal wire:model="isModalOpen">
  <x-slot name="title">
    {{ isset($this->category->id) ? 'Editar Categoría' : 'Crear Categoría'}}
  </x-slot>

  <x-slot name="content">
    <div class="mb-4">
      <x-jet-label value="Nombre" />
      <x-jet-input type="text" wire:model="name" class="w-full" />

      <x-jet-input-error for="name" />
    </div>

    <div class="mb-4">
      <label class="flex items-center">
        <input type="checkbox" wire:model="status" class="form-checkbox" />
        <span class="ml-2 text-sm text-gray-600">Active</span>
      </label>
    </div>
  </x-slot>

  <x-slot name="footer">
    <x-jet-danger-button wire:click="closeModal()">
      Cancelar
    </x-jet-danger-button>
    
    <x-jet-secondary-button wire:click="save">
      {{ isset($this->category->id) ? 'Actualizar' : 'Guardar'}}
    </x-jet-secondary-button>
  </x-slot>
</x-jet-dialog-modal>