<div>        
  <x-jet-danger-button wire:click="$set('isModalOpen', true)">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
  </x-jet-danger-button>

  <x-jet-dialog-modal wire:model="isModalOpen">
    <x-slot name="title">
      {{-- {{ isset( $this->category->id) ? 'Editar Categoría' : 'Crearrrr Categoría'}} --}}
      Crear nueva Categoría
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
      <x-jet-secondary-button wire:click="$set('isModalOpen', false)">
        Cancelar
      </x-jet-secondary-button>
      
      <x-jet-danger-button wire:click="save">
        Guardar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
</div>