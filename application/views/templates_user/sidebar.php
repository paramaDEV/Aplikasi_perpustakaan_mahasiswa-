

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
                      <?php if($user["foto"]==null){?>
                       src="<?=base_url().'img/user/profile.png'?>"
                       <?php }else{ ?>
                        src="<?=base_url().'img/user/'.$user['foto']?>"
                       <?php } ?>>
        </div>
        <div class="info ml-3">
          <a class="d-block"><b><?=$user["nama"]?></b></a>
          <a class="d-block">User</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url()."user_controller/"?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()."user_controller/data_buku"?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cari Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()."user_controller/hal_peminjaman"?>" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Pinjaman Aktif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()."user_controller/hal_riwayat_transaksi"?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Riwayat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()."user_controller/profil_user"?>" class="nav-link">
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
