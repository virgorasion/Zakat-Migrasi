<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Setting Profile
            <small><?=$_SESSION['nama']?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if (isset($_SESSION['succ'])) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['succ']; ?>
        </div>
        <?php 
    } ?>

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Profile</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?=site_url("Setting_pass/UbahProfil")?>" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="gantiNama" placeholder="Enter email" value="<?=$_SESSION['nama']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="gantiUser" placeholder="Password" value="<?=$_SESSION['username']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="gantiPass" placeholder="Password">
                            <small id="exampleInputPassword2" class="form-text text-muted">Password Boleh Kosong</small>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">Type Gambar: JPEG,JPG,PNG & MAX Size: 5 Mb</p>
                        </div> -->
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-success").slideUp(500);
    });
</script>