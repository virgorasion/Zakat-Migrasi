<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Miftahul Jannah | Print</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--jQuery-->
    <script src="<?php echo base_url('user_guide/_static/jquery-1.11.1.js');?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css');?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css');?>">
    
  </head>
  <body onload="window.print();">
    <div class="container">
      <!-- Main content -->
      <br>
      <b>Miftahul Jannah</b>
      <br>Surabaya
      <br>Kapas Madya
      <br>083849575737
      <center><h1 style="background-color: #D4D4D4"><b>LAPORAN ZAKAT & INFAQ</b></h1></center>
      <center><h4 ><b><?php echo ' Periode : '.$t1 .' s/d '. $t2  ;?></b></h4></center>
      
      <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Zakat Fitrah</th>
              <th>Pembelian</th>
              <th>Zakat Mall</th>
              <th>Infaq</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            error_reporting(0); // Hilangkan untuk jika dalam mode develop
            $no = 1;
            $hasil = '';
            $beli = 0;
            $tidak = 0;
            $zakat = 0;
            $infaq = 0;
            foreach ($selBeli as $value) {
              $totBeli = $value->zakat;
            }
            foreach ($data as $row):
              $tgl = explode('-',$row->tanggal);
              $tanggal = $tgl[1].'-'.$tgl[2];
              $hasil = $row->beli;
              $zakat += $row->zakat_mall;
              $infaq += $row->infaq;
              if($hasil == "0"){
                $pembelian = "Beli";
              $beli += count($beli);
            }else{
              $pembelian = "Tidak";
              $tidak += count($beli);
            }
            ?>
            <tr>
              <td class="no"><?php echo $no; ?></td>
              <td class="nama_cabang"><?php echo $row->nama; ?></td>
              <td class="no_faktur_jual"><?php echo $row->alamat;?></td>
              <td class="tanggal_transaksi"><?php echo $row->zakat_fitrah;?></td>
              <td class="nama_kasir"><?php echo $pembelian ?></td>
              <td class="jenis_penjualan"><?php echo number_format((double)$row->zakat_mall,0,"," , ".");?></td>
              <td class="jenis_pembayaran"><?php echo number_format((double)$row->infaq,0,",",".");?></td>
              <td><?php echo $tanggal;?></td>
            </tr>
            <?php
            $no++;
            endforeach
            ?>
            <tfoot>
            <td colspan="3">Total : </td>
            <td><?php echo $totBeli; ?></td>
            <td>Beli : <?php echo $beli; ?><br>Tidak : <?php echo $tidak; ?></td>
            <td><?php echo number_format($zakat,0,',','.'); ?></td>
            <td><?php echo number_format($infaq,0,',','.'); ?></td>
            </tfoot>
          </tbody>
        </table>
      </div>
      </div><!-- /.box -->
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->
  </body>
</html>