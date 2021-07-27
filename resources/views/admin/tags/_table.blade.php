<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
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
      <th scope="col" class="relative px-6 py-3">
        Acciones
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($tags as $item)
      <tr>
        <td class="px-6 py-4">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4">
          {{ $item->name }}
        </td>
        <td class="px-6 py-4 text-sm font-medium text-center">
          <a wire:click="edit({{ $item->id }})" href="#" class="text-indigo-600 hover:text-indigo-900" title="Editar">
            <i class="fas fa-edit mr-2"></i>
          </a>
          <a href="javascript:void(0)" class="text-red-600 hover:text-red-900" onclick="destroyRegister({{ $item->id }})" title="Eliminar">
            <i class="fas fa-times mr-2"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>