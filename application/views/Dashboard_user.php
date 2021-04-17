
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=count($peminjaman)?></h3>

                <p>Sedang dipinjam</p>
              </div>
              <div class="icon">
                <i class="fas fa-book-reader"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?=count($terlambat)?></h3>
                  <p>Belum kembali dan terlambat</p>
              </div>
              <div class="icon">
                <i class="fas fa-clock"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
       
      <div class="card auto">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Belum kembali dan terlambat
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table caption-top">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Kode Buku</th>
                      <th scope="col">Judul Buku</th>
                      <th>Mulai Pinjam</th>
                      <th>Batas Pinjam</th>
                    </tr>
                  </thead>
                 <?php
                 $no=1;
                 foreach($terlambat as $x):?>
                 <tr>
                      <td scope="col"><?=$no++?></td>
                      <td><?=$x["kode_buku"]?></td>
                      <td scope="col"><?=$x["judul"]?></td>
                      <td><?=$x["tanggal_pinjam"]?></td>
                      <td><?=$x["batas_pinjam"]?></td>
                  </tr>
                 <?php endforeach;?>
                </table>
              </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 