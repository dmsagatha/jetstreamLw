<x-jet-dialog-modal wire:model="isModalOpen">
  <x-slot name="title">
    {{ isset($this->category->id) ? 'Editar Categoría' : 'Crear Categoría'}}
  </x-slot>

  <x-slot name="content">
    <div class="relative mt-6">
      <x-form type="text" name="category.name" label="Nombre" />
      <x-error for="category.name" />
    </div>

    <div class="relative mt-8">
      <label class="flex items-center">
        <input type="checkbox" wire:model="category.status" class="form-checkbox" />
        <span class="ml-2 text-sm text-gray-600">Active</span>
      </label>
    </div>
  </x-slot>

  <x-slot name="footer">
    <x-jet-secondary-button wire:click="closeModal()">
      Cancelar
    </x-jet-secondary-button>
    
    
    <x-jet-danger-button wire:click="save">
      {{ isset($this->category->id) ? 'Actualizar' : 'Guardar'}}
    </x-jet-danger-button>
  </x-slot>
</x-jet-dialog-modal>