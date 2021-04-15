

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary " style="background-color: #01579b;">
    <!-- Brand Logo -->
    <div class="brand-link "  style="background-color: #06408c; border:none; ">
    <i class="nav-icon fas fa-landmark ml-3"></i><span class="brand-text font-weight-light ml-3" >Aplikasi Perpustakaan</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class=" mt-3 pb-3 mb-3 d-flex">
        <div class="image" >
            <img src=<?=base_url()."img/user/profile.png"?> class="" style="height:50px;width:50px">
        </div>
        <div class="info ml-3">
          <a class="d-block"><b>Alexander Pierce</b></a>
          <a class="d-block">User</a>
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
            <a href="<?=base_url().'main_controller/hal_buku_hilang'?>" class="nav-link">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Data Buku Hilang
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
            <a href="<?=base_url().'main_controller/profil_admin'?>" class="nav-link">
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
