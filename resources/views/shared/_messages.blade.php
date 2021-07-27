@if (session()->has('success'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md mt-6 px-2 mx-8">
    <div class="mr-6 bg-warning-500 rounded px-4 py-2  text-center -ml-3">
      <svg fill="none" viewBox="0 0 24 24" class="w-8 h-8 text-white" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-warning-500 text-lg font-semibold mr-2 ">{{ session('success') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-red-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif

@if (session()->has('info'))
  <div x-data="{ show: true }" x-show="show"
    class="w-11/12 md:w-3/5 my-2 rounded-r-md px-6 border-l-4 -ml-4 border-gray-100 bg-red-400">
    <div class="flex items-center py-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <div class="ml-5">
        <h1 class="font-semibold text-gray-800 text-lg">{{ session('info') }}</h1>
      </div>
      <div class="flex justify-end flex-1">
        <button type="button" @click="show = false" class="text-red-100">
          <span class="text-2xl text-gray-800">&times;</span>
        </button>
      </div>
    </div>
  </div>
@endif

@if (session()->has('warning'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md mt-6 px-2 mx-8">
    <div class="mr-6 bg-yellow-500 rounded px-4 py-2  text-center -ml-3">
      <svg fill="none" viewBox="0 0 24 24" class="w-8 h-8 text-white" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-yellow-500 text-lg font-semibold mr-2 ">{{ session('warning') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-red-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif

@if (session()->has('danger'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md mt-6 px-2 mx-8">
    <div class="mr-6 bg-red-500 rounded px-4 py-2  text-center -ml-3">
      <svg fill="none" viewBox="0 0 24 24" class="w-8 h-8 text-white" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-red-500 text-lg font-semibold mr-2 ">{{ session('danger') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-red-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif

@if (session()->has('error'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md mt-6 px-2 mx-8">
    <div class="mr-6 bg-teal-500 rounded px-4 py-2  text-center -ml-3">
      <svg fill="none" viewBox="0 0 24 24" class="w-8 h-8 text-white" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-teal-500 text-lg font-semibold mr-2 ">{{ session('error') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-red-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif