<?php 
$this->load->view('template/head');
?>
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
                    <h1>Pengaturan Hak Akses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Pengaturan Hak Akses</li>
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
                    Pengaturan Akses Menu
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <!-- Date range -->
                        <form action="<?=site_url('Hak_akses_ctrl/aksi')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <?php if ($_SESSION['11insert'] == 1): ?>
                                <button type="button" name="btnTambah" id="btnTambah"
                                    class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modalBaru">Tambah Data</button>
                                <?php endif ?>
                            </div>
                        </form>
                        <!-- /.form group -->

                        <table id="tableHak" class="table table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Hak Akses</th>
                            <th>Keterangan</th>
                            <th>Status Aktif</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($utama as $item): 
                            $status = ($item->status_aktif == 1)?"Aktif":"Non Aktif";
                        ?>
                        <tr>
                            <input type="hidden" id="kode_akses" name="kode_akses" value="<?php echo $item->kode_akses ?>">
                            <input type="hidden" id="dtaStatus" name="dtaStatus" value="<?php echo $item->status_aktif ?>">
                            <td>
                            <?php echo $no; ?>
                            </td>
                            <td id="dtaHakAkses">
                            <?php echo $item->hak_akses; ?>
                            </td>
                            <td id="dtaKeterangan">
                            <?php echo $item->keterangan; ?>
                            </td>
                            <td>
                            <?php echo $status; ?>
                            </td>
                            <td>
                            <button class="btn btn-warning btn-xs" id="btnEdit" data-toggle="modal" data-target="#modalBaru">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-xs" id="btnDelete" data-title="delete">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                            <a href="<?php echo site_url('Menu_level/Menu_setting/').$item->kode_akses ?>">
                            <button class="btn btn-warning btn-xs"><i class="fa fa-cog"></i></button>
                            </a>
                            </td>
                        </tr>
                        <?php $no++; endforeach ?>
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

        <!-- Start Modal Edit -->
        <div class="modal fade" id="modalBaru">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Hak Akses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Hak_akses_ctrl/aksi') ?>" id="formBru" method="post">
                <div class="form-group">
                    <label for="hakAkses">Hak Akses :</label>
                    <input type="text" name="hakAkses" id="hakAkses" class="form-control" placeholder="Hak Akses">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan :</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
                </div>
                <div class="form-group">
                    <label for="status">Status Aktif : </label>
                    <select class="form-control" name="status" id="status">
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                    </select>
                </div>
                <input type="hidden" name="kodeAkses" id="kodeAkses" value="">
                <input type="hidden" name="action" id="action" value="add">
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
        <!-- /.End Modal Edit -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $('#datatable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-sucess").slideUp(500);
    });
    $('#datatable').on('click', '[id^=btnEdit]', function () {
      var $item = $(this).closest("tr");
      var $kodeAkses = $item.find("#kode_akses").val().trim();
      var $hakAkses = $item.find("#dtaHakAkses").text().trim();
      var $keterangan = $item.find("#dtaKeterangan").text().trim();
      var $status = $item.find("#dtaStatus").val().trim();
      $('#modalBaru').find('#kodeAkses').val($kodeAkses);
      $('#modalBaru').find('#hakAkses').val($hakAkses);
      $('#modalBaru').find('#keterangan').val($keterangan);
      $('#modalBaru').find('#status').val($status);
      $('#modalBaru').find('#action').val('edit');
    });
    $('#datatable').on('click', '[id^=btnDelete]', function () {
      $item = $(this).closest('tr');
      $hakAkses = $item.find('#dtaHakAkses').text().trim();

      $.confirm({
        theme: 'supervan',
        title: 'Hapus Hak Akses',
        content: 'Hapus data hak akses ' + $hakAkses,
        autoClose: 'Tutup|5000',
        buttons: {
          Tutup: function () {},
          delete: {
            text: 'Hapus',
            action: function () {
              window.location = 'Hak_akses_ctrl/delete/' + $item.find('#kode_akses').val();
            }
          },
        }
      });
    });
  });
</script>
<?php
$this->load->view('template/endbody');
?>