<nav 
  {{-- :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0':open ===false}"  --}}
  :class="open ? 'translate-x-0 ease-in opacity-100' : '-translate-x-full ease-in opacity-0'"
  class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-50 w-48 bg-indigo-900 text-white h-screen p-3">
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
</nav>