 <!DOCTYPE html>
 <html>
<title>Restaurant | Print</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!--jQuery-->
  <script src="<?php echo base_url('user_guide/_static/jquery-1.11.1.js')?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/dataTables.bootstrap.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css')?>">
 <head>
   <title></title>
 </head>
 <body onload="window.print();">
<div class="container">
  <br>
  <b>BELUT KHAS SURABAYA</b>
  <?php
	foreach($data_cabang as $row)
  ?>
  <br><?php echo $row->nama_cabang; ?>
  <br><?php echo $row->alamat; ?>
  <br><?php echo $row->telepon; ?>
  <center><h1 style="background-color: #D4D4D4"><b>LIST SUPPLIER</b></h1></center>
      
    <!-- Default box -->
    <div class="box">        
        <div class="box-header">

        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>Cabang</th>
              <th>Supplier</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th style="diplay:none;">Nama CP</th>
              <th style="dsplay:none;">Telepon CP</th>
            </tr>
            </thead>
            <tbody>
                <?php 
        $no = 1;
        foreach ($data as $row):
        ?>
                    <tr>
                        
                        <td class="no" width=5% ><?php echo $no ?></td>
            <td class="nama_cabang">
                            <?php echo $row->nama_cabang; ?>
                            <input type="hidden" id="kode_cabang" value="<?php echo $row->kode_cabang;?>">
                        </td>
                        <td class="nama_supplier">
                            <?php echo $row->nama_supplier; ?>
                            <input type="hidden" id="kode_supplier" value="<?php echo $row->kode_supplier;?>">
                        </td>
                        <td class="alamat_kantor">
                            <?php echo $row->alamat_kantor;?></td>

                        <td class="telepon_kantor">
                            <?php echo $row->telepon_kantor;?></td>
                       
                        <td style="dislay:none;" class="nama_cp">
                            <?php echo $row->nama_cp;?></td>

                        <td style="diplay:none;" class="telepon_cp">
                            <?php echo $row->telepon_cp;?> </td>  

                        
                    </tr>
                <?php 
        $no+=1;
        endforeach
        ?>
            </tbody>
          </table>
        </div>
    </div><!-- /.box -->
	</div>
	 </div>
</section>
</div>
 </body>
 </html>
