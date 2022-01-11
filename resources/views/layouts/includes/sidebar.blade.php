<div :class="isOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
  class="sidebar overflow-y-auto xxl:translate-x-0 xxl:static xxl:inset-0">
  <!-- Logo - Título -->
  <a href="#" class="flex flex-col items-center justify-center text-xl py-4 shadow-sm font-bold">
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
          <a href="{{ route('dashboard') }}" class="sidebar-menu-link">
            <i class="fas fa-tachometer-alt sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('tags') }}" class="sidebar-menu-link">
            <i class="fas fa-hands-helping sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Etiquetas</span>
          </a>
        </li>
        <li>
          <a href="{{ route('students') }}" class="sidebar-menu-link">
            <i class="fas fa-shopping-cart sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Estudiantes</span>
          </a>
        </li>
        <li>
          <a href="{{ route('products') }}" class="sidebar-menu-link">
            <i class="fas fa-file-invoice-dollar sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Productos</span>
          </a>
        </li>
        <li>
          <a href="{{ route('posts') }}" class="sidebar-menu-link">
            <i class="fas fa-file-invoice-dollar sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Publicaciones</span>
          </a>
        </li>
        <li>
          <a href="{{ route('user.list') }}" class="sidebar-menu-link">
            <i class="fas fa-file-invoice-dollar sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Usuarios</span>
          </a>
        </li>
        <li>
          <a href="{{ route('categories') }}" class="sidebar-menu-link">
            <i class="fas fa-file-invoice-dollar sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">Categorías</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Pie de página del sidebar -->
    <ul class="mt-auto pb-20">
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="sidebar-menu-link">
            <i class="fa fa-sign-out-alt text-red-400  sidebar-menu-link-icon"></i>
            <span class="hidden md:inline-flex">{{ __('Log Out') }}</span>
          </a>
        </form>
      </li>
    </ul>
  </nav>
</div>