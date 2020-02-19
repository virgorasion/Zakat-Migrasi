<?php 
$this->load->view('template/head');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <br>
                        <!-- Date range -->
                        <form action="<?=site_url('Lap_pengeluaran/index')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" name="searchByDate" id="searchByDate">
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    style="margin-right:5px">Tampilkan</button>
                                <button class="btn btn-default" id="btnPrint">Print</button>
                            </div>
                        </form>
                        <!-- /.form group -->

                        <table id="datatable" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th class="min-tablet">Tanggal</th>
                                    <th class="min-tablet">Jumlah</th>
                                    <th class="min-tablet">Keterangan</th>
                                    <?php
                                    if ($_SESSION['7edit'] == 1) {
                                    ?>
                                    <th class="min-tablet">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="tab-custom-content">
                    <p class="lead mb-0">Custom Content goes here</p>
                </div> -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

        <?php if ($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1 || $_SESSION['6insert'] == 1): ?>
        <!-- Modal -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo site_url('Lap_pengeluaran/Action') ?>" method="post">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Buat Data Pengeluaran</h4>
                    </div>
                    <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" class="form-control" id="addNama" name="addNama" placeholder="M Nur Fauzan W"
                            require value="<?=$_SESSION['nama']?>" readonly>
                        </div>
                        <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control datePicker" id="addTanggal" name="addTanggal"
                            placeholder="31-Agustus-2000" required autocomplete="off">
                        </div>
                        <div class="form-group">
                        <label class="control-label">Jumlah</label>
                        <input type="text" class="form-control inputMask" id="addJumlah" name="addJumlah" required>
                        </div>
                        <div class="form-group">
                        <label for="addKeterangan">Keterangan</label>
                        <textarea class="form-control" name="addKeterangan" id="addKeterangan" rows="3"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" class="form-control" id="idPengeluaran" name="idPengeluaran">
                    <input type="hidden" name="action" id="action" value="add">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnSave">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <?php endif; ?>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!-- DateRangePicker -->
<script src="<?= base_url()?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>