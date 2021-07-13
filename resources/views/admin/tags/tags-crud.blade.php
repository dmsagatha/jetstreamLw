<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Etiquetas')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Etiquetas
    </h2>
  </x-slot>

  <x-table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
      <form wire:submit.prevent="store()">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" wire:model="name" autocomplete="name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                  <x-jet-input-error for="name" />
              </div>
            </div>
          </div>

          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Guardar
            </button>
          </div>
        </div>
      </form>
      <!-- Paginador y Buscador -->
      <div class="flex items-center text-gray-500 mt-5">
        <span>Mostrar</span>
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>

        <span>registros</span>

        <input wire:model="search" type="text" class="form-input w-full text-gray-500 mx-6"
          placeholder="Ingrese el término de busquedad">

        @if ($search !== '')
          <button wire:click="clearPage" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif
      </div>

      @if (count($tags))
        @include('admin.tags._table')
  
        @if ($tags->hasPages())
          <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
            {{ $tags->links() }}
          </div>
        @endif
      @else
        <div class="px-6 py-4">
          No existen registros coincidentes
        </div>
      @endif
    </div>
  </x-table>
</div>
  
@push('scripts')
  <script>
    function destroyRegister(tag) {
      if(confirm('Esta seguro de eliminar la Etiqueta?')) {
        Livewire.emit('deleteRegisterList', tag)
      } else {
        alert('No se eliminó la Etiqueta.')
      }
    }
    Livewire.on('deleteRegister', (tag) => {
      alert(`La Etiqueta ${tag.name} se eliminó correctamente!`);
    });
  </script>
@endpush