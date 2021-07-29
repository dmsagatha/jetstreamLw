<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  @section('title', 'Productos')

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Productos
    </h2>
  </x-slot>

  <x-table>
    @if (count($products))
      @include('admin.products._table')

      @if ($products->hasPages())
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $products->links() }}
        </div>
      @endif
    @else
      <div class="px-6 py-4">
        No existen registros coincidentes
      </div>
    @endif
  </x-table>
</div>