<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Santri</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="<?=site_url("Santri_ctrl/post_santri")?>" role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="addNama">Nama Santri</label>
                                <input type="text" class="form-control" name="addNama" id="addNama" placeholder="Nama Santri">
                            </div>
                            <div class="form-group">
                                <label for="addAlamat">Alamat</label>
                                <input type="text" class="form-control" name="addAlamat" id="addAlamat" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="addLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="addLahir" id="addLahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="addWali">Wali Santri</label>
                                <input type="text" class="form-control" name="addWali" id="addWali" placeholder="Nama Wali Santri">
                            </div>
                            <div class="form-group">
                                <label for="AddNomor">Nomor HP</label>
                                <input type="text" class="form-control" name="addNomor" id="addNomor" placeholder="Nomor Handphone">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>