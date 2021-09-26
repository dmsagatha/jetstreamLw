<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Productos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">Productos</h2>
    <h3>
      <a href="https://www.youtube.com/watch?v=Kdu6i42rT5U&list=PLGg3vnFos8GMxYSWRBce3LH_SREan7my8&index=11" target="_blank">Clovon</a> 
    </h3>
  </x-slot>

  <div class="py-2">@include('shared._messages')</div>

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

      <!-- Buscar -->
      <div class="relative flex-1 mx-4">
        <x-search name="search" label="Buscar término" />
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
    </div>
    
    @if (count($appointments))
      @include('admin.appointments._table')

      @if ($appointments->hasPages())
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $appointments->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>
</div>