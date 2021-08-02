<div wire:init="loadRecords" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
  @section('title', 'Posts')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Posts
    </h2>
  </x-slot>

  <x-table>
    <div class="flex items-center justify-center text-sm bg-white px-4 py-6 gap-x-2 border-t border-gray-200 sm:px-6">
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
            <button wire:click="clearSearch">
              <i class="fa fa-eraser"></i>
            </button>
          @else
            <i class="fa fa-search h-6 w-6 text-gray-400"></i>
          @endif
        </div>
      </div>

      @livewire('admin.posts.create')
    </div><!-- Paginador, Buscador y Filtros -->

    @if (count($posts))
      @include('admin.posts._table')

      @if ($posts->hasPages())
        <div class="px-6 py-3">
          {{ $posts->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>

  <x-jet-dialog-modal wire:model="isModalEdit">
    <x-slot name="title">
      Actualizar Post
    </x-slot>

    <x-slot name="content">
      <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Imagen cargando!</strong>
        <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
        </span>
      </div>

      @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="" class="mb-4">
      @else
        <img src="{{ Storage::url($post->image) }}" alt="" class="mb-4">
      @endif

      <div class="mb-4">
        <x-jet-label value="Título" />
        <x-jet-input type="text" wire:model="post.title" class="w-full" />

        <x-jet-input-error for="title" />
      </div>

      <div class="mb-4">
        <x-jet-label value="Contenido" />
        <textarea wire:model="post.content" class="w-full form-control" rows="6"></textarea>

        <x-jet-input-error for="content" />
      </div>

      <div class="mb-4">
        <x-jet-input type="file" wire:model="image" />
        <x-jet-input-error for="image" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('isModalEdit', false)">
        Cancelar
      </x-jet-secondary-button>
      
      <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
        Actualizar
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
</div>