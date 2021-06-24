<div>
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

          <select wire:model="amount" class="mx-2 form-control">
            <option value="10">5</option>
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
      </div>

      @if ($posts->count())
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50 text-center">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Título
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Contentido
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr> 
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $item)
              <tr>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    {{ $item->id }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    {{ $item->title }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    {{ $item->content }}
                  </div>
                </td>
                <td class="px-6 py-4 text-right text-sm font-medium">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      @else
        <div class="px-6 py-4">
          No existen registros coincidentes
        </div>          
      @endif
    </x-table>
  </div>
</div>