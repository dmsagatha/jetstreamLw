<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <x-table>
    @if (count($users))
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text-center text-base font-bold">
          <tr>
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
              Correo Electrónico
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
                <div class="text-sm text-gray-900">
                  {{ $item->name }}
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900">
                  {{ $item->email }}
                </div>
              </td>
              <td class="px-6 py-4 text-sm font-medium">
                Acciones
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      @if ($users->hasPages())
      <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $users->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>
</div>