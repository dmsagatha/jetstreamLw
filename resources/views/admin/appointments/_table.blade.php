<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
      <th scope="col" wire:click.prevent="sortBy('id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @include('shared._sort-icon', ['field' => 'id'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('name')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Nombre
        @include('shared._sort-icon', ['field' => 'name'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('date')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Fecha
        @include('shared._sort-icon', ['field' => 'date'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('status')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Estado
        @include('shared._sort-icon', ['field' => 'status'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('description')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Descripción
        @include('shared._sort-icon', ['field' => 'description'])
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Acciones</span>
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($appointments as $item)
      <tr>
        <td class="px-6 py-4 text-center">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4">
          {{ $item->name }}
        </td>
        <td class="px-6 py-4 text-center">
          {{ $item->date }}
        </td>
        <td class="px-6 py-4">
          {{ $item->status }}
        </td>
        <td class="px-6 py-4">
          {{ Str::limit($item->description, 50) }}
        </td>
        <td class="px-6 py-4 text-sm font-medium"> 
          <a href="/equipos/editar/{{ $item->id }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
            <i class="fas fa-edit mr-2"></i>
          </a>
          <a href="" class="text-red-600 hover:text-red-900" title="Eliminar">
            <i class="fas fa-trash mr-2"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>