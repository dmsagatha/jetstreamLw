<x-app-layout>
  <div>
    <livewire:admin.companies.create-update action="save" :companyId="request()->companyId" />
  </div>
</x-app-layout>