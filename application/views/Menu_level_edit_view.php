<?php 
$this->load->view('template/head');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/all.css">
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
                    <h1>Akses Menu</h1>
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
                        <br>
                        <!-- Date range -->
                        <form action="<?=site_url('Menu_level_controller/update')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <button type="button" id="btnBack" class="btn btn-default col-md-2">Back</button>
                                <button type="submit" id="btnSave" class="btn btn-primary col-md-2">Save</button>
                                <input type="hidden" name="kode_akses" value="<?php echo $kode_akses;?>">
                            </div>

                        <table id="datatable" class="table table-bordered table-hover" width="100%">
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
                </div>
                </form>
                <!-- /.form group -->
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
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>assets/plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {
    $('#datatable').DataTable({
      "paging": false,
      // "columnDefs": [{
      //   width: 600,
      //   targets: 0
      // }],
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "autoWidth": false
    });

    <?php if(@$_SESSION['msg']):?>
    toastr.success("<?=@$_SESSION['msg']?>");
    <?php endif ?>
    <?php if(@$_SESSION['fail']):?>
    toastr.error("<?=@$_SESSION['fail']?>");
    <?php endif ?>

    $("#btnBack").click(function () {
      window.location.href = '<?php echo site_url("/Hak_akses_ctrl");?>';
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