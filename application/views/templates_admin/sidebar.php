

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
        <img class="ml-1" style="width:50px;height:50px;border-radius:50%"
                      <?php if($admin["foto"]==null){?>
                       src="<?=base_url().'img/admin/profile.png'?>"
                       <?php }else{ ?>
                        src="<?=base_url().'img/admin/'.$admin['foto']?>"
                       <?php } ?>>
        </div>
        <div class="info ml-3 text-white" >
          <a class="d-block"><b><?=$admin['nama']?></b></a>
          <a class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href=<?=base_url()."admin_controller/index"?> class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=<?=base_url()."admin_controller/data_buku"?> class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Data Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=<?=base_url()."admin_controller/hal_peminjaman"?>  class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'admin_controller/hal_riwayat_transaksi'?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Riwayat Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'admin_controller/hal_buku_hilang'?>" class="nav-link">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Data Buku Hilang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'admin_controller/hal_data_anggota'?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'admin_controller/profil_admin'?>" class="nav-link">
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
