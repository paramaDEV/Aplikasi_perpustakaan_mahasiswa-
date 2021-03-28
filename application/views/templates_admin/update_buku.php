<div class="content-wrapper">
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Update Buku</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content ">
    <div class="container">
      <?= form_open_multipart()?>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="kode_buku">Kode </label>
            <input type="text" readonly class="form-control" id="kode_buku" name="kode_buku" value="<?=$buku[0]['kode_buku']?>">
          </div>
          <div class="form-group col-md-6">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?=$buku[0]['judul']?>">
          </div>
        </div>
        <div class="form-group col-md-12">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?=$buku[0]['penulis']?>">
        </div>
        <div class="form-group">
          <label for="tema">Tema</label>
          <select class="form-control" id="tema" name="tema">
          <?php
          foreach($tema as $x):
          ?>
            <option value=<?=$x["id"]?>><?=$x["tema"]?></option>
          <?php endforeach;?>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" id="panerbit" name="penerbit" value="<?=$buku[0]['penerbit']?>">
          </div>
          <div class="form-group col-md-2">
            <label for="jmlh_halaman">Jumlah Halaman</label>
            <input type="text" class="form-control" id="jmlh_halaman" name="jmlh_halaman" value="<?=$buku[0]['jumlah_halaman']?>">
          </div>
          <div class="form-group col-md-4">
            <label for="jmlh_buku">Total Buku</label>
            <input type="text" class="form-control" id="jmlh_buku" name="jmlh_buku" value="<?=$buku[0]['jumlah']?>">
          </div>
        </div>
        <div class="form-group">
            <label for="thumb">Cover buku</label><br>
            <input type="file" name="thumb" id="thumb"><br>
            <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 500 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
        </div>
        <input type="hidden" name="id_buku" value="<?=$buku[0]['id']?>">
        <input type="hidden" name="thumb_name" value="<?=$buku[0]['thumbnail']?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?=form_close()?>
      </div>
    </section>
</div>
<style>
</style>
