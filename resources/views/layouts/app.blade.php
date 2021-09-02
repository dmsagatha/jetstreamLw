<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('/images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>
  <body class="min-h-screen font-sans antialiased relative lg:flex bg-gray-100">
    <div x-data="{ open: false }">
      <div class="flex h-screen bg-gray-100">
        <div :class="open ? 'block' : 'hidden'" @click="open = false"
          class="fixed z-20 inset-0 bg-black opacity-50 xxl:hidden"></div>
        
        <x-jet-banner />

          @include('layouts.includes.sidebar')

          <!-- Navbar - Barra de navegación -->
          <div class="relative z-0 lg:flex-grow">
            {{-- <header class="flex bg-gray-700 text-white items-center">
              <!-- Botón Sidebar -->
              <button @click="open = true"
                class="p-2 focus:outline-none focus:bg-gray-600 hover:bg-gray-600 rounded-md lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
              </button>
              <span class="block text-white font-semibold text-2xl sm:text-3xl p-4">Jetstream</span>
            </header> --}}
            @include('layouts.includes.navbar')
          
            <!-- Page Heading -->
            @if (isset($header))
              <header class="bg-white shadow mt-14">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  {{ $header }}
                </div>
              </header>
            @endif

            <!-- Page Content -->
            <main>
              {{ $slot }}
            </main>
          </div>
        </div>
      </div>

    @stack('modals')

    @livewireScripts
    
    @stack('scripts')
  </body>
</html>