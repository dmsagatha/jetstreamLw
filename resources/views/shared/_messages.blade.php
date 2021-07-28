@if (session()->has('success'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md px-2 mx-8">
    <div class="mr-6 bg-green-500 rounded px-4 py-2  text-center -ml-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-green-500 text-lg font-semibold mr-2 ">{{ session('success') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-green-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif

@if (session()->has('info'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md px-2 mx-8">
    <div class="mr-6 bg-blue-500 rounded px-4 py-2  text-center -ml-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-blue-500 text-lg font-semibold mr-2 ">{{ session('info') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-blue-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif

@if (session()->has('warning'))
  <div x-data="{ show: true }" x-show="show" 
    class="flex w-30 items-center bg-white shadow rounded-md px-2 mx-8">
    <div class="mr-6 bg-red-500 rounded px-4 py-2  text-center -ml-3">      
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-red-500 text-lg font-semibold mr-2 ">{{ session('warning') }}</h2>
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
    class="flex w-30 items-center bg-white shadow rounded-md px-2 mx-8">
    <div class="mr-6 bg-yellow-500 rounded px-4 py-2  text-center -ml-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>
    <div class="flex items-center">
      <h2 class="text-yellow-500 text-lg font-semibold mr-2 ">{{ session('error') }}</h2>
    </div>
    <div class="flex justify-end flex-1" @click="show = false">
      <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 text-yellow-600" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
  </div>
@endif

@if (session()->has('danger'))
  <div x-data="{ show: true }" x-show="show"
    class="w-11/12 md:w-3/5 my-2 rounded-r-md px-6 border-l-4 -ml-4 border-gray-100 bg-red-400">
    <div class="flex items-center py-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <div class="ml-5">
        <h1 class="font-semibold text-gray-800 text-lg">{{ session('danger') }}</h1>
      </div>
      <div class="flex justify-end flex-1">
        <button type="button" @click="show = false" class="text-red-100">
          <span class="text-2xl text-gray-800">&times;</span>
        </button>
      </div>
    </div>
  </div>
@endif