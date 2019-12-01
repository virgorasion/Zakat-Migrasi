<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Menu Akses
      <small>List Menu Akses</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-gear"></i> Pengaturan</a></li>
      <li class="active">Menu Akses</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="<?php echo site_url("/Menu_level_controller/update");?>" method="post">
        <div class="box-header">
          <h3 class="box-title">
            <button type="button" id="btnBack" class="btn">Back</button>
            <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
            <input type="hidden" name="kode_akses" value="<?php echo $kode_akses;?>">
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
                <th class="">Menu Name</th>
                <th class="text-center">View</th>
                <th class="min-tablet text-center">Insert</th>
                <th class="min-tablet text-center">Update</th>
                <th class="min-tablet text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach ($data as $row):
              ?>
              <tr>
                <td>
                  <?php echo $row->menu_name;?>
                </td>
                <td class="text-center">
                <?php if ($row->kode_menu_child != 25 && $row->kode_menu_child != 26) {?>
                  <input type="checkbox" class="flat-green" value="1" name="view_<?php echo $row->kode_menu_child;?>"
                    <?php echo ($row->akses_view=="1")?"checked":"";?>>
                <?php } ?>
                </td>
                <td class="text-center"><input type="checkbox" class="flat-green" value="1" name="insert_<?php echo $row->kode_menu_child;?>"
                    <?php echo ($row->akses_insert=="1")?"checked":"";?>>
                </td>
                <td class="text-center"><input type="checkbox" class="flat-orange" value="1" name="edit_<?php echo $row->kode_menu_child;?>"
                    <?php echo ($row->akses_edit=="1")?"checked":"";?>>
                </td>
                <td class="text-center"><input type="checkbox" class="flat-red" value="1" name="delete_<?php echo $row->kode_menu_child;?>"
                    <?php echo ($row->akses_delete=="1")?"checked":"";?>>
                </td>
              </tr>
              <?php 
              $no++;
                endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </form>
    </div><!-- /.box -->

  </section><!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script src="<?= base_url('assets/AdminLTE-2.3.7/plugins/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('#datatable').DataTable({
      "paging": false,
      // "columnDefs": [{
      //   width: 600,
      //   targets: 0
      // }],
      "responsive": true,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "autoWidth": false
    });
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-sucess").slideUp(500);
    });
    $("#btnBack").click(function () {
      window.location.href = '<?php echo site_url("/Menu_level");?>';
    });
    
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-orange').iCheck({
      checkboxClass: 'icheckbox_flat-orange'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red'
    })

  });
</script>
<?php
$this->load->view('template/endbody');
?>