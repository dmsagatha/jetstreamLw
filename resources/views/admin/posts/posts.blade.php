<div>
  @section('title', 'Posts')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
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
        
        <x-jet-input class="flex-1 mr-4 mx-4" type="text" wire:model="search" placeholder="Buscar registros" />

        @if ($search !== '')
          <button wire:click="clearSearch" class="ml-6">
            <i class="fa fa-eraser"></i>
          </button>
        @endif

        @livewire('admin.posts.create')
      </div><!-- Paginador y Buscador -->

      @if ($posts->count())
        @include('admin.posts._table')
      @else
        <div class="px-6 py-4">
          No existen registros coincidentes
        </div>
      @endif

      @if ($posts->hasPages())
        <div class="px-6 py-3">
          {{ $posts->links() }}
        </div>
      @endif
    </x-table>
  </div>
</div>