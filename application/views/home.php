<?php
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<script src="<?php base_url('assets/jquery/jquery-3.1.0.min.js'); ?>"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Selamat Datang
      <small>
        <?php echo $_SESSION['nama']; ?></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h4><b><?= number_format((double)$tot_kas,0,",",".") ?></b></h4>
            <br>
            <p>Total Kas</p>
          </div>
          <div class="icon">
            <i class="fa fa-credit-card"></i>
          </div>
          <a href="<?=site_url('kas_ctrl')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h4><b><?= number_format((double)$tot_pengeluaran,0,",",".") ?></b></h4>
            <br>
            <p>Total Pengeluaran</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="<?=site_url('Lap_pengeluaran')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h4>
              <?= ($tot_zakat) ? $tot_zakat." KG" : "0" ; ?>
            </h4>
            <br>
            <p>Total Zakat</p>
          </div>
          <div class="icon">
            <i class="fa fa-money"></i>
          </div>
          <a href="<?=site_url('zakat_ctrl')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h4>
              Kambing: <?=(empty($tot_kurban[0]->jumlah))? "0" : $tot_kurban[0]->jumlah ?>
            </h4>
            <h4>
              Sapi: <?=(empty($tot_kurban[1]->jumlah))? "0" : $tot_kurban[1]->jumlah ?>
            </h4>

            <p>Total Kurban
              <?= date("Y") ?>
            </p>
          </div>
          <div class="icon">
            <i class="fa fa-bug"></i>
          </div>
          <a href="<?=site_url(" Hewan_kurban ")?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- /.col (LEFT) -->
      <div class="col-md-12">
        <!-- LINE CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Keuangan Masjid</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="canvas" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.Main Row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!-- Morris.js charts -->
<script src="<?=base_url('assets/AdminLTE-2.3.7/plugins/Chart.js/dist/Chart.bundle.min.js')?>"></script>
<script>

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

  var config = {
    type: 'line',
    data: {
      labels: [<?=$labels_masuk?>],
      datasets: [{
        label: "Pemasukan",
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [<?=$tot_masuk?>]
      }, {
        label: 'Pengeluaran',
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?=$tot_keluar?>]
      }]
    },
    options: {
      title: {
        text: 'Grafik Pemasukan & Pengeluaran'
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{ 
          type: 'time',
          display: true,
          scaleLabel: {
            display: true,
            labelString: ""
          },
          time: {
            unit: 'month',
            displayFormats: {
              day: "MMM YYYY"
            }
          }
        }],
        yAxes: [{
          ticks: {
            userCallback: function (value, index, values) {
              value = value.toString();
              value = value.split(/(?=(?:...)*$)/);
              value = value.join(',');
              return value;
            },
          },
          scaleLabel: {
            display: true,
            labelString: ""
          }
        }]
      },
      plugins: {
        filler: {
          propagate: true
        }
      }
    }
  };

  window.onload = function () {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myLine = new Chart(ctx, config);
  };

</script>