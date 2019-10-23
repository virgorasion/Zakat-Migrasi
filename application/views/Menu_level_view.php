<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Hak Akses
      <small>List Hak Akses</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-gear"></i> Pengaturan</a></li>
      <li class="active">Hak Akses</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">
        Pengaturan Menu Akses
        </h3>
        <?php if (isset($_SESSION['msg'])) {?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-ban"></i> Info!</h5>
          <?php echo $_SESSION['msg'];?>
        </div>
        <?php } ?>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Hak Akses</th>
              <th class="min-tablet">Keterangan</th>
              <th class="min-tablet">Status Aktif</th>
              <th class="min-tablet">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($data as $item): 
              if ($item->status_aktif == 1) {
                $status = "Aktif";
              }else{
                $status = "Non Aktif";
              }
            ?>
            <tr>
              <td>
                <?= $no; ?>
              </td>
              <td>
                <?= $item->hak_akses; ?>
              </td>
              <td>
                <?= $item->keterangan; ?>
              </td>
              <td>
                <?= $status; ?>
              </td>
              <td>
                <a href="<?php echo site_url('Menu_level/Menu_setting/').$item->kode_akses ?>">
                <button class="btn btn-warning btn-xs"><i class="fa fa-gear"></i></button>
                </a>
              </td>
            </tr>
            <?php $no++; endforeach ?>
          </tbody>
        </table>
      </div>
    </div><!-- /.box -->

  </section><!-- /.content -->

  <form id="formEdit" action="<?php echo site_url('Menu_level/Menu_setting') ?>" method="get">
    <input type="hidden" name="kode_akses" id="kode_akses" value="">
  </form>

</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
  $(function () {
    $('#datatable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "responsive": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-sucess").slideUp(500);
    });
    $(".btnSave").click(function () {
      $('#form-horizontal').submit(function () {
        return false;
      });
    });
    $('#datatable').on('click', '[id^=btnEdit]', function () {
      var $item = $(this).closest("tr");
      $("#kode_akses").val($item.find(".kode_akses").text());
      $("#formEdit").submit();
    });
    $('#datatable').on('click', '[id^=btnDelete]', function () {
      var $item = $(this).closest("tr");
      $("#hak_akses_delete").text('Are You Sure to Delete Hak Akses "' + $item.find(".hak_akses").text() +
        '" ?');
      $("#kode_akses_delete").val($item.find("input[id$='kode_akses']:hidden:first").val());
    });
  });
</script>
<?php
$this->load->view('template/endbody');
?>