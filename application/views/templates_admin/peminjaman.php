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
      <!-- Button trigger modal -->
      <button type="button" style="margin-top:-10px" class="btn btn-primary mb-3" data-toggle="modal" data-target="#staticBackdrop">
      <i class="fas fa-plus"></i> Tambah Peminjaman
      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Peminjaman</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?=base_url()."main_controller/form_tambah_peminjaman"?>">
                <div class="form-group">
                  <label for="kode_buku">Kode Buku</label>
                  <input type="text" class="form-control" id="kode_buku" name="kode_buku"  required placeholder="Kode Buku">
                </div>
                <div class="form-group">
                  <label for="nim">Nomer Induk Mahasiswa</label>
                  <input type="text" class="form-control" id="nim" name="nim" required placeholder="Nomer Induk Mahasiwa">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php if(validation_errors()):?> 
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         Pastikan isi data dengan lengkap dan benar !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif;?>
   
        <div class="card auto">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Data Buku
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
                      <th>NIM</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Batas Pinjam</th>
                      <th>Status</th>
                      <th>Action</th>
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
                      <td><?=$x["nim"]?></td>
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
                      <td colspan=3><a href=<?=base_url()."main_controller/hal_detail_peminjaman/".$x['id']?>>
                      <button type="button" class="btn btn-primary" >Detail
                      </button></a>
                      <a href=<?=base_url()."main_controller/selesai_peminjaman/".$x['id']?>>
                      <button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menyelesaikan peminjaman ?')">Selesai
                      </button></a>
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