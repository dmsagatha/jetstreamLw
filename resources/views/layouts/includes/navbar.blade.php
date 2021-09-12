<header class="fixed w-full bg-gray-800 text-gray-300 text-md z-10">
  <div x-data="{ openNavbar: false }" class="relative w-full mx-auto px-2 sm:px-4 lg:px-8">
    <div class="flex items-center justify-between h-16 md:justify-start py-3 md:space-x-10">
      <!-- Items Lado Izquierdo - flex items-center justify-start -->
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <div class="inline-flex items-center">
          <!-- Botón Menú Sidebar -->
          <div @click="isOpen = true"
            class="flex items-center justify-center px-3 cursor-pointer rounded-full hover:ml-0.5 h-12 w-12 hover:bg-lime-300 hover:bg-opacity-20 sm-threshold text-gray-400 hover:text-white xxl:hidden">
            <svg class="stroke-current h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
            </svg>
          </div>

          <!-- Logotipo -->
          <!-- <a href="#" class="my-auto m-auto p-2 mx-2">
            <span class="sr-only">Workflow</span>
            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
          </a> -->

          <!-- Panel de Control -->
          <a href="{{ route('dashboard') }}" class="inline-flex m-auto p-2 mx-2 hover:text-white font-bold rounded-lg shadow-lg my-auto">Dashboard</a>
        </div>

        <!-- Menú desplegable -->
        <div class="relative inline-flex items-center hover:text-white py-2 px-2 cursor-pointer group">
          <span><i class="fas fa-ellipsis-v ml-2"></i></span>
          <span class="capitalize ml-2">Todos</span>

          <div class="absolute w-44 left-0 top-full bg-white shadow-md invisible opacity-0 group-hover:opacity-100 group-hover:visible transition duration-300 z-50 divide-y divide-gray-300 divide-dashed overflow-hidden">
            <a href="{{ route('tags') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 mr-1"></i>Etiquetas
          </a>
          <a href="{{ route('students') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-users text-gray-600 mr-1"></i>Estudiantes
          </a>
          <a href="{{ route('products') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fab fa-product-hunt text-gray-600 mr-1"></i>Productos
          </a>
          <a href="{{ route('posts') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 mr-1"></i>Publicaciones
          </a>
          <a href="{{ route('user.list') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 mr-1"></i>Usuaros
          </a>
          <a href="{{ route('categories') }}"
            class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition">
            <i class="fas fa-tags text-gray-600 mr-1"></i>Categorías
          </a>
          </div>
        </div><!-- Menú desplegable -->
      </div>
      <!-- Items Lado Izquierdo - flex items-center justify-start -->

      <!-- Items Lado Derecho - flex items-center justify-end -->
      <!-- Barra de Navegación -->
      <div class="flex flex-grow items-center justify-end">
        <!-- nav
          absolute: poner el nav ordenado (lo pone a la izquierda) y top-20
          md:relative: para que aparezca el navbar horizontalmente
          w-full: 100% tamaño (ancho) del nav
          flex-grow y left-0: ocupe todo el ancho y este a la izquierda
          items-center: alinear verticalmente
          sm:w-auto: si que quiere central el nav
        -->
        <nav :class="openNavbar ? 'show' : 'hidden'" class="absolute sm:relative sm:flex flex-grow items-center justify-end sm:flex-1 lg:w-0 sm:top-0 top-16 left-0 bg-gray-800 w-full py-2 px-2">
          <!--
            flex-col: en pequeño este en formato vertical
            sm:flex-row: en grande este en formato horizontal
            m-auto p-2 mx-2 mr-4 my-2 sm:my-0
          -->
          <div class="flex flex-col sm:flex-row">
            <a href="{{ route('tags') }}"
              class="text-gray-300 hover:text-white py-1 sm:py-3 sm:mx-1 lg:mx-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300">
              Etiquetas
            </a>
            <a href="{{ route('products') }}"
              class="text-gray-300 hover:text-white py-1 sm:py-3 sm:mx-1 lg:mx-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300">
              Productos
            </a>
            <a href="{{ route('posts') }}"
              class="text-gray-300 hover:text-white py-1 sm:py-3 sm:mx-1 lg:mx-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300">
              Posts
            </a>
            <a href="{{ route('user.list') }}"
              class="text-gray-300 hover:text-white py-1 sm:py-3 sm:mx-1 lg:mx-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300">
              Usuarios
            </a>
          </div>
        </nav>

        <!-- Menú de Navegación con Dropdown -->
        <div class="inline-flex relative float-right">
          <!-- Desplegable Usuario -->
          <div x-data="{ openDropdown: false }" class="relative">
            <button x-on:click="openDropdown = true" class="flex items-center focus:outline-none mr-1">
              <img class="w-8 h-8 rounded-full mr-4" src="{{ Auth::user()->profile_photo_url }}" alt="Avatar of User">
              <span class="hidden md:inline-block hover:text-white">{{ Auth::user()->name }}</span>
            </button>

            <!-- Enlaces Desplegable -->
            <div x-show="openDropdown" x-on:click.away="openDropdown = false" 
              class="absolute origin-top-right right-0 mt-2 min-w-full bg-white rounded-md overflow-auto shadow-md z-30"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-end="opacity-0 transform -translate-y-3"
              x-transition:leave-start="transform opacity-100 scale-100">
              <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-600 hover:text-white">
                <i class="fa fa-user mr-2"></i>{{ __('Profile') }}</a>
              </a>
              <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-600 hover:text-white">
                Publicaciones
              </a>
              <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-600 hover:text-white">
                Configuraciones
              </a>
              <hr class="border-t border-gray-400">

              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-600 hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                  <i class="fa fa-sign-out-alt text-red-600 mr-2"></i>{{ __('Log Out') }}
                </a>
              </form>
            </div><!-- Enlaces Desplegable -->
          </div><!-- Desplegable Usuario -->
        </div><!-- Menú de Navegación con Dropdown -->
      </div>
      <!-- Items Lado Derecho - flex items-center justify-end -->
      
      <!-- Botón Barra de Navegación -->
      <div class="flex relative right-0 sm:hidden">
        <button @click="openNavbar = !openNavbar" x-on:click.away="openNavbar = false" type="button"
          class="inline-flex items-center justify-center bg-gray-800 p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!openNavbar" fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
            <path x-show="openNavbar" fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div><!-- Botón Barra de Navegación -->
    </div>
  </div>
</header>