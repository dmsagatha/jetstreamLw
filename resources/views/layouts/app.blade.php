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
  <body class="min-h-screen font-sans antialiased relative lg:flex bg-gray-100" x-data="{ open: false }">
    <x-jet-banner />
    
      {{-- @livewire('navigation-menu') --}}

      {{-- Sidebar --}}
      {{-- 
        absolute porque viene encima del div del header
        z-10 encima y relative en el div del header
        inset-0 - arriba, derecho, abajo e izquierdo este configurado en 0
        Adicionar clases: cuando esté abierto 'translate-x-0' y cerrado -translate-x-full
       --}}
      {{-- <nav 
        class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-48 bg-indigo-900 text-white h-screen p-3"
        :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0':open ===false}">
        <!-- Sidebar - Título y Botón Sidebar -->
        <div class="flex justify-between">
          <span class="block text-md sm:text-2xl font-semibold text-white p-4">Sidebar</span>
          <button @click="open = false"
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
      </nav> --}}

      @include('layouts.includes.sidebar')

      {{-- Navbar - Barra de navegación --}}
      <div class="relative z-0 lg:flex-grow">
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

    @stack('modals')

    @livewireScripts
    
    @stack('scripts')
  </body>
</html>