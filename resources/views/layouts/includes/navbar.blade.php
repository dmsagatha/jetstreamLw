<header
  class="flex fixed w-full items-center justify-between flex-wrap bg-white p-3 z-10 top-0 inset-x-0 text-gray-600 py-3">
  <!-- Icono Sidebar y Logotipo -->
  <div class="flex items-center space-x-4 xxl:space-x-0">
    <div @click="sidebarOpen = true"
      class="flex items-center justify-center px-2 cursor-pointer rounded-full hover:ml-0.5 h-10 w-10 hover:bg-lime-300 hover:bg-opacity-20 sm-threshold text-lime-700 xxl:hidden">
      <svg class="stroke-current h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
      </svg>
    </div>

    <!-- Logotipo -->
    <div>
      <a href="#"
        class="text-sm font-semibold tracking-widest text-gray-600 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        Navbar
      </a>
    </div>
  </div>
  <!-- Icono Sidebar y Logotipo -->

  <!-- Iconos y Enlaces de la Barra de navegación -->
  <div class="w-full flex-grow hidden md:flex md:items-center md:w-auto pt-6 md:pt-0">
    <ul class="list-reset md:flex justify-end flex-1 items-center text-gray-800">
      <li class="mr-6">
        <a class="inline-block py-2 px-2 no-underline hover:text-blue-300" href="#">Home</a>
      </li>
      <li class="mr-6">
        <a class="inline-block py-2 px-2 no-underline hover:text-blue-300" href="#">About</a>
      </li>
      <li class="mr-6">
        <a class="inline-block py-2 px-2 no-underline hover:text-blue-300" href="#">Services</a>
      </li>
      <li class="mr-6">
        <a class="inline-block py-2 px-2 no-underline hover:text-blue-300" href="#">Contact</a>
      </li>
      <li class="mr-6">
        <a class="inline-block py-2 px-2 no-underline hover:text-blue-300" href="#">Login</a>
      </li>
      <li class="mr-6">
        <a class="inline-block py-2 px-2 no-underline hover:text-blue-300" href="#">Register</a>
      </li>
    </ul>
  </div>




  {{-- <div x-data="{ open: false }"
    class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8 -mt-6">
    <div class="flex flex-row items-center justify-end">
      <!-- Iconos Menú Navbar -->
      <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
          <path x-show="!open" fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>

    <!-- Enlaces de la Barra de navegación -->
    <nav :class="{'flex': open, 'hidden': !open}"
      class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
      <a class="px-2 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
        href="#">
        Blog
      </a>
      <a class="px-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
        href="#">
        Portafolio
      </a>
      <a class="px-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
        href="#">
        Sobre
      </a>
      <a class="px-2 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
        href="#">
        Contacto
      </a>

      <!-- Menú desplegable 1 -->
      <div class="relative" x-data="{ dropdownOpen: false}" @click.away="dropdownOpen = false">
        <button @click="dropdownOpen = !dropdownOpen"
          class="flex bg-transparent rounded-lg px-2 py-2 mt-2 focus:outline-none focus:border-white text-sm font-semibold text-center md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
          Desplegable 1
          <svg fill="currentColor" viewBox="0 0 24 24"
            :class="{'rotate-180': dropdownOpen, 'rotate-0': !dropdownOpen}"
            class="inline w-6 h-6 mt-1 ml-2 transition-transform duration-200 transform md:-mt-1">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>

        <ul x-show="dropdownOpen"
          class="absolute right-0 w-full md:w-44 z-10 origin-top-right shadow-md mt-4 md:mt-0 bg-white"
          x-transition:enter="transition-transform transition-opacity ease-out duration-300"
          x-transition:enter-start="opacity-0 transform -translate-y-2"
          x-transition:enter-end="opacity-100 transform translate-y-0"
          x-transition:leave="transition ease-in duration-300"
          x-transition:leave-end="opacity-0 transform -translate-y-3"
          x-transition:leave-start="transform opacity-100 scale-100">
          <li>
            <a href="#!" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-900">Enlace 1</a>
          </li>
          <li>
            <a href="#!" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-900">Enlace 2</a>
          </li>
          <li>
            <a href="#!" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-900">Enlace 3</a>
          </li>
        </ul>
      </div>
      <!-- Menú desplegable 1 -->

      <!-- Menú desplegable 2 -->
      <div class="relative" x-data="{ dropdownOpen: false}" @click.away="dropdownOpen = false">
        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center px-2 py-2 mt-2 md:mt-0">
          <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-6 h-6 rounded-full">
          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}"
            class="inline w-6 h-6 mt-1 ml-2 transition-transform duration-200 transform md:-mt-1">
            <path fill-rule="evenodd"
              d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>

        <ul x-show="dropdownOpen"
          class="absolute w-full bg-white origin-top-right right-1 ring-black ring-opacity-5 divide-y divide-gray-100 md:w-44 z-10 rounded-md shadow-md mt-4 md:mt-0"
          x-transition:enter="transition-transform transition-opacity ease-out duration-300"
          x-transition:enter-start="opacity-0 transform -translate-y-2"
          x-transition:enter-end="opacity-100 transform translate-y-0"
          x-transition:leave="transition ease-in duration-300"
          x-transition:leave-end="opacity-0 transform -translate-y-3"
          x-transition:leave-start="transform opacity-100 scale-100">
          <li>
            <a href="#!" class="block text-lime-700 font-medium px-4 py-2 text-sm hover:bg-lime-50">Enlace
              1</a>
          </li>
          <li>
            <a href="#!" class="block text-lime-700 font-medium px-4 py-2 text-sm hover:bg-lime-50">Enlace
              2</a>
          </li>
          <li>
            <a href="#!" class="block text-lime-700 font-medium px-4 py-2 text-sm hover:bg-lime-50">Enlace
              3</a>
          </li>
        </ul>
      </div>
      <!-- Menú desplegable 3 -->
    </nav>
  </div> --}}
  
</header>