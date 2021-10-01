<x-app-layout>
  <div>
    <livewire:admin.books.create-update action="save" :bookId="request()->bookId" />
  </div>
</x-app-layout>