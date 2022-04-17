<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/dashboard" class="nav-link">
          <i class="nav-icon fas fa-th "></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
<li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
          List
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/keluhan" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Keluhan</p>
          </a>
        </li>
    </ul>
    <li class="nav-item">
       <a href="{{ route('logout') }}" class="nav-link"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
          <p>
            Log Out
          </p>
        </a>
      </li>
  </nav>