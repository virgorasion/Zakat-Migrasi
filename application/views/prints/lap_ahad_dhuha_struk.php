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
<div class="data-struk" style="width: 300px; margin-left: 20px;">
  <!-- Main content -->
  <br>
  <b>MASJID MIFTAHUL JANNAH<b>
  <?php
	foreach($ as $row):
  ?>
  <br><?php echo $row->nama_cabang; ?>
  <br><?php echo $row->alamat; ?>
  <br><?php echo $row->telepon; ?>
  <center><h3 style="background-color: #D4D4D4"><b>BUKTI KAS MASUK</b></h3></center>
  
 <!-- Default box -->
    <div class="box">        
        <div class="box-header"></div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover" >
            <tbody>
                <?php 
        foreach ($data as $row):
        ?>
                    <tr>
                        <td class="no">
                        <?php echo $row->nomor; ?>
                          <input type="hidden" name="no" id="no" value="<?php echo $row->nomor ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="nama">
                        <?php echo $row->admin; ?>
                          <input type="hidden" value="<?php echo $row->admin ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="tanggal">
                        <?php $alih=explode('-',$row->tanggal); $tanggal = $alih[2] .'-'. $alih[1] .'-'. $alih[0]; echo $tanggal; ?>
                          <input type="hidden" id="tanggal" value="<?php echo $row->tanggal ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="jumlah">
                        <?php echo number_format((double)$row->jumlah,0,"," , ".");?>
                          <input type="hidden" value="<?php echo number_format((double)$row->jumlah,0,"," , ".") ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="logtime">
                        <?php echo $row->log_time;?>
                          <input type="hidden" value="<?php echo $row->log_time ;?>">
                        </td>
                    </tr>
                <?php 
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
