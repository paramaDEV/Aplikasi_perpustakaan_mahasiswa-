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
            <input type="text"  class="form-control" id="nama" name="nama" value="<?=$user['nama']?>">
          </div>
          <div class="form-group col-md-6">
            <label for="nim">Nomer Induk Mahasiswa</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?=$user['nim']?>">
          </div></div>
          <div class="form-row">
          <div class="form-group col-md-6 ">
            <label for="ttl">TTL</label>
            <input type="date" class="form-control" id="ttl" name="ttl" value="<?=$user['ttl']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="kelamin">Jenis Kelamin</label>
            <select class="form-control" id="kelamin" name="kelamin">
              <?php if($user["jenis_kelamin"]=="Laki-laki"){?>
                    <option value="Laki-laki" selected>Laki-laki</option>
                    <option value="Perempuan" >Perempuan</option>
              <?php }else if($user["jenis_kelamin"]=="Perempuan"){?>
                    <option value="Laki-laki" >Laki-laki</option>
                    <option value="Perempuan" selected>Perempuan</option>
              <?php }?>
            </select>
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fakultas">Fakultas</label>
            <select class="form-control" id="fakultas" name="fakultas">
              <?php foreach($fakultas as $x):
                if($x["nm_fakultas"]==$user["nm_fakultas"]){?>
                    <option value="<?=$x['id']?>" selected><?=$x["nm_fakultas"]?></option>
              <?php }else{?>
                    <option value="<?=$x['id']?>" ><?=$x["nm_fakultas"]?></option>
              <?php } endforeach;?>
            </select>
        </div>
        <div class="form-group col-md-6">
        <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
              <?php foreach($jurusan as $x):
                if($x["nm_jurusan"]==$user["nm_jurusan"]){?>
                    <option value="<?=$x['id']?>" selected><?=$x["nm_jurusan"]?></option>
              <?php }else{?>
                    <option value="<?=$x['id']?>" ><?=$x["nm_jurusan"]?></option>
              <?php } endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-group">
            <label for="thumb">Foto</label><br>
            <input type="file" name="foto" id="foto"><br>
            <h6 class="mt-2"><i>*Format foto : JPG, JPEG, PNG <br> Ukuran maksimal = 200 kB<br><span class="danger">Jika foto tidak sesuai ketentuan maka tidak akan tersimpan di database</span></i></h6>
        </div>
        <input type="hidden" name="id" value="<?=$user['id']?>">
        <input type="hidden" name="nm_foto" value="<?=$user['foto']?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?=form_close()?>
      </div>
    </section>
    <script src="<?=base_url()."assets/dist/js/update_anggota.js"?>"></script>
</div>
<style>
</style>
