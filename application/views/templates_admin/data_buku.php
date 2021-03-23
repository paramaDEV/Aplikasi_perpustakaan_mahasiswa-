<div class="content-wrapper">
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Buku</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#staticBackdrop">
    <i class="fas fa-plus"></i> Tambah Data Buku
    </button>
    <?php if(validation_errors()):?> 
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         Pastikan isi data dengan lengkap dan benar !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif;?>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Buku Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <?= form_open_multipart()?>
          <div class="form-group">
            <label for="kd_buku">Kode Buku</label>
            <input type="text" class="form-control" id="kd_buku" placeholder="" name="kd_buku">
          </div>
          <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" placeholder="" name="judul_buku">
          </div>
          <div class="form-group">
            <label for="">Jenis Tema</label>
              <select class="form-control" name="tema">
              <?php
              $no=1;
              foreach($tema as $x):
              ?>
                <option value=<?=$x['id']?>><?=$x['tema']?></option>
              <?php endforeach;?>
              </select>
          </div>
          <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" id="penulis" placeholder="" name="penulis">
          </div>
          <div class="form-group">
            <label for="jmlh_halaman">Jumlah halaman</label>
            <input type="text" class="form-control" id="jmlh_halaman" placeholder="" name="jmlh_halaman">
          </div>
          <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" placeholder="" name="penerbit">
          </div>
          <div class="form-group">
            <label for="jmlh_buku">Jumlah buku</label>
            <input type="text" class="form-control" id="jmlh_buku" placeholder="" name="jmlh_buku">
          </div>
          <div class="form-group">
            <label for="thumb">Cover buku</label><br>
            <input type="file" name="thumb" id="thumb"><br>
            <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 500 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
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
                      <th>Judul Buku</th>
                      <th>Tema</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=1;
                  foreach($buku as $x):
                  ?>
                    <tr>
                      <th scope="row"><?=$no++?></th>
                      <td><?=$x["kode_buku"]?></td>
                      <td><?=$x["judul"]?></td>
                      <td><?=$x["tema"]?></td>
                      <td colspan=3><a href=<?=base_url()."main_controller/hapus/".$x["id"]?>>
                      <button type="button" class="btn btn-primary" onclick="return confirm('Anda yakin menghapus data ini ?');"><i class="fas fa-file"></i>
                      </button></a>
                      <a href=<?=base_url()."main_controller/hapus/".$x["id"]?>>
                      <button type="button" class="btn btn-success m-2" onclick="return confirm('Anda yakin menghapus data ini ?');"><i class="fas fa-pen"></i>
                      </button></a>
                      <a href=<?=base_url()."main_controller/hapus/".$x["id"]?>>
                      <button type="button" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?');"><i class="fas fa-trash-alt"></i>
                      </button></a></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
    </section>
</div>