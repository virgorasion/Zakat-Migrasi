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
            <h3>150</h3>

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
            <h3>53<sup style="font-size: 20px">%</sup></h3>

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
            <h3>44</h3>

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
            <h3>65</h3>

            <p>Total Kurban</p>
          </div>
          <div class="icon">
            <i class="fa fa-bug"></i>
          </div>
          <a href="<?=site_url("Hewan_kurban")?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
            <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
          </ul>
          <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
          </div>
        </div>
        <!-- /.nav-tabs-custom -->

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!-- Morris.js charts -->
<script src="<?=base_url('assets/AdminLTE-2.3.7/plugins/raphael/raphael.min.js')?>"></script>
<script src="<?=base_url('assets/AdminLTE-2.3.7/plugins/morris/morris.min.js')?>"></script>
<script>
  /* Morris.js Charts */
  // Sales chart
  var area = new Morris.Area({
    element   : 'revenue-chart',
    resize    : true,
    data      : [
      { y: '2011 Q1', item1: 2666, item2: 2666 },
      { y: '2011 Q2', item1: 2778, item2: 2294 },
      { y: '2011 Q3', item1: 4912, item2: 1969 },
      { y: '2011 Q4', item1: 3767, item2: 3597 },
      { y: '2012 Q1', item1: 6810, item2: 1914 },
      { y: '2012 Q2', item1: 5670, item2: 4293 },
      { y: '2012 Q3', item1: 4820, item2: 3795 },
      { y: '2012 Q4', item1: 15073, item2: 5967 },
      { y: '2013 Q1', item1: 10687, item2: 4460 },
      { y: '2013 Q2', item1: 8432, item2: 5713 }
    ],
    xkey      : 'y',
    ykeys     : ['item1', 'item2'],
    labels    : ['Item 1', 'Item 2'],
    lineColors: ['#a0d0e0', '#3c8dbc'],
    hideHover : 'auto'
  });

  // Fix for charts under tabs
  $('.box ul.nav a').on('shown.bs.tab', function () {
    area.redraw();
    donut.redraw();
    line.redraw();
  });

</script>