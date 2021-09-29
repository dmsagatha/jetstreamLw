<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Citas')

  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">Programar Citas</h2>
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
      
      <!-- Botón Crear -->
      <div class="flex items-center">
        <a href="{{ route('appointments.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
        </a>
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