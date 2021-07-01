<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-base font-bold align-middle">
    <tr>
      <th scope="col" wire:click.prevent="sortBy('id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @include('includes._sort-icon', ['field' => 'id'])
      </th>
      <th scope="col"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Imagen
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
      <th scope="col" class="px-6 py-3 text-gray-500 tracking-wider cursor-pointer">
        Rol
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
          <div class="text-sm text-gray-900 w-10 h-10">
            <img class="rounded-full" src="{{ asset('storage/'.$item->image_user) }}" alt="{{ $item->name }}">
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
        <td class="px-6 py-4">
          <div class="text-sm text-gray-900">
            {{ $item->role_full }}
          </div>
        </td>
        <td class="px-6 py-4 text-sm font-medium">
          <a href="#" class="text-indigo-600 hover:text-indigo-900" wire:click="showModal({{ $item->id }})">
            Editar
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>