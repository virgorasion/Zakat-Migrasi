<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/download.png');?>">
	<title>Masjid'Q</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>">
	<!-- Bootstrap Validator -->
	<link rel="stylesheet"
		href="<?= base_url('assets/AdminLTE-2.3.7/plugins/bootstrap-validator/bootstrapValidator.min.css') ?>">
	<!-- Jquery Confirm -->
	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-confirm/jquery-confirm.min.css');?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css');?>">
	<!--Bootstrap Table [ OPTIONAL ]-->
	<link rel="stylesheet"
		href="<?= base_url('assets/AdminLTE-2.3.7/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') ?>">
	<link rel="stylesheet"
		href="<?= base_url('assets/AdminLTE-2.3.7/plugins/datatables/media/css/dataTables.bootstrap.css') ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/iCheck/all.css');?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css');?>">
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css');?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue-light sidebar-mini">
	<div class="wrapper" id="container">

		<!-- Main Header -->
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo site_url('home');?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>M</b>Q</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Masjid</b>'Q</span>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>


				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">

						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="<?php echo base_url('assets/download.png')?>" class="user-image"
									alt="User Image">
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs"><?php echo $_SESSION['nama'];?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="<?php echo base_url('assets/download.png')?>" class="img-circle"
										alt="User Image">

									<p>
										<?php echo $_SESSION['username'];?> - <?php echo $_SESSION['nama'];?>
										<small>Member since Nov. 2012</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<a href="<?php echo site_url('Auth/logout')?>"
											class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
		</header>