<div wire:init="loadPost">
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Listado de Categorias
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-table>
      {{--$search--}}
      <div class="px-6 py-4 flex items-center">
        {{-- Show by list --}}

        <div class="flex items-center">
          <span>{{ __('Show') }}</span>

          <select wire:model="amount" class="mx-2 form-control">
            <option value="10">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>

          <span>{{ __('results') }}</span>
        </div>

        <!--<input type="text" wire:model="search" placeholder="Buscar registros">-->
        <x-jet-input class="flex-1 mr-4 mx-4" type="text" wire:model="search" placeholder="Buscar registros" />
      </div>

      @if (count($categories))
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50 text-center font-extrabold uppercase">
            <tr>
              <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-xs  text-gray-500 tracking-wider" wire:click="order('id')">
                ID

                @if ($sort == 'id')
                  @if ($direction == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-right mt-1"></i>
                @endif
              </th>
              <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-xs  text-gray-500 tracking-wider" wire:click="order('name')">
                Nombre

                @if ($sort == 'name')
                  @if ($direction == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-right mt-1"></i>
                @endif
              </th>
              <th scope="col" class="cursor-pointer px-6 py-3 text-xs  text-gray-500 tracking-wider"
              wire:click="order('description')">
                Descripción

                @if ($sort == 'description')
                  @if ($direction == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-right mt-1"></i>
                @endif
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editar</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($categories as $item)
              <tr>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900 text-center">{{ $item->id }}</div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">{{ $item->name }}</div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">{{ $item->description }}</div>
                </td>  
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                  <a class="btn bg-green-600 text-white" wire:click="edit({{ $item }})">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @if ($categories->hasPages())
          <div class="px-6 py-3">
            {{ $categories->links() }}
          </div>
        @endif
      @else
        <div class="px-6 py-4">
          {{ __('There is no records') }}
        </div>
      @endif
    </x-table>
  </div>
</div>