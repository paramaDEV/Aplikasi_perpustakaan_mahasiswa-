<div class="content-wrapper">
 <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Peminjaman</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      <div class="card-body">
              <div class="card mx-auto" id="detail" style="">
                <div class="image mx-auto" style="overflow:hidden" >
                  <img src="<?= base_url()."img/buku/".$pengembalian["thumbnail"];?>" 
                  class="thumbnail mx-auto mt-3"  alt="Cover Buku">
                </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Judul</b> : <?=$pengembalian["judul"]?></li>
                    <li class="list-group-item"><b>Kode</b> : <?=$pengembalian["kode_buku"]?></li>
                    <li class="list-group-item"><b>Dipinjam Oleh</b> : <?=$pengembalian["nama"]?></li>
                    <li class="list-group-item"><b>Nomer Induk Mahasiswa</b> : <?=$pengembalian["nim"]?></li>
                    <li class="list-group-item"><b>Tanggal Pinjam</b> : <?=$pengembalian["tanggal_pinjam"]?></li>
                    <li class="list-group-item"><b>Batas Pinjam</b> : <?=$pengembalian["batas_pinjam"]?></li>
                    <li class="list-group-item"><b>Tanggal Kembali</b> : <?=$pengembalian["tanggal_kembali"]?></li>
                    <li class="list-group-item"><b>Denda</b> : Rp <?=$pengembalian["denda"]?></li>
                  </ul>
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