<div x-data="{ sidebarOpen: false }">
  <div class="flex h-screen bg-gray-100 font-roboto">
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
      class="fixed z-20 inset-0 bg-black opacity-50 xxl:hidden"></div>

    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
      class="sidebar overflow-y-auto xxl:translate-x-0 xxl:static xxl:inset-0">
      <!-- Logo - Título -->
      <a href="#" class="flex flex-col items-center justify-center text-xl py-4 shadow-sm font-bold text-gray-600">
        <div>
          <i class="fas fa-tachometer-alt text-2xl text-pink-400 md:mr-2"></i>
          <span class="hidden md:inline-flex">Sidebar</span>
        </div>
        <div class="hidden md:inline-flex text-sm font-normal">Admin Template</div>
      </a>

      <!-- Enlaces y Pie de página del sidebar -->
      <nav class="flex flex-col flex-grow overflow-hidden">
        <!-- Menú principal -->
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
      </nav>
    </div>
    <!-- Sidebar -->
  </div><!-- flex h-screen -->
</div><!-- sidebarOpen -->