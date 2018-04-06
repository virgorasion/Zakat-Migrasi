<html>
<head>
 <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/dataTables.bootstrap.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css')?>">      
  <!--jQuery-->
  <script src="<?php echo base_url('user_guide/_static/jquery-1.11.1.js')?>"></script>
        
</head>
<body onload="window.print();">
<!--header-->        
<div class="container">
<br>
  <b>BELUT KHAS SURABAYA</b>
  <?php
	foreach($data_cabang as $row)
  ?>
  <br><?php echo $row->nama_cabang; ?>
  <br><?php echo $row->alamat; ?>
  <br><?php echo $row->telepon; ?>
  <center><h1 style="background-color: #D4D4D4"><b>LIST MENU RESTORAN</b></h1></center>
        <!-- /.box-header-->
	<div class="box">
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>Cabang</th>
              <th>Kategori</th>
              <th>Satuan</th>
              <th>Nama Menu</th>
              <th>Harga</th>
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
						<td class="nama_kategori">
                            <?php echo $row->nama_kategori; ?>
                            <input type="hidden" id="kode_kategori" value="<?php echo $row->kode_kategori;?>">
                        </td>
						<td class="nama_satuan">
                            <?php echo $row->nama_kategori; ?>
                            <input type="hidden" id="kode_satuan" value="<?php echo $row->kode_satuan;?>">
                        </td>
                        <td class="nama_menu">
                            <?php echo $row->nama_menu; ?>
                            <input type="hidden" id="kode_menu" value="<?php echo $row->kode_menu;?>">
                        </td>
                        <td class="harga"><?php echo $row->harga;?></td>
                        
                    </tr>
                <?php 
				$no+=1;
				endforeach
				?>
            </tbody>
          </table>
        </div>
    </div>
</div>
</body>
</html>