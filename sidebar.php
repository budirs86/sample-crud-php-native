<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="?mod=home" class="brand-link">
    <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">My Mini CMS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['nama'];?></a>
        <a href="#" class="d-block"><?php echo 'Level:'.$_SESSION['user_level'];?></a>
      </div>
    </div>
<!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php
        if ($_SESSION['user_level']=='admin'){ ?>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Administrator
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?mod=departemen" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Department</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?mod=divisi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Divisi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?mod=employe" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Employe</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?mod=log" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>System Log</p>
              </a>
            </li>
          </ul>
        </li>
      <?php }?>


        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-desktop"></i>
            <p>
              My Desk
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?mod=order" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?mod=project" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Project</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?mod=contact" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-desktop"></i>
            <p>
              My Profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?mod=profile" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item active">
          <a href="proses/logout.php" class="nav-link">
            <i class="nav-icon fas fa-lock"></i>
            <p>
              Log Out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
