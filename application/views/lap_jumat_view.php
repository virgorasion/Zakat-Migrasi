<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Kotak Amal Jumat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gear"></i> Laporan</a></li>
        <li class="active">Kotak Amal Jumat</li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    
    <!-- Default box -->
    <div class="box">        
        <div class="box-header">
         <form method="post" action="<?php echo site_url("/zakat_ctrl/index")?>" id="formsearch">
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
              
            </tr>
            </thead>
            <tbody>
                <?php 
        foreach ($data as $row): ?>
                    <tr>                              
                        <td class="no"><?php echo $row->nomor; ?></td>
                        <td class="nama"><?php echo $row->admin; ?></td>
                        <td class="tanggal"><?php echo $row->tanggal;?></td>
                        <td class="jumlah"><?php echo number_format((double)$row->jumlah,0,"," , ".");?></td>
                        <td class="logtime"><?php echo $row->log_time;?></td>
                    </tr>
                <?php 
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
      var url = '<?php echo site_url("/jumat_php/laporan_print/");?>'+tanggal1+'/'+tanggal2;
    console.log(url);
      newwindow=window.open(url,'Print','height=500,width=1100');
      if (window.focus) {newwindow.focus()}
      return false;
    });

  });
</script>   
<?php
$this->load->view('template/endbody');
?>