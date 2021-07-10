<div wire:init="loadRecords" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Categorias')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Categorías
    </h2>
  </x-slot>

  <x-table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
      <!-- Paginador y Buscador -->
      <div class="flex items-center text-gray-500">
        <span>Mostrar</span>
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>

        <span>registros</span>

        <input wire:model="search" type="text" class="form-input w-full text-gray-500 mx-6"
          placeholder="Ingrese el término de busquedad">

        @if ($search !== '')
          <button wire:click="clearPage" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif

        <div class="px-2 py-4 flex items-center">
          {{-- @livewire('admin.categories.create-update')  --}}
          <x-jet-danger-button wire:click="showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </x-jet-danger-button>
        </div>
      </div>
    </div>

    @if (count($categories))
      @include('admin.categories._table')

      @if ($categories->hasPages())
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $categories->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>

  {{-- <x-jet-dialog-modal wire:model="confirmingCategoryAdd">
    <x-slot name="title">
      {{ isset( $this->category->id) ? 'Editar Categoría' : 'Crearrrr Categoría'}}
    </x-slot>

    <x-slot name="content">
      <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="category.name" />
        <x-jet-input-error for="category.name" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4 mt-4">
        <label class="flex items-center">
          <input type="checkbox" wire:model.defer="category.status" class="form-checkbox" />
          <span class="ml-2 text-sm text-gray-600">Active</span>
        </label>
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('confirmingCategoryAdd', false)" wire:loading.attr="disabled">
        {{ __('Cancel') }}
      </x-jet-secondary-button>

      <x-jet-danger-button class="ml-2" wire:click="saveCategory()" wire:loading.attr="disabled">
        {{ __('Save') }}
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal> --}}
</div>

@push('modals')
  @livewire('admin.categories.create-update')
@endpush