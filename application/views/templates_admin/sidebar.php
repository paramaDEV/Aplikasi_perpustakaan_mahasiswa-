

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src=<?=base_url()."assets/dist/img/AdminLTELogo.png"?> alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=<?=base_url()."assets/dist/img/user2-160x160.jpg"?> class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href=<?=base_url()."main_controller/admin_page"?> class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=<?=base_url()."main_controller/data_buku"?> class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Data Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=<?=base_url()."main_controller/hal_peminjaman"?>  class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'main_controller/hal_riwayat_transaksi'?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Riwayat Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'main_controller/hal_data_anggota'?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
