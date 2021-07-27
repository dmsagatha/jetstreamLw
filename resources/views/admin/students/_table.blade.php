<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
      <th></th>
      <th scope="col"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
      </th>
      <th scope="col"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Nombre
      </th>
      <th scope="col"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Clases
      </th>
      <th scope="col"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Secciones
      </th>
      <th scope="col"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Correo Electrónico
      </th>
      <th scope="col"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Teléfono
      </th>
      <th scope="col" class="relative px-6 py-3">Acciones</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($students as $item)
    <tr>
      <td class="px-6 py-4">
        <input type="checkbox" value="{{ $item->id }}" wire:model="checked" />
      </td>
      <td class="px-6 py-4">{{ $item->id }}</td>
      <td class="px-6 py-4">{{ $item->name }}</td>
      <td class="px-6 py-4">{{ $item->lesson->name }}</td>
      <td class="px-6 py-4">{{ $item->section->name }}</td>
      <td class="px-6 py-4">{{ $item->address}}</td>
      <td class="px-6 py-4">{{ $item->phone_number }}</td>
      <td class="px-6 py-4 text-sm font-medium">
        <a href="#" class="text-red-600 hover:text-red-900" onclick="confirm('Esta seguro de eliminar el registro?') || event.stopImmediatePropagation()" wire:click="deleteSingleRecord({{ $item->id }})" title="Eliminar">
          <i class="fas fa-trash mr-2"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>