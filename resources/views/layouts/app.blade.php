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
    <x-jet-banner />
    
      {{-- @livewire('navigation-menu') --}}

      {{-- Sidebar --}}
      {{-- 
        absolute porque viene encima del div del header
        z-10 encima y relative en el div del header
        inset-0 - arriba, derecho, abajo e izquierdo este configurado en 0
       --}}
      <nav class="absolute inset-0 transform -translate-x-full lg:relative z-10 w-48 bg-indigo-900 text-white h-screen p-3">
        <!-- Sidebar - Título y Botón Sidebar -->
        <div class="flex justify-between">
          <span class="block text-md sm:text-2xl font-semibold text-white p-4">Sidebar</span>
          <button
            class="p-1 focus:outline-none focus:bg-indigo-800 hover:bg-indigo-800 rounded-md lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
          </button>
        </div>
        
        <!-- Sidebar - Menú de navegación -->
        <ul class="mt-6">
          <li>
            <a href="#!" class="sidebar-menu-link">
              <i class="fas fa-tachometer-alt sidebar-menu-link-icon"></i>
              <span class="hidden md:inline-flex">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#!" class="sidebar-menu-link">
              <i class="fas fa-hands-helping sidebar-menu-link-icon"></i>
              <span class="hidden md:inline-flex">Proveedores</span>
            </a>
          </li>
          <li>
            <a href="#!" class="sidebar-menu-link">
              <i class="fas fa-shopping-cart sidebar-menu-link-icon"></i>
              <span class="hidden md:inline-flex">Compradores</span>
            </a>
          </li>
          <li>
            <a href="#!" class="sidebar-menu-link">
              <i class="fas fa-file-invoice-dollar sidebar-menu-link-icon"></i>
              <span class="hidden md:inline-flex">Pedidos</span>
            </a>
          </li>
        </ul>
      </nav>

      {{-- Navbar - Barra de navegación --}}
      <div class="relative z-0 lg:flex-grow">
        <header class="flex bg-gray-700 text-white items-center">
          <!-- Botón Sidebar -->
          <button
            class="p-2 focus:outline-none focus:bg-gray-600 hover:bg-gray-600 rounded-md"
            @click="open = true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </button>
          <span class="block text-white font-semibold text-2xl sm:text-3xl p-4">Jetstream</span>
        </header>
      
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

    @stack('modals')

    @livewireScripts
    
    @stack('scripts')
  </body>
</html>