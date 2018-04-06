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
		<script src="<?php echo base_url('user_guide/_static/jquery-1.11.1.js')?>"></script>

</head>
<body onload="window.print()">
<div class="container">
<!--KOP-->
	<table>
		<!--Table Head-->
			<tr>
				<td colspan="2">
					<b>BELUT KHAS SURABAYA</b>
				</td>
			</tr>
			<?php 
				foreach ($cabang as $data):
			?>	
			<tr>
				<td>
					<?php echo $data->nama_cabang ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $data->alamat ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $data->telepon ?>
				</td>
			</tr>
			<?php
			endforeach;
			?>
		<!--End TableHead-->
	</table>
<!--END KOP-->
	<table>
				<div style="background-color:lightgrey;"><center><h1>FAKTUR PEMBELIAN</h1></center></div>
	</table>
<!--ISI-->
	<table id="datatable" class="table table-bordered table-hover">
		<!--Data Table-->
			<tr>
				<td>No.</td>	
				<td>Bahan Baku</td>
				<td>Jumlah</td>
				<td>Harga</td> 
				<td>SubTotal</td> 
			</tr>
			<?php $no=1;
				foreach ($pembelian_detail as $row):
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $row->nama_bahan_baku ?></td>
				<td><?php echo $row->jumlah ?></td>
				<td><?php echo $row->harga_beli ?></td>
				<td><?php echo $row->subtotal ?></td>
	
			</tr>
			<?php
				$no+1;
				endforeach;
			?>
			<?php
				foreach ($pembelian as $row):
			?>
			<tr>
				<td colspan="4" style="text-align:right;">TOTAL</td>
				<td><?php echo $row->total?></td>
			</tr>
			<?php
			endforeach;
			?>
		<!--End DataTable-->
	</table>
<!--END ISI-->
		
		
</div>
</body>
</html>