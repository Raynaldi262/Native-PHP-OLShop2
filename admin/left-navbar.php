<?php require('../model/AdminUser.php'); ?>
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<style>
  .dropdown-menu {
    min-width: 150px;
    text-align: center;
  }

  aside {
    position: fixed !important;
  }

  .dropdown-menu>a:hover {
    background: #dee3e3;
  }

  /* span {
    color: white !important;
  } */
</style>
<nav class="main-header navbar navbar-expand navbar-dark bg-primary">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" style="margin-top: -8px;">
        <div class="d-sm-inline-block user-panel">
          <img src="../dist/img/admin/<?php echo $admin['admin_img'] ?>" class="img-circle elevation-2" alt="User Image">
          <span class="brand-text font-weight-light dropdown-toggle"><b><?php echo $admin['admin_name'] ?></b></span>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: 100px;">
        <a href="profile.php" class="dropdown-item">
          <p>Profil</p>
        </a>
        <a href="../login_admin/logout_admin.php" class="dropdown-item" id="exit">
          <p>Keluar</p>
        </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../mlp_printing" class="brand-link">
    <img src="../dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b> MLP Printing </b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="pesanan.php" class="nav-link active" id="pesanan">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Pesanan
            </p>
          </a>
        </li>
        <?php if ($_SESSION['role_id'] == 1) { ?>
          <li class="nav-item">
            <a href="bahan.php" class="nav-link" id="bahan">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Penambahan Bahan
              </p>
            </a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a href="stok.php" class="nav-link" id="stok">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
              Stok
            </p>
          </a>
        </li>
        <?php if ($_SESSION['role_id'] == 1) { ?>
          <li class="nav-item">
            <a href="laporan_stok.php" class="nav-link" id="laporan_stok">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Stok
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="laporan_pesanan.php" class="nav-link" id="laporan_pesanan">
              <i class="nav-icon far fa-file-powerpoint"></i>
              <p>
                Laporan Pesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customer.php" class="nav-link" id="data_customer">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_admin.php" class="nav-link" id="data_admin">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Data Admin
              </p>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  $(document).ready(function() {
    var active = $('.breadcrumb').attr('id');

    $(".nav-link").removeClass("active");

    // $(".nav-link").attr('id', active).addClass('active');
    var a = $(".nav-link#" + active).addClass('active');
  });
</script>