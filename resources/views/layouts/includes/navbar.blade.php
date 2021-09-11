
    <header class="fixed w-full bg-gray-800">
      <div x-data="{ openNavbar: false }"
        class="w-full mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <!-- Logotipo - Menú de navegación izquierdo -->
          <div class="flex-1 flex sm:items-stretch sm:justify-start">
            <!-- Logotipo -->
            <div class="flex items-center">
              <img class="block lg:hidden h-8 w-8 shadow rounded-full" 
                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                alt="Workflow">
              <img class="hidden lg:block h-8 w-auto"
                src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
            </div>

            <!-- Menú desplegable -->
            <div class="flex items-center px-2 py-4 bg-gray-800 text-gray-300 hover:text-white cursor-pointer group relative w-40">
              <span><i class="fas fa-ellipsis-v ml-2"></i></span>
              <span class="capitalize ml-2">Todos</span>

              <div
                class="absolute w-full left-0 top-full bg-white shadow-md pt-1 invisible opacity-0 group-hover:opacity-100 group-hover:visible transition duration-300 z-50 divide-y divide-gray-300 divide-dashed overflow-hidden">
                <a class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition" href="#">
                  <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Etiquetas
                </a>
                <a class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition" href="#">
                  <i class="fas fa-users text-gray-600 text-sm mr-1"></i>Estudiantes
                </a>
                <a class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition" href="#">
                  <i class="fab fa-product-hunt text-gray-600 text-sm mr-1"></i>Productos
                </a>
                <a class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition" href="#">
                  <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Posts
                </a>
                <a class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition" href="#">
                  <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Usuaros
                </a>
                <a class="flex items-center px-4 py-3 hover:bg-gray-100 text-gray-600 hover:text-semibold transition" href="#">
                  <i class="fas fa-tags text-gray-600 text-sm mr-1"></i>Categorías
                </a>
              </div>
            </div>
            <!-- Menú desplegable -->

            <!-- Menú de navegación izquierdo 1 -->
            <!-- <nav :class="openNavbar ? 'show' : 'hidden'"
              class="md:flex items-center absolute md:relative top-16 md:top-0 left-0 bg-gray-800 w-full">
              <div class="flex flex-col md:flex-row w-full md:w-auto px-2 pt-2 pb-3">
                <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm md:text-base font-medium rounded-md" href="#">Home</a>
                <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm md:text-base font-medium rounded-md" href="#">Team</a>
                <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm md:text-base font-medium rounded-md" href="#">About</a>
                <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm md:text-base font-medium rounded-md" href="#">Contact</a>
              </div>
            </nav> -->
            <!-- Menú de navegación izquierdo 1 -->

            <!-- Menú de navegación izquierdo 2 -->
            <nav :class="openNavbar ? 'show' : 'hidden'"
            class="w-full flex-grow md:flex md:items-center md:w-auto md:pt-0 absolute md:relative top-16 md:top-0 left-0 bg-gray-800">
              <ul class="md:flex justify-end flex-1 items-center">
                <li class="mr-4 my-2 md:my-0">
                  <a href="#!"
                    class="block text-gray-300 py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300 hover:text-white">Inicio</a>
                </li>
                <li class="mr-4 my-2 md:my-0">
                  <a href="#!"
                    class="block text-gray-300 py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300 hover:text-white">Acerca</a>
                </li>
                <li class="mr-4 my-2 md:my-0">
                  <a href="#!"
                    class="block text-gray-300 py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300 hover:text-white">Servicios</a>
                </li>
                <li class="mr-4 my-2 md:my-0">
                  <a href="#!"
                    class="block text-gray-300 py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300 hover:text-white">Contacto</a>
                </li>
                <li class="mr-4 my-2 md:my-0">
                  <a href="#!"
                    class="block text-gray-300 py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-400 hover:border-gray-300 hover:text-white">Usuarios</a>
                </li>
              </ul>
            </nav>
            <!-- Menú de navegación izquierdo 2 -->
          </div>
          <!-- Logotipo - Menú de navegación izquierdo -->

          <!-- Menú de navegación derecho -->
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <!-- Profile dropdown -->
            <div x-data="{ openDropdown: false }" class="relative right-10 ml-3">
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
              <!-- Enlaces Desplegable -->
              <div x-show="openDropdown" x-on:click.away="openDropdown = false"
                class="absolute origin-top-right right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Perfil</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Publicaciones</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Configuraciones</a>
                <hr class="border-t mx-2 border-gray-400">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Cerrar sesión</a>
              </div>
              <!-- Enlaces Desplegable -->
            </div>
            <!-- Profile dropdown -->
          </div>
          <!-- Menú de navegación derecho -->

          <!-- Botón Barra de Navegación -->
          <div class="flex relative right-0 md:hidden">
            <button @click="openNavbar = !openNavbar" x-on:click.away="openNavbar = false" type="button"
              class="inline-flex items-center justify-center bg-gray-800 p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none"
              aria-controls="mobile-menu" aria-expanded="false">
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
          <!-- Botón Barra de Navegación -->
        </div>
      </div>
    </header>