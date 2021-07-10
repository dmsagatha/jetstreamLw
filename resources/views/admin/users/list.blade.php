<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Usuarios Registrados - 
      <a href="https://www.youtube.com/watch?v=9T2VT7ulmZA&list=PL6qvAWOEyjho62mYc7dwogK_NbDXYvi1H" target="_blank">lauchoIT - Livewire CRUD</a>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        @livewire('admin.users.user-table')
        
      </div>
    </div>
  </div>

  @push('modals')
    {{-- @livewire('admin.modal') --}}
    @livewire('admin.users.create')
  @endpush
</x-app-layout>