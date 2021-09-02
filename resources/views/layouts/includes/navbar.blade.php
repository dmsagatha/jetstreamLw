<header
  class="flex fixed w-full items-center justify-between flex-wrap bg-white p-3 z-10 top-0 inset-x-0 py-3">
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
        class="text-sm font-semibold tracking-wides uppercase rounded-lg focus:outline-none focus:shadow-outline">
        Navbar
      </a>
    </div>
  </div>
  <!-- Icono Sidebar y Logotipo -->

  <!-- Iconos y Enlaces de la Barra de navegación -->
  <div class="w-full flex-grow hidden md:flex md:items-center md:w-auto pt-6 md:pt-0">
    <ul class="list-reset md:flex justify-end flex-1 items-center font-semibold">
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
</header>