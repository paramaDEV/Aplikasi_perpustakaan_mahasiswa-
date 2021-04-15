<div class="content-wrapper" >
<?php 

$tanggal=[];
$peminjamanHariIni=0;
$kembaliHariIni=0;
$terlambatHariIni=0;
$hilangHariIni=0;
  for($i=6;$i>=0;$i--){
        $tanggal[]=date("Y-m-d",time()-(60*60*24*$i));
  }


 ?>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Buku</span>
                <span class="info-box-number"><?=count($buku)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-box"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sedang Dipinjam</span>
                <span class="info-box-number"><?=count($peminjaman)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sedang Dipinjam <br>& Terlambat</span>
                <span class="info-box-number"><?php $arr=[];
                        foreach($terlambat as $x):
                            if(time()>strtotime($x["batas_pinjam"])){
                            $arr[]=$x;
                            }
                        endforeach;
                        echo count($arr);?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Hilang</span>
                <span class="info-box-number"><?=count($hilang)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Laporan Detail</h5>

               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart">
                      <canvas id="myChart" ></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Total Harian</strong>
                    </p>

                    <div class="progress-group">
                      Jumlah Peminjaman
                      <span class="float-right"><b><?=count($today["peminjaman"])?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: <?=(count($today["peminjaman"])/200)*100?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                    Jumlah Pengembalian
                      <span class="float-right"><b><?=count($today["pengembalian"])?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: <?=(count($today["pengembalian"])/200)*100?>%"></div>
                      </div>
                    </div>
                        
                    <div class="progress-group">
                    Jumlah Pengembalian Terlambat
                      <span class="float-right"><b><?=count($today["terlambat"])?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: <?=(count($today["terlambat"])/200)*100?>%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Jumlah Buku Hilang
                      <span class="float-right"><b><?=count($today["hilang"])?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: <?=(count($today["hilang"])/200)*100?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
      </div>
      </div>
     </div>
    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['<?=$tanggal[0]?>',
                     '<?=$tanggal[1]?>',
                     '<?=$tanggal[2]?>',
                     '<?=$tanggal[3]?>',
                     '<?=$tanggal[4]?>',
                     '<?=$tanggal[5]?>',
                     '<?=$tanggal[6]?>'],
            datasets: [{
            label: 'Peminjaman Seminggu Terakhir',
            data: ['<?=$jmlPeminjaman[0]?>', 
                   '<?=$jmlPeminjaman[1]?>',
                   '<?=$jmlPeminjaman[2]?>',
                   '<?=$jmlPeminjaman[3]?>',
                   '<?=$jmlPeminjaman[4]?>',
                   '<?=$jmlPeminjaman[5]?>',
                   '<?=$jmlPeminjaman[6]?>'],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>