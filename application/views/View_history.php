<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        History Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Table History</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
            <!-- FORM VALIDATION ON TABS -->
            <!--===================================================-->
            <div class="tab-base">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="forms-validation.html#demo-bsc-tab-1" data-toggle="tab">
                            <i class="fa fa-history"></i> Kas Masjid</a>
                    </li>
                    <li>
                        <a href="forms-validation.html#demo-bsc-tab-2" data-toggle="tab">
                            <i class="fa fa-history"></i> Hewan Kurban</a>
                    </li>
                    <li>
                        <a href="forms-validation.html#demo-bsc-tab-3" data-toggle="tab">
                            <i class="fa fa-history"></i> Lapoan Pengeluaran</a>
                    </li>
                    <li>
                        <a href="forms-validation.html#demo-bsc-tab-4" data-toggle="tab">
                            <i class="fa fa-history"></i> Zakat</a>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div id="demo-bv-bsc-tabs" class="form-horizontal">
                    <div class="tab-content">

                        <!-- Start First Tab -->
                        <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Admin</th>
                                        <th class="min-tablet">Nama</th>
                                        <th class="min-tablet">Tipe</th>
                                        <th class="min-tablet">Jumlah</th>
                                        <th class="min-desktop">Tanggal</th>
                                        <th class="min-desktop">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($kas_masjid as $r): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $r->nama ?></td>
                                        <td><?= $r->nama_donatur ?></td>
                                        <td><?= $r->tipe ?></td>
                                        <td><?= $r->jumlah ?></td>
                                        <td><?= $r->tanggal ?></td>
                                        <td><?= $r->keterangan ?></td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Start Second Tab -->
                        <div class="tab-pane fade" id="demo-bsc-tab-2">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Admin</th>
                                        <th class="min-tablet">Nama</th>
                                        <th class="min-tablet">Jenis Hewan</th>
                                        <th class="min-tablet">Jumlah</th>
                                        <th class="min-desktop">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($hewan_kurban as $r): 
                                        if($r->jenis == 1)
                                        {
                                            $jenis = "Kambing";
                                        }else{
                                            $jenis = "Sapi";
                                        }
                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $r->admin ?></td>
                                        <td><?= $r->penyumbang ?></td>
                                        <td><?= $jenis ?></td>
                                        <td><?= $r->jumlah ?></td>
                                        <td><?= $r->tanggal_transaksi ?></td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Start Third Tab -->
                        <div class="tab-pane fade" id="demo-bsc-tab-3">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Admin</th>
                                        <th class="min-tablet">Jumlah</th>
                                        <th class="min-desktop">Tanggal</th>
                                        <th class="min-desktop">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($lap_pengeluaran as $r): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $r->admin ?></td>
                                        <td><?= $r->jumlah ?></td>
                                        <td><?= $r->tgl ?></td>
                                        <td><?= $r->keterangan ?></td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Start Fourth Tab -->
                        <div class="tab-pane fade" id="demo-bsc-tab-4">
                             <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Admin</th>
                                        <th class="min-tablet">Nama</th>
                                        <th class="min-desktop">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($zakat as $r): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $r->admin ?></td>
                                        <td><?= $r->nama ?></td>
                                        <td><?= $r->tgl ?></td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!-- END FORM VALIDATION ON TABS -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script>
    $(".datatable").dataTable();
</script>