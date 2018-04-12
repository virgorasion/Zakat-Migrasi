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
        <form action="<?php echo site_url("/Menu_level_ctrl/update");?>" method="post">
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
              <th>Menu Name</th>
              <th>View</th>
              <th>Insert</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <?php 
					$no = 1;
					foreach ($data as $row):
				?>
                    <tr>
                        <td><?php echo $row->menu_name;?></td>
					            	<td>
                          <input type="checkbox" value="1" name="view_<?php echo $row->kode_menu_child;?>" <?php echo ($row->akses_view=="1")?"checked":"";?>>
                        </td>
                        <td><input type="checkbox" value="1" name="insert_<?php echo $row->kode_menu_child;?>" <?php echo ($row->akses_insert=="1")?"checked":"";?>>                          
                        </td>
                        <td><input type="checkbox" value="1" name="edit_<?php echo $row->kode_menu_child;?>" <?php echo ($row->akses_edit=="1")?"checked":"";?>>                          
                        </td>
                        <td><input type="checkbox" value="1" name="delete_<?php echo $row->kode_menu_child;?>" <?php echo ($row->akses_delete=="1")?"checked":"";?>>                          
                        </td>
                    </tr>
                <?php 
				$no+=1;
				endforeach
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
<script>
  $(function () { 
    $('#datatable').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-sucess").slideUp(500);
    });
    $("#btnBack").click(function (){ 
       window.location.href = '<?php echo site_url("/Menu_level_controller");?>';
    });
	  
  });
</script>   
<?php
$this->load->view('template/endbody');
?>