<div class="content-wrapper">
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Buku</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
              <div class="card-body ">
              <div class="card mx-auto" id="detail" >
                <div class="image mx-auto" style="overflow:hidden" >
                  <img src="<?php if($buku["thumbnail"]==""){
                      echo base_url()."img/buku/book.png";
                  }else{
                      echo base_url()."img/buku/".$buku["thumbnail"];
                  }?>" 
                  class="thumbnail mx-auto mt-3"  alt="Cover Buku">
                </div>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Judul</b> : <?=$buku["judul"]?> </li>
                    <li class="list-group-item"><b>Kode</b>  : <?=$buku["kode_buku"]?></li>
                    <li class="list-group-item"><b>Tema</b>  : <?=$buku["tema"]?></li>
                    <li class="list-group-item"><b>Penerbit</b>  : <?=$buku["penerbit"]?></li>
                    <li class="list-group-item"><b>Penulis</b>  : <?=$buku["penulis"]?></li>
                    <li class="list-group-item"><b>Jumlah Halaman</b>  : <?=$buku["jumlah_halaman"]?> Hal</li>
                    <li class="list-group-item"><b>Jumlah Buku</b>  : <?=$buku["jumlah"]?> </li>
                    <li class="list-group-item"><b>Lokasi Buku</b>  : Rak <?=$buku["lokasi"]?> </li>
                  </ul>
                  <div class="card-body">
                    <b><a href=<?=base_url()."main_controller/hal_update_buku/".$buku["id"]?> class="card-link mr-3">Edit</a></b>
                    <b><a href=<?=base_url()."main_controller/hapus_buku/".$buku["id"]?> class="card-link text-danger"
                    onclick="return confirm('Apakah anda yakin menhapus data ini ?')">Delete</a></b>
                  </div>
                </div>
            </div>
    </section>
</div>
<style>
  .thumbnail{
    height:300px;
    width : auto;
  }
  #detail{
    width: 80%;
    padding:5px
  }
  @media screen and (max-width:330px){
    .content-wrapper{
      overflow-x:hidden;
    }
    .card-body{
      width : 90%;
    }
    #detail{
    width: 90%;
    padding:5px
  }
  .thumbnail{
    height:150px;
    width : auto;
  }
  }
</style>