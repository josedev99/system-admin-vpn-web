<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><i class="app-menu__icon fa fa-user fa-3x mr-3"></i>
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">
              @if (Auth::user()->rol_id == 1)
                 {{__('Administrador')}}
            @else
                {{ __('Usuario') }}
              @endif
          </p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{ route('panel') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Incio</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Cuentas SSH</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('sshPremium') }}"><i class="icon fa fa-circle-o"></i>SSH Premium</a></li>
            <li><a class="treeview-item" href="{{ route('showSSH') }}"><i class="icon fa fa-circle-o"></i>SSH activas</a></li>
            @if (Auth::user()->rol_id == 1)
            <li><a class="treeview-item" href="{{ route('allSSH') }}"><i class="icon fa fa-circle-o"></i>Full SSH</a></li>
            @endif
          </ul>
        </li>
        @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3)
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Server</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{ route('addServer') }}"><i class="icon fa fa-circle-o"></i>Crear</a></li>
              <li><a class="treeview-item" href="{{ route('server.show') }}"><i class="icon fa fa-circle-o"></i>Lista</a></li>
            </ul>
          </li>
          @endif

          @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3)
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Saldo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{ route('saldo.index') }}"><i class="icon fa fa-circle-o"></i>Lista</a></li>
            </ul>
          </li>
          @endif
          @if (Auth::user()->rol_id == 1)
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Ganancias</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('sales.show') }}"><i class="icon fa fa-circle-o"></i>Lista</a></li>
              </ul>
            </li>
          
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('user.index') }}"><i class="icon fa fa-circle-o"></i>Lista</a></li>
              </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Servicios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('service.create') }}"><i class="icon fa fa-circle-o"></i>crear</a></li>
                <li><a class="treeview-item" href="{{ route('service.index') }}"><i class="icon fa fa-circle-o"></i>Listar</a></li>
              </ul>
            </li>
        @endif

        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Documentación</span></a></li>
      </ul>
    </aside>