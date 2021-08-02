<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
      <th></th>
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
      <th scope="col" wire:click.prevent="sortBy('price')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Precio
        @include('shared._sort-icon', ['field' => 'price'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('description')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Descripción
        @include('shared._sort-icon', ['field' => 'description'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('category_name')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Categorías
        @include('shared._sort-icon', ['field' => 'category_name'])
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($products as $item)
      <tr class="@if ($this->isChecked($item->id))
          bg-gray-300
        @endif">
        <td class="px-6 py-4 text-center">
          <input type="checkbox" value="{{ $item->id }}" wire:model="selectedRecords">
        </td>
        <td class="px-6 py-4 text-center">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4">
          {{ $item->name }}
        </td>
        <td class="px-6 py-4">
          ${{ number_format($item->price, 2) }}
        </td>
        <td class="px-6 py-4">
          {{ Str::limit($item->description, 50) }}
        </td>
        <td class="px-6 py-4">
          {{ $item->category_name ?? '' }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>