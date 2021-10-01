<x-app-layout>
  <x-slot name="header_content">
    <h1>Crear Libro</h1>
  </x-slot>

  <div>
    <livewire:admin.books.create-update action="createBook" />
  </div>
</x-app-layout>