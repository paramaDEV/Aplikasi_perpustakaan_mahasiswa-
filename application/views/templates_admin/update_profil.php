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
            <label for="nama">Nama</label>
            <input type="text"  class="form-control" id="nama" name="nama" value="<?=$admin['nama']?>">
          </div>
          <div class="form-group col-md-6">
            <label for="nim">Nomer Induk </label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?=$admin['nomer_induk']?>">
          </div></div>
          <div class="form-row">
          <div class="form-group col-md-6 ">
            <label for="ttl">Tanggal Lahir</label>
            <input type="date" class="form-control" id="ttl" name="ttl" value="<?=$admin['ttl']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="kelamin">Jenis Kelamin</label>
            <select class="form-control" id="kelamin" name="kelamin">
              <?php if($admin["jenis_kelamin"]=="Laki-laki"){?>
                    <option value="Laki-laki" selected>Laki-laki</option>
                    <option value="Perempuan" >Perempuan</option>
              <?php }else if($admin["jenis_kelamin"]=="Perempuan"){?>
                    <option value="Laki-laki" >Laki-laki</option>
                    <option value="Perempuan" selected>Perempuan</option>
              <?php }?>
            </select>
        </div>
        </div>

        <div class="form-group">
            <label for="thumb">Foto</label><br>
            <input type="file" name="foto" id="foto"><br>
            <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 200 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
        </div>
        <input type="hidden" name="id" value="<?=$admin['id']?>">
        <input type="hidden" name="nm_foto" value="<?=$admin['foto']?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?=form_close()?>
      </div>
    </section>
</div>
<style>
</style>
