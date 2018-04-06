<!-- Content Wrapper. Contains page content -->
<script src="<?php base_url('assets/jquery/jquery-3.1.0.min.js'); ?>"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Selamat Datang
    <small><?php echo $_SESSION['nama']; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>
  <style type="text/css">
  .satu{
  float: left;
  margin:-7px;
  }
  .tab{
  overflow: hidden;
  }
  </style>
  <!-- Main content -->
  <section class="content">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Pembayaran Zakat</h3>
        <small></small><!-- Untuk jam Real Time -->
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive table-scrollable">
          <form class="form-inline" action="<?php echo base_url('index.php/Home/insert_zakat'); ?>" method="POST" id="FormInsert">
            <table class="table table-striped no-margin tab">
              <tr>
                <td class="satu">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Nama</label>
                    <input type="text" class="form-control" name="nama" id="FormNama" placeholder="Nama" required autofocus>
                  </div>
                </td>
                <td class="satu">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="FormAlamat" placeholder="Alamat" required>
                  </div>
                </td>
                <td class="satu">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Zakat Fitrah</label>
                    <input type="text" class="form-control" name="zakatF" id="FormZF" placeholder="Zakat Fitrah">
                  </div>
                </td>
                <td class="satu">
                  <div class="form-group">
                    <select class="form-control" name="select">
                      <option value="Beli">Beli</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                </td>
                <td class="satu">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Zakat Mall</label>
                    <input type="text" class="form-control" name="zakatM" id="FormZM" placeholder="Zakat Mall">
                  </div>
                </td>
                <td class="satu">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Infaq</label>
                    <input type="text" class="form-control" name="infaq" id="FormInfaq" placeholder="Infaq">
                  </div>
                </td>
                <td class="satu">
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <br>
    </div>
    <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pembayaran</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive table-scrollable" style="max-height:185px; width:100%; overflow-y:auto; overflow-x:auto;">
          <table class="table table-striped table-scrollable no-margin">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Zakat Fitrah</th>
                <th>Beli</th>
                <th>Zakat Mall</th>
                <th>Infaq</th>
                <th>Waktu Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $hasil): ?>
              <tr>
                <td><?php echo $hasil->nama;?></td>
                <td><?php echo $hasil->alamat;?></td>
                <td><?php echo $hasil->zakat_fitrah;?></td>
                <td><?php echo $hasil->beli;?></td>
                <td><?php echo number_format((double)$hasil->zakat_mall,0, "," , ".");?></td>
                <td><?php echo number_format((double)$hasil->infaq,0, "," , ".");?></td>
                <td><?php echo $hasil->log_time;?></td>
              </tr>
              
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <a href="" class="btn btn-sm btn-info btn-flat pull-left">Lihat Semua Data</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->