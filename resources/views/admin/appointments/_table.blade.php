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
          {{-- <div class="flex justify-end py-3 px-6 bg-gray-50 border-b">
            <div>Menú</div>
          </div> --}}

          <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group">
            <p class="px-4">Acciones</p>
            <span class="border-l p-2 hover:bg-gray-100">
              <i class="fa fa-ellipsis-v text-2xl"></i>
            </span>

            <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded">
              <ul class="text-left border rounded">
                <li class="px-4 py-1 hover:bg-gray-100 border-b">Menú 1</li>
                <li class="px-4 py-1 hover:bg-gray-100 border-b">Menú 2</li>
                <li class="px-4 py-1 hover:bg-gray-100 border-b">Menú 3</li>
                <li class="px-4 py-1 hover:bg-gray-100">Menú 4</li>
              </ul>
            </div>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>