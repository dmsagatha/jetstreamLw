<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Productos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Productos | Datatables con Buscador y Filtros en Tablas Relacionadas
    </h2>
  </x-slot>

  <x-table>
    <div class="flex items-center justify-center text-sm text-gray-500 bg-white px-4 py-3 gap-x-2 border-t border-gray-200 sm:px-6">
      <div class="flex flex-wrap items-center">
        <label for="perPage">Mostrar</label>
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>

        <span>registros</span>
      </div>

      <div class="relative flex-1 mx-4">
        <x-search name="search" label="Término de búsqueda" />
        <div class="absolute right-0 top-0 mt-2 mr-2">
          @if ($search !== '')
            <button wire:click="clearPage">
              <i class="fa fa-eraser"></i>
            </button>
          @else
            <i class="fa fa-search h-6 w-6 text-gray-400"></i>
          @endif
        </div>
      </div>

      <div class="self-center">
        <label for="perPage" class="py-3">Filtrar Categorías</label>
        <select class="mx-2 form-control" wire:model="byCategory">
          <option value="">Seleccionar</option>
          @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
    </div><!-- items-center justify-between -->
    
    @if (count($products))
      @include('admin.products._table')

      @if ($products->hasPages())
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $products->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>
</div>