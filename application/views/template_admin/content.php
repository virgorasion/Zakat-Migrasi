<style>
 .img{
   width:120px;
   padding:5px;
   background-color:#afaaba;
   border-radius:50%;
 }
 .body{
   float:left;
   padding: 20px;
   background-color:white;
   width:30%;
   border-top:4px solid blue;
 }

 .kanan{
   float:right;
 }
 .head-div{
  position:relative;
  top:-15px;
 }
 .body1{
   border-top:5px solid blue;
   padding:30px;
 }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Admin
        <small>Restoran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> 
 
    <!-- Main content -->
    <section class="content">
    <div class="body">
    <center><img class="img" src="<?php echo base_url('assets/logo.png')?>" class="user-image" alt="User Image"></center>
    <center><h3 class="head-div"><?php echo $_SESSION['nama']; ?></h3></center>
    <div class="kiri" >Kode User <span class="kanan" ><?php echo $_SESSION['kode_user']; ?> </span></div><hr>
    <div class="kiri" >Kode Cabang <span class="kanan" ><?php echo $_SESSION['kode_cabang']; ?> </span></div><hr>
    <div class="kiri" >Kode Akses <span class="kanan" ><?php echo $_SESSION['kode_akses']; ?> </span></div><hr>
    </div>
    <div class="body1">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga nesciunt ab eos fugiat veritatis impedit, quia non minima labore eligendi itaque deleniti maiores, id quidem iure! Facilis minus excepturi vitae?
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->