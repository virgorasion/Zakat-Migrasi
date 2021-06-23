<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pantau Santri | Masjid'Q</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css');?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css');?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css');?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="../../index2.html" class="navbar-brand"><b>M</b>asjid'Q</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
							data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=site_url("Login")?>">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Login </span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->

				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper">
			<div class="container">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Halaman Pemantauan Santri
						<!-- <small>Example 2.0</small> -->
					</h1>
					<ol class="breadcrumb">

					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="callout callout-danger">
						<h4>Perhatian!</h4>

						<p>Jangan beritahukan kode pin anda pada orang lain.</p>
					</div>
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Form Pemantauan</h3>
						</div>
						<div class="box-body">
							<form class="form-inline" action="pantau_santri" method="get">
								<div class="form-group col-md-4">
									<label for="cariTanggal">Tanggal Lahir</label>
									<input type="date" name="cariTanggal" id="cariTanggal" class="form-control"
										placeholder="Tanggal Lahir" aria-describedby="tanggal">
								</div>

								<div class="form-group col-md-4">
									<label for="cariKode">Kode Pin</label>
									<input type="text" name="cariKode" id="cariKode" class="form-control"
										placeholder="Kode Pin" aria-describedby="">
								</div>
								<button type="submit" name="submit" value="submit" class="btn btn-success col-md-4">Cari Santri</button>
							</form>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
					
					<?php if($status):?>
					<!-- Hasil Pantauan -->
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Data Santri</h3>
						</div>
						<div class="box-body">
							<h4><b>Nama:</b> <?=$dataRaportSantri[0]->nama?></h4>
							<h4><b>Kelas:</b> <?=$dataRaportSantri[0]->nama_kelas?></h4>
							<br>
							<h4><b>Absensi Santri</b></h4>
							<table id="tableAbsensi" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Hari</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($dataAbsensiSantri as $data): ?>
									<tr>
										<td><?=date_format(date_create($data->tanggal),"l")?></td>
										<td><?=date_format(date_create($data->tanggal),"d-M-Y")?></td>
										<td><label class="label <?=($data->absen == "H")? "label-success" : (($data->absen == "I")? "label-warning" : "label-danger") ?>"><?=($data->absen == "H")? "Hadir" : (($data->absen == "I")? "Izin" : "Tidak Hadir") ?></label></td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
							<h4><b>Raport Santri</b></h4>
							<table id="tableRaport" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Pengajar</th>
										<th>Mata Pelajaran</th>
										<th>Nilai</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($dataRaportSantri as $data): ?>
									<tr>
										<td><?=$data->nama_guru?></td>
										<td><?=$data->mapel?></td>
										<td><?=$data->nilai?></td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
					<?php elseif($submit == NULL): ?>
						
					<?php else: ?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
							Tanggal atau pin anda salah !
						</div>
					<?php endif ?>

				</section>
				<!-- /.content -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="container">
				<div class="pull-right hidden-xs">
					<b>Tugas</b> Wawasan Teknologi & Komunikasi
				</div>
				<strong>Copyright &copy; 2021 </strong> M Nur Fauzan W & Maughfirotul Jannah
				reserved.
			</div>
			<!-- /.container -->
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/js/bootstrap.min.js')?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/AdminLTE-2.3.7/dist/js/app.min.js')?>"></script>
</body>

</html>