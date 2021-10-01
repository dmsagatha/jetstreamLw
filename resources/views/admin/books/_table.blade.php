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
      <th scope="col" wire:click.prevent="sortBy('pages')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Páginas
        @include('shared._sort-icon', ['field' => 'pages'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('author')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Autor
        @include('shared._sort-icon', ['field' => 'author'])
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Edit</span>
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($books as $item)
      <tr>
        <td class="px-6 py-4 text-center">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4">
          {{ $item->name }}
        </td>
        <td class="px-6 py-4">
          {{ $item->pages }}
        </td>
        <td class="px-6 py-4">
          {{ $item->author }}
        </td>
        <td class="px-6 py-4 text-sm font-medium">
          <a role="button" href="/libros/editar/{{ $item->id }}" class="mr-3">
            <i class="fas fa-16px fa-pen"></i>
          </a>

          {{-- <a href="{{ route('books.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
            <i class="fas fa-edit mr-2"></i>
          </a> --}}
          {{-- <a href="{{ route('books.edit', $item->id) }}">
            <i class="fa fa-edit text-blue-600 mr-2"></i>
          </a> --}}
          {{-- <a wire:click="edit({{ $item->id }})" href="#">
            <i class="fa fa-edit text-blue-600 mr-2"></i>
          </a> --}}
          {{-- <a wire:click="showForm({{ $item->id }})" class="text-indigo-600 hover:text-indigo-900" href="#">
            Editar
          </a> --}}
            | 
          <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="text-red-600 hover:text-red-900" title="Eliminar">
            <i class="fas fa-trash mr-2"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>