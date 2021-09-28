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
          <a href="{{ route('books.edit', $item) }}">
            <i class="fa fa-edit mr-2"></i>
          </a>

          <a role="button" href="/libros/editar/{{ $item->id }}" class="mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
          </a>
          
          <a href="{{ route('books.edit', $item) }}" class="">
            <button type="button"
              class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </button>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>