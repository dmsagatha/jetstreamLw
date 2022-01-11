@if ($screenForDelete && is_array($screenForDelete))
  <x-jet-dialog-modal wire:model="screenForDelete">
    <x-slot name="title">
      ¿Deseas eliminar la Pantalla {{ $screenForDelete["serial"] }}?
    </x-slot>

    <x-slot name="content">
      {{ $screenForDelete["size"] }}
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('screenForDelete', null)" wire:loading.attr="disabled">
        Cancelar
      </x-jet-secondary-button>

      <x-jet-danger-button class="ml-2" wire:click="deleteScreen" wire:loading.attr="disabled">
        Eliminar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
@endif

@if (isset($massiveDelete) && $massiveDelete)
  <x-jet-dialog-modal wire:model="massiveDelete">
    <x-slot name="title">
      ¿Deseas eliminar las pantallas seleccionadas?
    </x-slot>

    <x-slot name="content">
      Esta acción no se puede deshacer, se eliminarán {{ $this->selectedRowsQuery()->count() }} libros.
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('massiveDelete', null)" wire:loading.attr="disabled">
        Cancelar
      </x-jet-secondary-button>

      <x-jet-danger-button class="ml-2" wire:click="deleteScreens" wire:loading.attr="disabled">
        Eliminar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
@endif