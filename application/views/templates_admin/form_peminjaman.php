<div class="content-wrapper">
<?php 
date_default_timezone_set('Asia/Jakarta');
?>
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Form Peminjaman</a></li>
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
                  Validasi Data Peminjaman
                </h3>
              </div>
              <div class="card-body">
                <div class="form-group col-md-6">
                      <label for="kode_buku">Gambar Buku</label>
                      <br>
                      <img src="<?=base_url().'img/buku/'.$buku['thumbnail']?>" height="300px">
                </div>
                <form method="POST" action="<?=base_url().'main_controller/tambah_peminjaman'?>">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="kode_buku">Kode Buku</label>
                      <input type="text" class="form-control" readonly id="kode_buku" name="kode_buku" value="<?=$buku['kode_buku']?>">
                      <input type="hidden" name="id_buku" value="<?=$buku['id']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="kode_buku">Judul Buku</label>
                      <input type="text" class="form-control" readonly id="kode_buku" name="kode_buku" value="<?=$buku['judul']?>">
                      <input type="hidden" name="id_user" value="<?=$mahasiswa['id']?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nim">Nomer Induk</label>
                      <input type="text" class="form-control" readonly id="nim" name="nim" value="<?=$mahasiswa['nim']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nama">Nama </label>
                      <input type="text" class="form-control" readonly id="nama" name="nama" value="<?=$mahasiswa['nama']?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="tgl_pinjam">Tanggal Pinjam</label>
                      <input type="text" class="form-control" readonly id="tgl_pinjam" name="tgl_pinjam" value="<?= date("Y-m-d")?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="tgl_kembali">Tanggal Kembali</label>
                      <input type="text" class="form-control" readonly id="tgl_kembali" name="tgl_kembali" value="<?= date("Y-m-d",time()+(60*60*24*14))?>">
                    </div>
                  </div>
                  <a href="<?=base_url().'admin_controller/hal_peminjaman'?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin menambahkan data ini ?');">Save</button>
                </form>
              </div>
            </div> 
      </div>
    </section>
</div>
