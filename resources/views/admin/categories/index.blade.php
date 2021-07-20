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

        <div class="relative flex-1">
          <input wire:model="search" type="text" class="peer h-10 w-full border border-1.5 rounded-md border-gray-300 text-sm text-gray-900 placeholder-transparent focus:outline-none focus:border-light-blue-500 focus:border-2 p-3" placeholder="search..." />
          <label for="search" class="absolute left-2 px-1 -top-2.5 bg-white text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-gray-600 peer-focus:text-sm">Escribir el término de busquedad</label>
          <div class="absolute right-0 top-0 mt-2 mr-2">
            <i class="fa fa-search h-6 w-6 text-gray-400"></i>
          </div>
        </div>

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