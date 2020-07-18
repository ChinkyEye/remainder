<aside class="main-sidebar sidebar-no-expand sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{URL::to('/')}}/images/download1.jpg" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">REMAINDER</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{URL::to('/')}}/images/gov.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{URL::to('/')}}/home" class="d-block">Welcome(@guest @else{{Auth::user()->name}} @endguest)</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/client" class="nav-link {{ (request()->is('home/client')) ? 'active' : '' }}">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Clients
              <span class="right badge badge-danger">@guest @else{{$clients->count()}} @endguest</span>
            </p>
          </a>
        </li>

        
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/client/create" class="nav-link {{ (request()->is('home/client/create')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-eye"></i>
              <p>Eye</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/')}}/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i> 
            <p>
              <span>Logout</span>
            </p>
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>