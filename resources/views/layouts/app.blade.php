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
  <body class="h-screen overflow-hidden flex items-center justify-center bg-indigo-50 text-gray-800">
    <div class="w-full">
      <div x-data="{ sidebarOpen: false }">
        <div class="flex h-screen bg-gray-100 font-sans">
          <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 xxl:hidden"></div>

          <!-- Sidebar -->
          @include('layouts.includes.sidebar')

          <!-- Navbar, Contenido y Pie de página -->
          <div class="relative w-full flex flex-col h-screen overflow-x-hidden">
            <!-- Navbar -->
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

            <!-- Pie de página -->
            <footer class="w-full bg-white text-center text-xl sm:text-2xl p-4">
              Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
          </div>
          <!-- Navbar, Contenido y Pie de página -->
        </div><!-- flex h-screen -->
      </div><!-- sidebarOpen -->
    </div><!-- w-full -->

    @stack('modals')

    @livewireScripts
    
    @stack('scripts')
  </body>
</html>