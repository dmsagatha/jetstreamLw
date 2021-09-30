<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Editar Usuario') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Usuario</a></div>
      <div class="breadcrumb-item"><a href="{{ route('books.index') }}">Editar Usuario</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:admin.books.create-update action="save" :bookId="request()->bookId" />
  </div>
</x-app-layout>