<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
      <th scope="col"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
      </th>
      <th scope="col"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        N°
      </th>
      <th scope="col" wire:click.prevent="sortBy('id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @include('shared._sort-icon', ['field' => 'id'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('user_id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wuser_ider cursor-pointer">
        Cliente
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
        <td class="w-28 px-6 py-4 text-center">

          <div x-data="{ show: false }" @click.away="show = false">
            <a @click="show = ! show" type="button">
              <i class="fa fa-ellipsis-v text-2xl"></i>
            </a>
            <div x-show="show" class="absolute w-28 bg-gray-100 z-10 shadow-md">
              <a href="{{ route('appointments.edit', $item) }}" class="block px-3 py-2">
                <i class="fas fa-edit mr-2"></i>Editar
              </a>
              <a href="#" class="block px-3 py-2">
                <i class="fas fa-eye mr-2"></i>Mostrar
              </a>
              <hr class="border-t border-gray-200 my-0">
              <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="block px-3 py-2" >
                <i class="fas fa-trash mr-2"></i>Eliminar
              </a>
            </div>
          </div>

          {{-- <div x-data="{ show: false }"  @click.away="show = false" class="mb-2">
            <a @click="show = ! show" type="button" class="flex justify-end bg-blue-600 text-gray-200 rounded-lg px-2 py-3 focus:outline-none focus:border-white text-sm">
            <i class="fa fa-ellipsis-v"></i>
            </a>
            <div x-show="show" class="absolute bg-gray-100 z-10 shadow-md" style="min-width:10rem">
              <a href="{{ route('appointments.edit', $item) }}" class="block px-3 py-2">
                <i class="fas fa-edit mr-2"></i>Editar
              </a>
              <a href="#" class="block px-3 py-2">
                <i class="fas fa-eye mr-2"></i>Mostrar
              </a>
              <hr class="border-t border-gray-200 my-0">
              <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="block px-3 py-2" >
                <i class="fas fa-trash mr-2"></i>Eliminar
              </a>
            </div>
          </div> --}}


          <div class="flex justify-center p-12">
            <!-- Dropdown -->
            <div x-data="{ open: false }" class="relative">
              <button x-on:click="open = true" class="block h-12 w-12 rounded-full overflow-hidden focus:outline-none">
                <img class="h-full w-full object-cover" src="https://eu.ui-avatars.com/api/?name=John&size=1000" alt="avatar">
              </button>
              <!-- Dropdown Body -->
              <div x-show.transition="open" x-on:click.away="open = false" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">
                <a href="{{ route('appointments.edit', $item) }}" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" title="Editar">
                  <i class="fas fa-edit mr-2"></i>Editar
                </a>
      
                <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" title="Eliminar">
                  <i class="fas fa-trash mr-2"></i>Eliminar
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
        <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
        <td class="px-6 py-4 text-center">{{ $item->id }}</td>
        <td class="px-6 py-4">{{ $item->user->name }}</td>
        <td class="px-6 py-4">{{ $item->name }}</td>
        <td class="px-6 py-4 text-center">{{ $item->date }}</td>
        <td class="px-6 py-4 text-center">
          <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-semibold text-gray-700 bg-{{ $item->status_badge }}-400 rounded-full">
            {{ App\Models\Appointment::STATUS_SELECT[$item->status] ?? '' }}
          </span>
        </td>
        <td class="px-6 py-4">{{ Str::limit($item->description, 50) }}</td>
        <td class="px-6 py-4 text-sm font-medium">
          <a href="{{ route('appointments.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
            <i class="fas fa-edit mr-2"></i>
          </a>

          <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="text-red-600 hover:text-red-900" title="Eliminar">
            <i class="fas fa-trash mr-2"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>