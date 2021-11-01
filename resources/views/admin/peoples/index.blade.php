<div wire:init="loadRecords" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Personas')

  @if ($typeForm === 'crud')
    @include('admin.peoples._fields')
  @endif

  @if ($typeForm === 'list')
    <x-slot name="header">
      <h2 class="font-semibold text-xl leading-tight">
        Personas
      </h2>
    </x-slot>
    
    <x-table>
      <!-- Paginar, Buscar y Filtros -->
      <div
        class="flex items-center justify-center text-sm text-gray-500 bg-white px-4 py-6 gap-x-2 border-t border-gray-200 sm:px-6 z-50">
        <!-- Paginar -->
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
          <x-jet-danger-button wire:click="create()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </x-jet-danger-button>
        </div>
      </div>
      <!-- Paginar, Buscar y Crear con modal -->
      
      @if (count($peoples))
        @include('admin.peoples._table')

        @if ($peoples->hasPages())
          <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
            {{ $peoples->links() }}
          </div>
        @endif
      @else
        <div class="px-6 py-4">
          No existen registros coincidentes
        </div>
      @endif
    </x-table>
  @endif

  <x-confirmation-alert />
</div>