<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Estudiantes')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Estudiantes
    </h2>
  </x-slot>

  <x-table>
    <div class="items-center justify-between bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
      <!-- Paginador y Buscador -->
      <div class="flex items-center text-gray-500 text-sm">
        <label for="perPage">Mostrar</label>
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>

        <span>registros</span>

        {{-- <x-search name="search" label="Escribir el término de busquedad" />

        @if ($search !== '')
          <button wire:click="clearPage" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif --}}

        <div class="px-2 py-4 flex items-center">
          <label for="perPage">Filtrar por Clases</label>
          <select class="mx-2 form-control">
            <option value="">Todas las Clases</option>
            @foreach ($lessons as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="px-2 py-4 flex items-center">
          <label for="perPage">Secciones</label>
          <select class="mx-2 form-control">
            <option value="">Seleccionar Sección</option>
          </select>
        </div>

        @if ($checked)
          <div x-data="{ open: false }" class="relative">
            <!-- Dropdown toggle button -->
            <button @click="open = true" class="flex w-44 items-center p-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <span class="mr-4">Eliminar seleccionados ({{ count($checked) }})</span>
              <i class="fas fa-angle-down"></i>
            </button>
            <!-- Dropdown List -->            
            <div x-show="open" @click.away="open = false" class="absolute w-44 right-0 py-2 mt-2 bg-white divide-y divide-gray-600 rounded-md shadow-xl">
              <a href="#" type="button" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-400 hover:text-white" onclick="confirm('Esta seguro de eliminar los registros seleccionados?') || event.stopImmediatePropagation()" wire:click="deleteRecords()">
                <i class="far fa-trash-alt text-red-600 mr-2"></i>Eliminar
              </a>
            </div>
          </div>
        @endif
      </div><!-- Paginador y Buscador -->
    </div><!-- items-center justify-between -->

    {{-- @foreach ($checked as $item)
      {{ $item }}
    @endforeach --}}

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