<header x-data="{ openNavbar: false }"
  class="flex fixed w-full items-center justify-between flex-wrap bg-white p-3 z-10 top-0 inset-x-0 py-3">
  <!-- Icono Sidebar y Logotipo -->
  <div class="flex items-center space-x-4 xxl:space-x-0">
    <!-- Icono Menú Sidebar -->
    <div @click="isOpen = true"
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
        class="text-sm font-semibold tracking-wides uppercase rounded-lg focus:outline-none focus:shadow-outline">
        Navbar
      </a>
    </div>
  </div>
  <!-- Icono Sidebar y Logotipo -->

  <!-- Iconos y Enlaces de la Barra de navegación -->
  <nav :class="{'flex': openNavbar, 'hidden': !openNavbar}"
    class="w-full flex-grow hidden md:flex md:items-center md:w-auto pt-6 md:pt-0">
    <ul class="md:flex justify-end flex-1 items-center">
      <li class="mr-4 my-2 md:my-0">
        <a href="#!" class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-white hover:border-green-600 hover:text-lime-700">Inicio</a>
      </li>
      <li class="mr-4 my-2 md:my-0">
        <a href="#!" class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-white hover:border-green-600 hover:text-lime-700">Acerca</a>
      </li>
      <li class="mr-4 my-2 md:my-0">
        <a href="#!" class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-white hover:border-green-600 hover:text-lime-700">Servicios</a>
      </li>
      <li class="mr-4 my-2 md:my-0">
        <a href="#!" class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-white hover:border-green-600 hover:text-lime-700">Contacto</a>
      </li>
      <li class="mr-4 my-2 md:my-0">
        <a href="#!" class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-white hover:border-green-600 hover:text-lime-700">Usuarios</a>
      </li>
    </ul>
  </nav>

  <!-- Botón Menú Navbar -->
  <div class="block md:hidden">
    <button @click="openNavbar = !openNavbar" x-on:click.away="openNavbar = false" 
      class="flex items-center px-3 py-2 rounded-lg hover:text-lime-600 focus:outline-none focus:shadow-outline">
      <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
        <path x-show="!openNavbar" fill-rule="evenodd"
          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
          clip-rule="evenodd"></path>
        <path x-show="openNavbar" fill-rule="evenodd"
          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>

  <div x-data="{ dropdownOpen: false }" class="relative">
    <button @click="dropdownOpen = ! dropdownOpen" class="flex items-center relative space-x-2 focus:outline-none">
      <h2 class="text-gray-700 text-sm hidden sm:block">Super Admin</h2>
        <img class="h-9 w-9 rounded-full border-2 border-purple-500 object-cover"
        src="https://images.unsplash.com/photo-1553267751-1c148a7280a1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
        alt="Your avatar">
    </button>

    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
      x-show="dropdownOpen"
      x-transition:enter="transition ease-out duration-100 transform"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-75 transform"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      @click.away="dropdownOpen = false">
      <a href="#"
      class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white">Profile</a>
      <a href="#"
      class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white">Tickets</a>
      <a href=""
      class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white">Logout</a>
    </div>
  </div>
</header>