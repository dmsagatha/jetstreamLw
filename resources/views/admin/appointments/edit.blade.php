<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">Actualizar Equipo</h2>
  </x-slot>

  <div class="py-2">@include('shared._messages')</div>

  <x-table>
    <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-3 space-y-6 sm:p-4">
        <livewire:admin.appointments.create-update action="update" :appointmentsId="request()->appointmentsId" />
      </div>
    </div>
  </x-table>
</x-app-layout>