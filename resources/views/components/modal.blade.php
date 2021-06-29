<div x-data="{ show: false }" x-show="show" id="modalFormDelete">
  <div class="fixed inset-0 bg-gray-900 opacity-90"></div>

  <div class="bg-white shadow-md p-4 max-w-sm h-48 m-auto rounded-md fixed inset-0">
    <div class="flex flex-col h-full justify-between">
      <header>
        <h3 class="font-bold text-lg">{{ $title }}</h3>
      </header>

      <main class="mb-4">
        {{ $body }}
      </main>

      <footer class="text-center">
        {{ $footer }}
      </footer>
    </div>
  </div>
</div>
{{-- <div x-data="{ show: false }" x-show="show"> --}}

  <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Open Modal</button>

  <button type="button" class="focus:outline-none openModal text-white text-sm py-2.5 px-5 mt-5 mx-5  rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">Open Modal</button>