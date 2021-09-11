<nav x-data="{ openNavbar: false }" class="fixed w-full z-10 bg-gray-800">
  <div class="w-full mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <!-- Botón de Menú Izquierdo -->
      <div class="absolute inset-y-0 left-0 ml-10 inline-flex items-center sm:hidden">
        <button @click="openNavbar = !openNavbar" x-on:click.away="openNavbar = false" type="button"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!openNavbar" fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
            <path x-show="openNavbar" fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>

      <!-- Icono Menú Sidebar -->
      <div @click="isOpen = true"
        class="flex items-center justify-center px-3 cursor-pointer rounded-full hover:ml-0.5 h-12 w-12 hover:bg-lime-300 hover:bg-opacity-20 sm-threshold text-gray-400 hover:text-white xxl:hidden">
        <svg class="stroke-current h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
        </svg>
      </div>

      <!-- Logo y Menu izquierdo -->
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center">
          <img class="flex lg:hidden h-8 w-auto ml-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
            alt="Workflow">
          <img class="hidden lg:block h-8 w-auto"
            src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
        </div>
        
        <!-- Menu izquierdo -->
        <div :class="openNavbar ? 'show' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto sm:mt-0 bg-gray-800 z-20 absolute sm:relative sm:top-0 top-16 left-0">
          <div class="sm:flex flex-1 items-center px-2 pt-2 pb-3 space-y-1">
          {{-- <div class="list-reset md:flex flex-1 items-center px-4 md:px-0"> --}}
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('dashboard') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
            aria-current="page">
              Dashboard
            </a>
            <a href="{{ route('tags') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
              Etiquetas
            </a>
            <a href="{{ route('students') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
              Estudiantes
            </a>
            <a href="{{ route('products') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
              Productos
            </a>
            <a href="{{ route('posts') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
              Posts
            </a>
            <a href="{{ route('user.list') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
              Usuarios
            </a>
            <a href="{{ route('categories') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
              Categorías
            </a>
          </div>
        </div>
        <!-- Menu izquierdo -->
      </div>
      <!-- Logo y Menu izquierdo -->

      <!-- Menú de navegación derecho -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button"
          class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
          <span class="sr-only">View notifications</span>
          <!-- Heroicon name: outline/bell -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div x-data="{ openDropdown: false }" class="ml-3 relative">
          <div>
            <button x-on:click="openDropdown = true" type="button"
              class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
              id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
            </button>
          </div>
          <div x-show="openDropdown" x-on:click.away="openDropdown = false"
            class="origin-top-right absolute right-0 mt-4 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700">
              
            </a>
            <hr class="dropdown-divider" /></li>
            <a href="#!" class="block px-4 py-2 text-sm text-gray-700">
              Configuraciones
            </a>

            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700">
                <i class="fa fa-sign-out-alt text-red-400 mr-2"></i>{{ __('Log Out') }}
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>