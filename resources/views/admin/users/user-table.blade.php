<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <x-table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
      <div class="flex text-gray-500">
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        
        <input wire:model="search" type="text" class="form-input w-full text-gray-500 mx-6" placeholder="Ingrese el término de busquedad">
        
        <select wire:model="userRole" class="mx-2 form-control">
          <option value="">Todos los Roles</option>
          <option value="user">Usuario</option>
          <option value="reviewer">Revisor</option>
          <option value="admin">Administrador</option>
        </select>

        @if ($search !== '')
          <button wire:click="clearSearch" class="ml-2">
            <i class="fa fa-eraser"></i>
          </button>
        @endif
      </div>
    </div>

    @if (count($users))
      @include('admin.users._table')

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