<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-sm font-bold align-middle">
    <tr>
      <th scope="col" wire:click.prevent="sortByColumn('id')"
        class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @if ($sortColumn == 'id')
            <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
        @else
            <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
        @endif
      </th>
      <th scope="col" wire:click.prevent="sortByColumn('name')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Nombre
        @if ($sortColumn == 'name')
            <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
        @else
            <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
        @endif
      </th>
      <th scope="col" wire:click.prevent="sortByColumn('price')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Precio
        @if ($sortColumn == 'price')
            <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
        @else
            <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
        @endif
      </th>
      <th scope="col" wire:click.prevent="sortByColumn('description')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Descripción
        @if ($sortColumn == 'description')
            <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
        @else
            <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
        @endif
      </th>
      <th scope="col" wire:click.prevent="sortByColumn('category_name')"
        class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Categorías
        @if ($sortColumn == 'category_name')
            <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
        @else
            <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
        @endif
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 text-sm">
    @foreach ($products as $item)
    <tr>
      <td class="px-6 py-4">
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
        {{ $item->category->name ?? '' }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>