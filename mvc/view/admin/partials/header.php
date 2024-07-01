<nav class="navbar navbar-expand  bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo _WEB_ROOT ?>/admin/dashboard/index">Admin</a>
    <ul class="navbar-nav ">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="<?php echo _WEB_ROOT ?>/admin/auth/logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>