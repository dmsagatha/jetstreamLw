<nav x-data="{ openNavbar: false }" class="fixed w-full z-10 bg-gray-800">
  <div class="w-full mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <!-- Botón de Menú Izquierdo -->
      <div class="absolute inset-y-0 left-0 ml-10 inline-flex items-center sm:hidden">
        <button @click="openNavbar = !openNavbar" x-on:click.away="openNavbar = false" type="button"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg fill="currentColor" viewBox="0 00 20" class="w-6 h-6">
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

      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        {{-- <img class="flex lg:hidden h-8 w-auto ml-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
          alt="Workflow">
        <img class="hidden lg:block h-8 w-auto"
          src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow"> --}}
        <a href="{{ route('dashboard') }}" class="text-indigo-50 py-10 sm:py-4 text-xl hover:text-indigo-200">
          <i class="fas fa-tachometer-alt fa-lg"></i></a>
      </div>

      <!-- Menú desplegable -->
      <div
        class="flex items-center px-2 py-4 bg-gray-800 text-gray-300 hover:text-white cursor-pointer group relative w-40">
        <span class="capitalize ml-1"><i class="fas fa-ellipsis-v mr-1"></i>Todos</span>

        <div
          class="absolute w-full left-0 top-full bg-white shadow-md pt-1 invisible opacity-0 group-hover:opacity-100 group-hover:visible transition duration-300 z-50 divide-y divide-gray-300 divide-dashed overflow-hidden">
          <a href="{{ route('tags') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Etiquetas
          </a>
          <a href="{{ route('students') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-users text-gray-600 text-sm mr-1"></i>Estudiantes
          </a>
          <a href="{{ route('products') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fab fa-product-hunt text-gray-600 text-sm mr-1"></i>Productos
          </a>
          <a href="{{ route('posts') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Publicaciones
          </a>
          <a href="{{ route('user.list') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Usuaros
          </a>
          <a href="{{ route('categories') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Categorías
          </a>
        </div>
      </div>
      <!-- Menú desplegable -->

      <!-- Menu izquierdo -->
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <!-- Menu izquierdo -->
        <div :class="openNavbar ? 'show' : 'hidden'"
          class="w-full flex-grow sm:flex sm:items-center sm:w-auto sm:mt-0 bg-gray-800 z-20 absolute sm:relative sm:top-0 top-16 left-0">
          <div class="sm:flex flex-1 items-center px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            {{-- <a href="{{ route('dashboard') }}" class="bg-gray-900 text-white block px-2 py-2 rounded-md text-base
            font-medium"
            aria-current="page">
            Dashboard
            </a> --}}
            <a href="{{ route('tags') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-2 py-2 rounded-md text-base font-medium">
              Etiquetas
            </a>
            <a href="{{ route('products') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-2 py-2 rounded-md text-base font-medium">
              Productos
            </a>
            <a href="{{ route('posts') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-2 py-2 rounded-md text-base font-medium">
              Posts
            </a>
            <a href="{{ route('user.list') }}"
              class="text-gray-300 hover:bg-gray-700 hover:text-white block px-2 py-2 rounded-md text-base font-medium">
              Usuarios
            </a>
          </div>
        </div>
        <!-- Menu izquierdo -->
      </div>
      <!-- Logo y Menu izquierdo -->

      <!-- Menú de navegación derecho -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <!-- Profile dropdown -->
        <div x-data="{ openDropdown: false }" class="relative right-10 ml-3">
          <div>
            <button x-on:click="openDropdown = true" type="button"
              class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white text-white"
              id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              {{ Auth::user()->name }}
              <img class="h-8 w-8 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
            </button>
          </div>
          <!-- Enlaces Desplegable -->
          <div x-show="openDropdown" x-on:click.away="openDropdown = false"
            class="absolute origin-top-right right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
            x-transition:enter="transition-transform transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-end="opacity-0 transform -translate-y-3"
            x-transition:leave-start="transform opacity-100 scale-100">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Perfil</a>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Publicaciones</a>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Configuraciones</a>
            <hr class="border-t mx-2 border-gray-400">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Cerrar
              sesión</a>
          </div>
          <!-- Enlaces Desplegable -->
        </div>
        <!-- Profile dropdown -->
      </div>
      <!-- Menú de navegación derecho -->
    </div>
  </div>
</nav>