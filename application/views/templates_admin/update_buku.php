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
    <?php if(validation_errors()):?> 
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         Pastikan isi data dengan lengkap dan benar !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif;?>
      <?= form_open_multipart()?>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="kode_buku">Kode </label>
            <input type="text" readonly class="form-control" id="kode_buku" name="kode_buku" value="<?=$buku['kode_buku']?>">
          </div>
          <div class="form-group col-md-6">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?=$buku['judul']?>">
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?=$buku['penulis']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" id="panerbit" name="penerbit" value="<?=$buku['penerbit']?>">
        </div>
        </div>
        <div class="form-group">
          <label for="tema">Tema</label>
          <select class="form-control" id="tema" name="tema">
          <?php
          foreach($tema as $x):
            if($x["id"]==$buku["tema"]){
          ?>
            <option value=<?=$x["id"]?> selected ><?=$x["tema"]?></option>
          <?php } else{?>
            <option value=<?=$x["id"]?>  ><?=$x["tema"]?></option>
          <?php } endforeach;?>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="jmlh_halaman">Jumlah Halaman</label>
            <input type="text" class="form-control" id="jmlh_halaman" name="jmlh_halaman" value="<?=$buku['jumlah_halaman']?>">
          </div>
          <div class="form-group col-md-4">
            <label for="jmlh_buku">Total Buku</label>
            <input type="text" class="form-control" id="jmlh_buku" name="jmlh_buku" value="<?=$buku['jumlah']?>">
          </div>
          <div class="form-group col-md-4">
            <label for="lokasi">Lokasi Buku</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?=$buku['lokasi']?>">
          </div>
        </div>
        <div class="form-group">
            <label for="thumb">Cover buku</label><br>
            <input type="file" name="thumb" id="thumb"><br>
            <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 200 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
        </div>
        <input type="hidden" name="id_buku" value="<?=$buku['id']?>">
        <input type="hidden" name="thumb_name" value="<?=$buku['thumbnail']?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?=form_close()?>
      </div>
    </section>
</div>
<style>
</style>
