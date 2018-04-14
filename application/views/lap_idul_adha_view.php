<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Idul Adha
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gear"></i> Laporan</a></li>
        <li class="active">Idul Adha</li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo site_url('Amal_idul_adha/aksi')?>" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Laporan Amal Ahad Dhuha</h4>
          </div>
          <div class="modal-body">              
                <div class="box-body">
                
        <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama" name="nama" readonly>
              </div> 
        </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Total" readonly>
                    </div>
                  </div>
                
          <div class="form-group">
                    <label  class="col-sm-3 control-label">Jumlah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="jumlah" name="jumlah" required autofocus="on">
                    </div>
                  </div>
                   
                  <input type="hidden" class="form-control" id="log_time" name="log_time" placeholder="Log Time">
                    
                </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="nomor" id="nomor" value="">
            <input type="hidden" name="action" id="action" value="add">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btnSave">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Default box -->
    <div class="box">        
        <div class="box-header">

        <?php if (isset($_SESSION['msg'])) {?>  
          <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                <h5><span class='glyphicon glyphicon-ok'></span> Info!</h5>
                <?php echo $_SESSION['msg'];?>
          </div>
          <?php } ?>

         <form method="post" action="<?php echo site_url("/Amal_idul_adha/index")?>" id="formsearch">
         <div class="col-xs-1">
          <?php if($this->session->userdata("5view")==1) { ?>
            <button type="button" data-toggle="modal" class="btn btn-primary" id="btnNew" data-target="#myModal">New</button>
            <?php } ?>
            </div>
          <h3 class="box-title">
            <button type="button" class="btn btn-default" id="btnPrint"><i class="fa fa-print"></i> Print</button>
          </h3>
      <div class="col-xs-1">Dari</div>
      <div class="col-xs-2">
        <input type="text" class="form-control" id="t1" name="t1" placeholder="YYYY-MM-DD" value="<?php echo $t1; ?>">
      </div>
      <div class="col-xs-1">Sampai</div>
      <div class="col-xs-2">
        <input type="text" class="form-control" id="t2" name="t2" placeholder="YYYY-MM-DD" value="<?php echo $t2; ?>">
      </div>
      <div class="col-xs-1">
        <button type="submit" class="btn btn-primary" id="btnSearch"><u>S</u>earch</button>
      </div>
        
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Log Time</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $no = 1;
        foreach ($data as $row): 
        $pcs = explode('-',$row->tanggal);
        $tanggal = $pcs[2].'-'.$pcs[1].'-'.$pcs[0]; ?>
                    <tr>                              
                        <td class="no"><?php echo $no; ?>
                        <input type="hidden" name="no" id="no" value="<?php echo $row->nomor ?>"> </td>
                        <td class="nama"><?php echo $row->admin; ?></td>
                        <td class="tanggal"><?php echo $tanggal;?></td>
                        <td class="jumlah"><?php echo number_format((double)$row->jumlah,0,"," , ".");?></td>
                        <td class="logtime"><?php echo $row->log_time;?></td>
                        <td align="center">
            
<?php if ($this->session->userdata("17view")=="1"){?>
                            <a href="#">
                                <span data-placement='top' data-toggle='tooltip' title='Struk'>
                                <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                                <span class='glyphicon glyphicon-print'></span>
                                </button>
                            </a>

              <?php } ?>
<?php if ($this->session->userdata("17edit")=="1"){?>
                            <a href='#'>
                                <span data-placement='top' data-toggle='tooltip' title='Edit'>
                                <button class='btn btn-warning btn-xs btnEdit' data-title='Edit' data-toggle='modal' data-target='#myModal' id="btnEdit">
                                <span class='glyphicon glyphicon-pencil'></span>
                                </button>
                            </a>
              <?php } ?>
<?php if ($this->session->userdata("17delete")=="1"){?>
                            <a class ="buttonDelete" href='#'>
                                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' id="btnDelete">
                                <span class='glyphicon glyphicon-remove'></span>
                                </button>
                            </a>
<?php } ?>

                           
                        </td>
                    </tr>
                <?php $no++;
        endforeach
        ?>
            </tbody>
          </table>
        </div>
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
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
   
   $('#t1').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
    $('#t2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
   
   $('#btnPrint').click(function() {
      var tanggal1 = '<?php echo str_replace('-','.',$t1); ?>';
      var tanggal2 = '<?php echo str_replace('-','.',$t2); ?>';
      var url = '<?php echo site_url("/Amal_idul_adha/laporan_print/");?>'+tanggal1+'/'+tanggal2;
    console.log(url);
      newwindow=window.open(url,'Print','height=500,width=1100');
      if (window.focus) {newwindow.focus()}
      return false;
    });

    $("#jumlah").inputmask('decimal', {
        digitsOptional: true,
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true
     });

    $('#btnNew').click(function(){
      $('#tanggal').val('<?php echo date('d-m-Y'); ?>');
      $('#nama').val('<?php echo $_SESSION['nama']; ?>');
    });
    
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
    });

    $('#datatable').on('click','[id^=btnEdit]', function(){
      var $item = $(this).closest('tr');
      $('#nomor').val($.trim($item.find('#no').val()));
      $('#nama').val($.trim($item.find('.nama').text()));
      $('#tanggal').val($.trim($item.find('.tanggal').text()));
      $('#jumlah').val($.trim($item.find('.jumlah').text()));
      $('#action').val('update');
    });

    $('#datatable').on('click', '[id^=btnDelete]', function() {
      var $item = $(this).closest("tr");
      var $kode = $item.find("#no").val();
      var $tanggal = $item.find('.tanggal').text();
      // $item.find("input[id$='no']").val();
        // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Transaksi?',
        content: 'Anda yakin ingin menghapus laporan nomor '+$tanggal,
        autoClose: 'Cancel|10000',
        buttons: {
            deleteUser: {
                text: 'Delete',
                action: function () {
                  window.location = "Amal_idul_adha/delete/"+$kode;
                }
            },
            Cancel: function () {
            }
        }
      });
    });

  });
</script>   
<?php
$this->load->view('template/endbody');
?>