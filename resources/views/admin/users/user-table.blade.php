<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <x-table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
      <div class="flex text-gray-500">
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        
        <input wire:model="search" type="text" class="form-input w-full text-gray-500 mx-6" placeholder="Ingrese el término de busquedad">

        @if ($search !== '')
          <button wire:click="clearSearch" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif
      </div>
    </div>

    @if (count($users))
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text-center text-base font-bold align-middle">
          <tr>
            <th scope="col" wire:click.prevent="sortBy('id')"
              class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
              ID
              @include('includes._sort-icon', ['field' => 'id'])
            </th>
            <th scope="col" wire:click.prevent="sortBy('name')"
              class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
              Nombre
              @include('includes._sort-icon', ['field' => 'name'])
            </th>
            <th scope="col" wire:click.prevent="sortBy('email')"
              class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
              Correo Electrónico
              @include('includes._sort-icon', ['field' => 'email'])
            </th>
            <th scope="col" class="relative px-6 py-3">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($users as $item)
            <tr>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900">
                  {{ $item->id }}
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900">
                  {{ $item->name }}
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900">
                  {{ $item->email }}
                </div>
              </td>
              <td class="px-6 py-4 text-sm font-medium">
                Acciones
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      @if ($users->hasPages())
      <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $users->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>
</div>