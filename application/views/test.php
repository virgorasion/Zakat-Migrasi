<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pengurus Masjid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Daftar Pengurus Masjid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Daftar Anggota
                        </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                    </div>
                    <div class="card-body">
                        <!-- <h4>Custom Content Below</h4> -->
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">
                                <!-- Date range -->
                                <?php if($_SESSION['26insert']==1){ ?>
                                <div class="form-group">
                                    <div class="col-sm-12 row">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAnggota">Tambah Anggota</button>
                                    </div>
                                </div>
                                <?php } ?>
                                <table id="tableAnggota" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th class="min-tablet">No Telp</th>
                                            <?php if($_SESSION['26edit']==1 || $_SESSION['26delete']==1){ ?>
                                            <th class="min-desktop">Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Diisi oleh ajax -->
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
            </div>
            <div class="col-md-5">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-sitemap"></i>
                            Daftar Pengurus
                        </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                    </div>
                    <div class="card-body">
                        <!-- <h4>Custom Content Below</h4> -->
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">
                                <!-- Date range -->
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <?php if($_SESSION['26insert']==1){ ?>
                                        <button class="btn btn-success col-sm-4" id="addTakmir">Tambah Pengurus</button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-default col-sm-3" id="btnPrint"><i class="fa fa-print"></i> Print</button>
                                    </div>
                                <table id="tableAnggota" class="table table-bordered table-striped" style="width:100%">
                                </div>
                                    <thead>
                                        <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <?php if ($_SESSION['26insert'] == 1 || $_SESSION['26edit'] == 1) { ?>
                                        <th>Action</th>
                                        <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Diisi oleh ajax -->
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
            </div>
        </div>
    </section>
    <!-- /.content -->

    <?php if($_SESSION['26edit']==1){ ?>
    <!-- Modal Edit Anggota -->
    <div class="modal fade" id="modalEditAnggota">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          <form action="<?=site_url('Takmir_ctrl/EditAnggota')?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="EditNama">Nama</label>
                <input type="text" class="form-control" name="EditNama" id="EditNama" placeholder="M Nur Fauzan W">
              </div>
              <div class="form-group">
                <label for="EditAlamat">Alamat</label>
                <input type="text" class="form-control" name="EditAlamat" id="EditAlamat" placeholder="Kapas Madya 3i/4">
              </div>
              <div class="form-group">
                <label for="EditHP">No HP</label>
                <input type="text" class="form-control" name="EditHP" id="EditHP" placeholder="083849575737">
              </div>
              <div class="form-group">
                <label for="EditTelp">No Telp</label>
                <input type="text" class="form-control" name="EditTelp" id="EditTelp" placeholder="-">
              </div>
              <div class="form-group">
                <label for="EditJK">Jenis Kelamin</label>
                <select class="form-control" name="EditJK" id="EditJK">
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
              <input type="hidden" name="EditIDAnggota" id="EditIDAnggota" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php } ?>

    <?php if($_SESSION['26insert']==1){ ?>
    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="modalTambahAnggota">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="<?= site_url('Takmir_ctrl/TambahAnggota') ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="AddNama">Nama</label>
                                <input type="text" class="form-control" name="AddNama" id="AddNama"
                                    placeholder="M Nur Fauzan W">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AddAlamat">Alamat</label>
                                <input type="text" class="form-control" name="AddAlamat" id="AddAlamat"
                                    placeholder="Kapas Madya 3i/4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AddHP">No HP</label>
                                <input type="text" class="form-control" name="AddHP" id="AddHP" placeholder="083849575737">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AddTelp">No Telp</label>
                                <input type="text" class="form-control" name="AddTelp" id="AddTelp" placeholder="-">
                            </div>
                            <div class="form-group col-12">
                                <label for="AddJK">Jenis Kelamin</label>
                                <select class="form-control" name="AddJK" id="AddJK">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Tambah Takmir -->
    <div class="modal fade" id="modalTambahTakmir">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Takmir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form id="FormActionTakmir" action="<?= site_url('Takmir_ctrl/TambahTakmir') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="addAnggotaTakmir">Nama</label>
                            <select class="form-control" name="addAnggotaTakmir" id="addAnggotaTakmir">
                                <!-- Diisi Ajax -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="addJabatan">Jabatan</label>
                            <select class="form-control" name="addJabatan" id="addJabatan">
                                <!-- Diisi Ajax -->
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="MainID" id="MainID">
                    <input type="hidden" name="SecondID" id="SecondID"> <!-- ID anggota sebelum berubah -->
                    <input type="hidden" name="ActType" id="ActType">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php } ?>
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
        $('body').addClass('sidebar-collapse');
        $("#addTakmir").click(function(){
            $("#modalTambahTakmir").modal("show");
        })
    });
</script>