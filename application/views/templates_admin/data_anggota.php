<div class="content-wrapper">
<?php 
date_default_timezone_set('Asia/Jakarta');
?>
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Anggota</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
   <!-- Button trigger modal -->
  <button type="button" class="btn btn-success mb-3" style="margin-top:-10px" data-toggle="modal" data-target="#staticBackdrop">
  <i class="fas fa-plus"></i> Tambah Anggota
  </button>
  <div class="form-row">
          <div class="form-group col-md-4">
          <label for="fakultas">Fakultas</label>
            <select name="fakultas" id="fakultas1" class="form-control">
              <?php foreach($fakultas as $x):?>
              <option value="<?=$x['id']?>"><?=$x["nm_fakultas"]?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group col-md-4">
          <label for="jurusan" >Jurusan</label>
            <select name="jurusan" id="jurusan1" class="form-control"></select>
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
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?= form_open_multipart();?>
                <div class="form-group">
                  <label for="nim">Nomer Induk Mahasiswa</label>
                  <input type="text" class="form-control" id="nim" name="nim"   placeholder="Nomer induk mahasiswa">
                </div>
                <div class="form-group">
                  <label for="nama">Nama Mahasiswa</label>
                  <input type="text" class="form-control" id="nama" name="nama"  placeholder="Nama Mahasiswa">
                </div>
                <div class="form-group">
                  <label for="kelamin">Jenis Kelamin</label>
                  <select name="kelamin" id="kelamin" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ttl">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="ttl" name="ttl" >
                </div>
                <div class="form-group">
                  <label for="fakultas">Fakultas</label>
                  <select name="fakultas" id="fakultas2" class="form-control">
                    <?php foreach($fakultas as $x):?>
                    <option value="<?=$x['id']?>"><?=$x["nm_fakultas"]?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <select name="jurusan" id="jurusan2" class="form-control">
                  
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" >
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label><br>
                  <input type="file" name="foto" id="foto"><br>
                  <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 200 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              <?= form_close();?>
        </div>
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
            <script src="<?=base_url()."assets/dist/js/data_anggota.js"?>"></script>
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
