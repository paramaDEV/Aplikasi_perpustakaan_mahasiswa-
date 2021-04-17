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
    <div class="form-group col-md-4">
          <label for="fakultas">Tema</label>
            <select name="tema-select" id="tema-select" class="form-control">
              <?php foreach($tema as $x):?>
              <option value="<?=$x['id']?>"><?=$x["tema"]?></option>
              <?php endforeach;?>
            </select>
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
            <script src="<?=base_url()."assets/dist/js/data_buku_user.js"?>"></script>
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