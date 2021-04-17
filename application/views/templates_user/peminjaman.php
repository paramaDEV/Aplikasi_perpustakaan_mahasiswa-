<div class="content-wrapper">
<?php 
date_default_timezone_set('Asia/Jakarta');
?>
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      <div class="card auto">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 
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
                      <th>#</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Batas Pinjam</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=1;
                  foreach($peminjaman as $x):
                  ?>
                    <tr>
                      <th scope="row"><?=$no++?></th>
                      <td><?=$x["kode_buku"]?></td>
                      <td><?=$x["judul"]?></td>
                      <td><?=$x["tanggal_pinjam"]?></td>
                      <td><?=$x["batas_pinjam"]?></td>
                      <td><?php if(time() > strtotime($x["batas_pinjam"])){
                                  echo "<h6 class='text-danger'>Belum kembali dan terlambat</h6>";
                                  }else{
                                    echo "<h6 class='text-success'>Belum kembali</h6>";
                                }
                      ?>
                      <!-- <h6>Belum kembali dan terlambat</h6> -->
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div> 
</div>
<style>
  table .btn{
    height : unset;
    width : 50px;
    padding : 2px;
    font-size:14px;
    margin : 2px;
  }
  table{
    text-align:center;
  }
</style>