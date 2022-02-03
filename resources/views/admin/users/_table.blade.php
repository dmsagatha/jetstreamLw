<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-sm-center text-sm font-bold align-middle">
    <tr>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Edit</span>
      </th>
      <th scope="col" wire:click.prevent="sortBy('id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @include('shared._sort-icon', ['field' => 'id'])
      </th>
      <th scope="col"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Imagen
      </th>
      <th scope="col" wire:click.prevent="sortBy('name')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Nombre
        @include('shared._sort-icon', ['field' => 'name'])
      </th>
      <th scope="col"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Estatus
      <th scope="col" wire:click.prevent="sortBy('email')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Correo Electrónico
        @include('shared._sort-icon', ['field' => 'email'])
      </th>
      <th scope="col" class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Rol
        @include('shared._sort-icon', ['field' => 'email'])
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Edit</span>
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($users as $item)
      <tr>
        <td class="px-6 py-4">
          <div class="flex justify-center p-12">
            <!-- Dropdown -->
            <div x-data="{ open: false }" class="relative">
              <button x-on:click="open = true" class="block h-12 w-12 rounded-full overflow-hidden focus:outline-none">
                <img class="h-full w-full object-cover" src="https://eu.ui-avatars.com/api/?name=John&size=1000" alt="avatar">
              </button>
              <!-- Dropdown Body -->
              <div x-show.transition="open" x-on:click.away="open = false" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">
                <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" wire:click="showModal({{ $item->id }})">
                  Editar
                </a>
                <a href="javascript:void(0)" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" onclick="borrarUsuario({{ $item->id }})">
                  Eliminar
                </a>
                <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                <div class="py-2">
                  <hr></hr>
              </div>
              <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">    
                Logout
              </a>
            </div>
            <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->
          </div>
        </td>
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
        <td class="px-6 py-4 text-center">
          <div class="text-sm text-gray-900">
            {{-- <livewire:buttons.active :model="$item" :field="'active'" :key="'active'.$item->id" /> --}}

            <livewire:toggle-button
              :model="$item"
              field="active"
              key="{{ $item->id }}" />

            {{-- @livewire('toggle-button', [
                'model' => $item,
                'field' => 'active',
            ]) --}}
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
          <a href="javascript:void(0)" class="text-red-600 hover:text-red-900" onclick="borrarUsuario({{ $item->id }})">
            Eliminar
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>