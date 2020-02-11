<?php 
$this->load->view('template/head');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
<?php
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kas Masjid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Kas Masjid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Tabel Kas Masjid
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!-- <h4>Custom Content Below</h4> -->
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                            href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                            aria-selected="false">Profile</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <br>
                        <!-- Date range -->
                        <form action="#" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="searchByDate">
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    style="margin-right:5px">Tampilkan</button>
                                <button class="btn btn-default">Print</button>
                            </div>
                        </form>
                        <!-- /.form group -->

                        <table id="datatable" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th class="min-tablet">Admin</th>
                                    <th class="min-tablet">Tipe</th>
                                    <th class="min-tablet">Jumlah</th>
                                    <th class="min-desktop">Tanggal</th>
                                    <th class="min-desktop">Keterangan</th>
                                    <?php if($_SESSION['25edit'] == 1 || $_SESSION['25delete'] == 1){ ?>
                                    <th class="min-desktop">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                        aria-labelledby="custom-content-below-profile-tab">
                        <form action="<?php echo site_url('kas_ctrl/tambah'); ?>" method="POST">
                            <div class="row">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p class="col-md-2"><b>Nama Admin:</b> <?php echo $_SESSION['nama']; ?></p>
                                        <input type="hidden" class="form-control" name="addAdmin"
                                            value="<?php echo $_SESSION['nama']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama :</label>
                                        <input required type="text" class="form-control col-md-10" name="addNama"
                                            placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tipe :</label>
                                        <select required class="form-control col-md-7" name="addTipe" id="addTipe">
                                            <option value="">- Pilih Tipe -</option>
                                            <option value="6">Donatur Tetap</option>
                                            <option value="7">Donatur Tidak Tetap</option>
                                            <option value="8">Infaq</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tanggal :</label>
                                        <input required type="text" class="form-control col-md-10" name="addTanggal"
                                            placeholder="31-Agustus-2000" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Jumlah :</label>
                                        <input required type="text" class="form-control inputMask col-md-7" name="addJumlah"
                                            placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Keterangan :</label>
                                        <textarea class="form-control" rows="3" placeholder="Keterangan"
                                            name="addKeterangan"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-lg-offset-3">
                                    <input type="submit" value="Submit" class="btn btn-flat btn-primary">
                                </div>
                            </div>
                            <!-- End Row -->
                        </form>
                    </div>
                </div>
                <!-- <div class="tab-custom-content">
                    <p class="lead mb-0">Custom Content goes here</p>
                </div> -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script src="<?= base_url()?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $(function () {
        $("#searchByDate").daterangepicker();
    });
</script>