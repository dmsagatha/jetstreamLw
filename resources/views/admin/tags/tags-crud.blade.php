<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Etiquetas')

  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:mt-0 md:col-span-2 my-5 rounded-lg">
      <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
        <h2 class="text-gray-900 text-center text-2xl font-bold py-3">
          Listado de Etiquetas
        </h2>

        <!-- Paginador y Buscador -->
        <div class="items-center justify-between px-4 py-3 sm:px-6">
          <div class="flex text-gray-500">
            <div class="flex items-center">
              <span>Mostrar</span>
              <select wire:model="perPage" class="mx-2 form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
      
              <span class="mr-2">registros</span>
            </div><!-- select -->

            <div class="relative w-full">
              <i class="fa fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
              <input wire:model="search" type="text"
                class="w-full focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-8"
                aria-label="Escribir el término..." placeholder="Escribir el término a buscar..." />
            </div>
  
            @if ($search !== '')
              <button wire:click="clearPage" class="ml-2">
                <i class="fa fa-eraser"></i>
              </button>
            @endif
          </div>
        </div><!-- Paginador y Buscador -->

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
      </div><!-- shadow -->
    </div><!-- table -->

    <div class="md:col-span-1 my-5 rounded-lg">
      <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
        <h2 class="text-gray-900 text-center text-2xl font-bold py-3">
          {{ isset($this->tag->id) ? 'Editar Etiqueta' : 'Crear Etiqueta'}}
        </h2>
        
        <div class="px-4 py-3 space-y-6 sm:p-6">
          @include('admin.tags._fields')
        </div>
      </div>
    </div>
  </div>
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