<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
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
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Dropdown</span>
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($appointments as $item)
      <tr>
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
        <td class="px-6 py-4 text-sm font-medium inline-block">
          <a href="{{ route('appointments.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
            <i class="fas fa-edit mr-2"></i>
          </a>

          <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="text-red-600 hover:text-red-900" title="Eliminar">
            <i class="fas fa-trash mr-2"></i>
          </a>
        </td>
        <td class="px-6 py-4 text-sm font-medium">
          <button class="relative flex justify-center items-center bg-transparent border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 z-20 group">
            <i class="fa fa-ellipsis-v text-xl"></i>

            <div class="absolute hidden group-focus:block right-0 top-full min-w-full w-max bg-gray-100 shadow-md mt-1 rounded">
              <div class="text-left border rounded">
                <a href="{{ route('appointments.edit', $item) }}" class="block px-4 py-1 hover:bg-gray-300 border-b">
                  <i class="fas fa-edit text-blue-400 mr-2"></i>Editar
                </a>

                <a href="#" class="block px-4 py-1 hover:bg-gray-300 border-b">
                  <i class="fas fa-eye text-green-400 mr-2"></i>Mostrar
                </a>
      
                <a href="" wire:click.prevent="confirmRemoval({{ $item->id }})" class="block px-4 py-1 hover:bg-gray-300 border-b">
                  <i class="fas fa-trash text-red-400 mr-2"></i>Eliminar
                </a>
              </div>
            </div>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>