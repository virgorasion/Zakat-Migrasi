<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Miftahul Jannah | Print</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--jQuery-->
  <script src="<?php echo base_url('user_guide/_static/jquery-1.11.1.js')?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css')?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css')?>">

</head>

<body onload="window.print();">
  <div class="container">
    <!-- Main content -->
    <br>
    <b>Miftahul Jannah</b>
    <br>Surabaya
    <br>Kapas Madya
    <br>083849575737
    <center>
      <h1 style="background-color: #D4D4D4"><b>LAPORAN HEWAN KURBAN</b></h1>
    </center>
    <center>
      <h4><b>
          <?php echo ' Periode : '.$t1 .' s/d '. $t2  ;?></b></h4>
    </center>

    <!-- Default box -->
    <div class="box">

      <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Pembuat</th>
              <th>Penyumbang</th>
              <th>Alamat</th>
              <th>Jenis Hewan</th>
              <th>jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1;
        foreach ($data as $row){
          switch ($row->jenis) {
            case '1':
              $jenis = "Kambing";
              break;
            case '2':
              $jenis = "Sapi";
              break;
            default:
              $jenis = "Undefined";
              break;
          } ?>
            <tr>
              <td class="no">
                <?= $no ?>
              </td>
              <td class="pembuat">
                <?= $row->admin; ?>
              </td>
              <td class="penyumbang">
                <?= $row->penyumbang;?>
              </td>
              <td class="alamat">
                <?= $row->alamat;?>
              </td>
              <td class="jenisHewan">
                <?= $row->jenis;?>
              </td>
              <td class="jumlah">
                <?= $row->jumlah ;?>
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div><!-- /.box -->
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
</body>

</html>