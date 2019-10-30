<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Set Hak Akses
      <small>List Hak Akses</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Pengaturan</a>
      </li>
      <li class="active">Hak Akses</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <?php if (isset($_SESSION['msg'])) {?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i>Info! </h4>
      <?php echo $_SESSION['msg'];?>
    </div>
    <?php } ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">
          <button type="button" class="btn btn-medium btn-block btn-primary" data-toggle="modal" data-target="#modalBaru">New</button>
        </h3>

        <h3 class="box-title">
        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
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
                  <i class="fa fa-gear"></i>
                </button>
                <button class="btn btn-danger btn-xs" id="btnDelete" data-title="delete">
                  <i class="fa fa-remove"></i>
                </button>
              </td>
            </tr>
            <?php $no++; endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box -->

    <!-- Start Modal Edit -->
    <div class="modal fade" id="modalBaru">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Buat Hak Akses</h4>
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
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
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