<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Usuarios')
  
  <x-table>
    <div class="items-center justify-between bg-white px-4 py-3  border-t border-gray-200 sm:px-6">
      <!-- Paginador y Buscador -->
      <div class="flex items-center text-gray-500">
        <span>Mostrar</span>
        <select wire:model="perPage" class="mx-2 form-control">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>

        <span class="mr-2">registros</span>

        <x-search name="search" label="Escribir el término de busquedad" />
        
        <select wire:model="userRole" class="mx-1 form-control">
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

        <button  
          type="button" 
          wire:click="showModal"
          class="mt-3 w-full inline-flex justify-center rounded-md border border-red-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-red-700 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
          </svg>
        </button>
      </div><!-- Paginador y Buscador -->
    </div><!-- items-center justify-between -->

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
  
  @push('scripts')
    <script>
      function borrarUsuario(user) {
        if(confirm('Esta seguro de eliminar el usuario?')) {
          Livewire.emit('deleteUserList', user)
        } else {
          alert('No se eliminó el usuario.')
        }
      }
      Livewire.on('deleteUser', (user) => {
        alert(`El usuario ${user.name} se eliminó correctamente!`);
      });
    </script>
  @endpush