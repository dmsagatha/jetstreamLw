<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50 text-center text-base font-bold">
    <tr>
      <th scope="col" wire:click.prevent="sortBy('id')" class="w-24 px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        ID
        @include('includes._sort-icon', ['field' => 'id'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('title')" class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Título
        @include('includes._sort-icon', ['field' => 'title'])
      </th>
      <th scope="col" wire:click.prevent="sortBy('content')" class="px-6 py-3 text-gray-500 uppercase tracking-wider cursor-pointer">
        Contentido
        @include('includes._sort-icon', ['field' => 'content'])
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Edit</span>
      </th>
    </tr> 
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($posts as $item)
      <tr>
        <td class="px-6 py-4">
          <div class="text-sm text-gray-900">
            {{ $item->id }}
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="text-sm text-gray-900">
            {{ $item->title }}
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="text-sm text-gray-900">
            {{ $item->content }}
          </div>
        </td>
        <td class="px-6 py-4 text-sm font-medium">
          {{-- @livewire('admin.posts.edit', ['post' => $item], key($item->id)) --}}
          <a class="btn btn-green" wire:click="edit({{ $item }})">
            <i class="fas fa-edit"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>