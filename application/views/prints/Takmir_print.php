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
      <h1 style="background-color: #D4D4D4"><b>DAFTAR TAKMIR MASJID</b></h1>
    </center>

    <!-- /.box-header -->
    <div class="box-body">
      <table id="datatable" class="table table-bordered table-hover">
        <thead>
          <tr>
          <th>No.</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>HP</th>
            <th>Telpon</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
        foreach ($data as $row): ?>
          <tr>
            <td class="no">
              <?php echo $no; ?>
            </td>
            <td class="nama">
              <?php echo $row->nama; ?>
            </td>
            <td class="jabatan">
              <?php echo $row->jabatan;?>
            </td>
            <td class="jabatan">
              <?php echo $row->alamat;?>
            </td>
            <td class="jabatan">
              <?php echo $row->no_hp;?>
            </td>
            <td class="jabatan">
              <?php echo $row->no_telp;?>
            </td>
          </tr>
          <?php $no++;
        endforeach
        ?>
        </tbody>
      </table>
    </div>
  </div><!-- /.box -->
  <!-- /.content -->
  </div>
  <!-- ./wrapper -->
</body>

</html>