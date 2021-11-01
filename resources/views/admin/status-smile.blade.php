<div>
  @if ($status)
    <button type="button" class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
      <i class="far fa-smile text-white" title="Activo"></i>
    </button>
  @else
    <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white capitalize tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">
      <i class="far fa-grin-squint-tears text-white" title="Inactivo"></i>
    </button>
  @endif
</div>