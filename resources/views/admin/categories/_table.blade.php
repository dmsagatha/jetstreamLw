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
      @if(!$active)
        <th scope="col" class="uppercase">
          Estatus
        </th>
      @endif
      <th scope="col" class="relative px-6 py-3">
        Acciones
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($categories as $item)
      <tr>
        <td class="px-6 py-4">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4">
          {{ $item->name }}
        </td>
        @if(!$active)
          <td class="px-6 py-4">
            {{ $item->status ? 'Activo' : 'No Activo'}}
          </td>
        @endif
        <td class="px-6 py-4 text-sm font-medium text-center">
          <x-jet-button wire:click="confirmCategoryEdit({{ $item->id }})" class="bg-orange-500 hover:bg-orange-700">
            Editar
          </x-jet-button>
          Eliminar
        </td>
      </tr>
    @endforeach
  </tbody>
</table>