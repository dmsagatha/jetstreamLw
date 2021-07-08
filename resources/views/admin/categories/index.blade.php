<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
        
        <input wire:model="search" type="text" class="form-input w-full text-gray-500 mx-6" placeholder="Ingrese el término de busquedad">

        @if ($search !== '')
          <button wire:click="clearSearch" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif
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
</div>