<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Estudiantes')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Estudiantes | Datatables
    </h2>
    <h3>
      Buscador | Filtros en Tablas Relacionadas | Eliminación Masiva de Rregistros
    </h3>
  </x-slot>

  <div class="py-2">@include('shared._messages')</div>

  <x-table>
    <div class="flex items-center justify-center text-sm text-gray-500 bg-white px-4 py-6 gap-x-2 border-t border-gray-200 sm:px-6">
      <div class="flex flex-wrap items-center mt-3">
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
        <label for="perPage" class="py-3">Filtrar Lecciones</label>
        <select class="mx-2 form-control" wire:model="selectedLesson">
          <option value="">Seleccionar</option>
          @foreach ($lessons as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>

      @if ($selectedLesson != 0 && !is_null($selectedLesson))
        <div class="self-center">
          <label for="perPage" class="py-3">Filtrar Secciones</label>
          <select class="mx-2 form-control" wire:model="selectedSection">
            <option value="">Seleccionar</option>
            @foreach ($sections as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
      @endif
    </div><!-- Paginador, Buscador y Filtros -->

      @if ($checked)
        <div class="flex items-center justify-center text-sm text-gray-500 bg-white px-4 py-3 gap-x-2 border-t border-gray-200 sm:px-6">
          <div x-data="{ open: false }" class="relative">
            <!-- Dropdown toggle button -->
            <button @click="open = true" class="flex w-44 items-center p-2 bg-red-600 text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <span class="mr-4">Eliminar seleccionados ({{ count($checked) }})</span>
              <i class="fas fa-angle-down"></i>
            </button>
            <!-- Dropdown List -->            
            <div x-show="open" @click.away="open = false" class="absolute w-44 right-0 py-2 mt-1 bg-white divide-y divide-gray-600 rounded-md shadow-xl">
              <a href="#" type="button" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-400 hover:text-white" onclick="confirm('Esta seguro de eliminar los registros seleccionados?') || event.stopImmediatePropagation()" wire:click="deleteRecords()">
                <i class="far fa-trash-alt text-red-600 mr-2"></i>Eliminar
              </a>
            </div>
          </div>
        </div><!-- Eliminación masiva -->
      @endif
    
    @if (count($students))
      @include('admin.students._table')

      @if ($students->hasPages())
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $students->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>
</div>