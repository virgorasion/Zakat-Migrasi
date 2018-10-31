<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<style>
  .pilih{
	background-color: #f2f5ca;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Takmir
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-8 connectedSortable">

        <!-- quick email widget -->
        <div class="box box-success">
          <div class="box-header">
            <i class="fa fa-users"></i>

            <h3 class="box-title">Daftar Anggota</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Tambah Anggota</a></li>
                  <li><a href="#">Edit Anggota</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Hapus Anggota</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-success btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                  class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <table id="tableAnggota" class="table ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="min-tablet">Alamat</th>
                    <th class="min-tablet">No Hp</th>
                    <th class="min-tablet">No Telp</th>
                    <th class="min-desktop">Jenis Kelamin</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php $no = 1; foreach($users as $user) { ?>
                  <tr>
                    <td>
                      <?= $no ?>
                    </td>
                    <td>
                      <?= $user->nama ?>
                    </td>
                    <td>
                      <?= $user->alamat ?>
                    </td>
                    <td>
                      <?= $user->no_hp ?>
                    </td>
                    <td>
                      <?= $user->no_telp ?>
                    </td>
                    <td>
                      <?= $user->jenis_kelamin ?>
                    </td>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-4 connectedSortable">
        <!-- Start Box Petugas -->
        <div class="box box-info">
          <div class="box-header with-border">
            <i class="fa fa-sitemap"></i>
            <h3 class="box-title">Daftar Pengurus</h3>
            <div class="pull-right box-tools">
              <div class="btn-group">
                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                  class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="tablePetugas" class="table table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jabatan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($petugas as $org) { ?>
                <tr>
                  <td>
                    <?= $org->nama ?>
                  </td>
                  <td>
                    <?= $org->jabatan ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.END Box Petugas -->

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    <!-- Start Modal Anggota -->
    <div class="modal fade" id="modalAnggota">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Pilih Aksi</h4>
          </div>
          <div class="modal-body text-center">
            <button type="button" name="btnDelAnggota" id="btnDelAnggota" class="btn btn-danger btn-lg btn-flat"><i class="fa fa-trash"></i> Hapus Data</button>
            <button type="button" name="btnEditAnggota" id="btnEditAnggota" class="btn btn-info btn-lg btn-flat"><i class="fa fa-edit"></i> Edit Data</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Start Modal Edit Anggota -->
    <div class="modal fade" id="modalEditAnggota">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Anggota</h4>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('Takmir_ctrl/EditAnggota') ?>" method="post">
              <!-- TODO: Buat form takmir -->
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script>
  $(document).ready(function () {
    var selection = $("#tableAnggota").DataTable({

    })
    $("#tablePetugas").DataTable({
      searching: false,
      paging: false
    })
    $('#tableAnggota tr').css('cursor', 'pointer');

    $("#tableAnggota").on('click', 'tr', function () {
      if ($(this).hasClass('pilih')) {
        $(this).removeClass('pilih');
      } else {
        selection.$('tr.pilih').removeClass('pilih');
        $(this).addClass('pilih');
        $('#modalAnggota').modal('show');
      }
    })

    $('#btnEditAnggota').click(function(){
      $('#modalEditAnggota').modal('show');
    })
  })
</script>