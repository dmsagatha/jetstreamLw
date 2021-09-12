<nav 
  {{-- :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0':open ===false}"  --}}
  :class="open ? 'translate-x-0 ease-in opacity-100' : '-translate-x-full ease-in opacity-0'"
  class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-50 w-48 bg-gray-100 h-screen p-3">
  <!-- Sidebar - Título y Botón Sidebar -->
  <div class="flex justify-between">
    <span class="block text-md sm:text-2xl font-semibold p-4">Sidebar</span>
    <button @click="open = false"
      class="p-1 focus:outline-none focus:bg-indigo-800 hover:bg-indigo-800 rounded-md lg:hidden">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
  </div>
  
  <!-- Sidebar - Menú de navegación -->
  <div class="flex flex-col flex-grow overflow-hidden">
    <div class="h-full overflow-y-auto scrollbar-thin scrollbar-track-gray-100 scrollbar-thumb-gray-300">
      <ul class="flex-grow p-2">
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
    </div>

    <!-- Pie de página del sidebar -->
    <ul class="p-2 mt-auto">
      <li>
        <a href="#" class="sidebar-menu-link">
          <i class="fas fa-sign-out-alt sidebar-menu-link-icon"></i>
          <span class="hidden md:inline-flex">Cerrar sesión</span>
        </a>
      </li>
    </ul>
  </div>
</nav>