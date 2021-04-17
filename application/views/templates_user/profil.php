  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profil</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary ">
              <div class="card-body box-profile">
                <div class="text-center">
                <center><div class="foto" style="border-radius:50%;width:250px;height:250px;overflow:hidden">
                <img style="width:250px"
                      <?php if($user["foto"]==null){?>
                       src="<?=base_url().'img/user/profile.png'?>"
                       <?php }else{ ?>
                        src="<?=base_url().'img/user/'.$user['foto']?>"
                       <?php } ?>>
                       </div></center>
                </div>

                <h3 class="profile-username text-center"><?=$user["nama"]?></h3>

                <p class="text-muted text-center">User</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nomer Induk </b> <a class="float-right"><?=$user["nim"]?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right"><?=$user["nama"]?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right"><?=$user["jenis_kelamin"]?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Lahir</b> <a class="float-right"><?=$user["ttl"]?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Fakultas</b> <a class="float-right"><?=$user["nm_fakultas"]?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jurusan</b> <a class="float-right"><?=$user["nm_jurusan"]?></a>
                  </li>
                </ul>

                <a href="<?=base_url().'user_controller/hal_update_user/'?>" class="btn btn-primary btn-block" style="width : 100px">Edit</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->