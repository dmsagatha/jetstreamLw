<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Productos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Productos | Datatables con Buscador y Filtros
    </h2>
  </x-slot>

  <x-table>
    <div class="items-center justify-between bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
      <!-- Paginador y Buscador -->
      <div class="flex items-center text-gray-500 text-sm">
        <span>Mostrar</span>
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>

        <span>registros</span>
      </div><!-- Paginador y Buscador -->
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