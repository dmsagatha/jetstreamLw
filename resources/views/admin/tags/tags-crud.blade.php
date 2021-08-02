<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Etiquetas')

  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:mt-0 md:col-span-2 my-5 rounded-lg">
      <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
        <h2 class="text-gray-900 text-center text-2xl font-bold py-3">
          Listado de Etiquetas
        </h2>

        <!-- Paginador y Buscador -->
        <div class="items-center justify-between px-4 py-3 sm:px-6 text-sm">
          <div class="flex text-gray-500">
            <div class="flex items-center">
              <span>Mostrar</span>

              <select wire:model="perPage" class="mx-1 form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              
              <span>registros</span>
            </div><!-- select -->

            <x-search name="search" label="Término de búsqueda" />
  
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

    <div class="md:col-span-1 my-1 rounded-lg">
      <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
        <h2 class="text-gray-900 text-center text-2xl font-bold py-3">
          {{ isset($this->tag->id) ? 'Editar Etiqueta' : 'Crear Etiqueta'}}
        </h2>
        
        <div class="px-4 py-3 space-y-6 sm:p-4">
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