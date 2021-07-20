<div wire:init="loadRecords" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Categorias')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Categorías
    </h2>
  </x-slot>

  <x-table>
    <div class="items-center justify-between bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
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

        <span class="mr-2">registros</span>

        <x-search name="search" label="Escribir el término de busquedad" />

        @if ($search !== '')
          <button wire:click="clearPage" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif

        <div class="px-2 py-4 flex items-center">
          <x-jet-danger-button wire:click="showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </x-jet-danger-button>
        </div>
      </div><!-- Paginador y Buscador -->
    </div><!-- items-center justify-between -->

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
</div>

@push('modals')
  @livewire('admin.categories.create-update')
@endpush
  
@push('scripts')
  <script>
    function destroyRegister(category) {
      if(confirm('Esta seguro de eliminar la Categoría?')) {
        Livewire.emit('deleteRegisterList', category)
      } else {
        alert('No se eliminó la Categoría.')
      }
    }
    Livewire.on('deleteRegister', (category) => {
      alert(`La Categoría ${category.name} se eliminó correctamente!`);
    });
  </script>
@endpush