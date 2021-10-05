<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
      <th scope="col" wire:click.prevent="sortBy('id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @include('shared._sort-icon', ['field' => 'id'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('company_name')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Nombre
        @include('shared._sort-icon', ['field' => 'company_name'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('company_address')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Dirección
        @include('shared._sort-icon', ['field' => 'company_address'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('company_website')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Página Web
        @include('shared._sort-icon', ['field' => 'company_website'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('company_email')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Correo Electrónico
        @include('shared._sort-icon', ['field' => 'company_email'])
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Edit</span>
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($companies as $item)
      <tr>
        <td class="px-6 py-4 text-center">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4">
          {{ $item->company_name }}
        </td>
        <td class="px-6 py-4">
          {{ $item->company_address }}
        </td>
        <td class="px-6 py-4">
          {{ $item->company_website }}
        </td>
        <td class="px-6 py-4">
          {{ $item->company_email }}
        </td>
        <td class="px-6 py-4 text-sm font-medium">
          <a href="{{ route('companies.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
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