<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ route('panel') }}">ADMIN</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="{{ route('service') }}" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Settings</a></li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
          <li><a class="dropdown-item" href="{{ route('home') }}">Regresar</a></li>
        </ul>
      </li>
    </ul>
  </header>