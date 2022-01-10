<div class="p-1 mt-2 space-x-1 space-y-2">
  <a
      href="{{ route("screens.edit", ["screen" => $screen]) }}"
      class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition"
  >
    <i class="fas fa-pencil-alt"></i> Editar
  </a>

  <a
      href="#"
      wire:click.prevent="openModalForDeleteScreen('{{ $screen->id }}')"
      class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition"
  >
    <i class="fas fa-trash"></i> Eliminar
  </a>
</div>