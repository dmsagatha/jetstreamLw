<div wire:init="loadRecords">
  @section('title', 'Posts')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }} - Coders Free
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-table>
      {{--$search--}}
      <div class="px-6 py-4 flex items-center">
        {{-- Show by list --}}
        <div class="flex items-center">
          <span>{{ __('Show') }}</span>

          <select wire:model="perPage" class="mx-2 form-control">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>

          <span>{{ __('results') }}</span>
        </div>
        
        <x-jet-input class="flex-1 mx-4" type="text" wire:model="search" placeholder="Buscar registros" />

        @if ($search !== '')
          <button wire:click="clearSearch" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif

        @livewire('admin.posts.create')
      </div><!-- Paginador y Buscador -->

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
  </div>

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