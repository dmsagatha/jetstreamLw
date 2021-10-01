<x-app-layout>
  <x-slot name="header_content">
    <h1>Editar Libro</h1>
  </x-slot>

  <div>
    <livewire:admin.books.create-update action="updateBook" :bookId="request()->bookId" />
  </div>
</x-app-layout>