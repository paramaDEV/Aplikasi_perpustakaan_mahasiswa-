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
    <button type="button" class="btn btn-success mb-3" style="margin-top:-10px" data-toggle="modal" data-target="#tambah_buku">
    <i class="fas fa-plus"></i> Tambah Data Buku
    </button>
    <div class="form-group col-md-4">
          <label for="fakultas">Tema</label>
            <select name="tema-select" id="tema-select" class="form-control">
              <?php foreach($tema as $x):?>
              <option value="<?=$x['id']?>"><?=$x["tema"]?></option>
              <?php endforeach;?>
            </select>
    </div>
    <?php if(validation_errors()):?> 
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         Pastikan isi data dengan lengkap dan benar !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif;?>
    <!-- Modal Tambah Buku-->
    <div class="modal fade" id="tambah_buku" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <h6 class="mt-2"><i>*Kode harus 6 digit</i></h6>
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
            <label for="lokasi">Lokasi buku</label>
            <input type="text" class="form-control" id="lokasi" placeholder="" name="lokasi">
          </div>
          <div class="form-group">
            <label for="thumb">Cover buku</label><br>
            <input type="file" name="thumb" id="thumb"><br>
            <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 200 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
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
                  
                </table>
              </div>
            </div> 
            <script src="<?=base_url()."assets/dist/js/data_buku.js"?>"></script>
</div>
<style>
  table .btn{
    height : unset;
    width : 50px;
    padding : 2px;
    font-size:14px;
    margin : 2px;
  }
</style>