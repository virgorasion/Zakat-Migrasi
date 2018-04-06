<?php
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Zakat & Infaq
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Laporan</a>
      </li>
      <li class="active">Zakat & Infaq</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Input</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove">
            <i class="fa fa-times"></i>
          </button>
        </div>
      </div>

      <div class="box-body" id="bodyInput">
        <div class="row">
          <form id="form" action="<?php echo site_url('zakat_ctrl/tambahData');?>" method="POST">
            <div class="form-group">
              <div class="col-sm-2">
                <input placeholder="Nama" type="text" name="nama" id="nama" class="form-control">
              </div>
              <div class="col-sm-2">
                <input placeholder="Alamat" type="text" name="alamat" id="alamat" class="form-control">
              </div>
              <div class="col-sm-2">
                <input placeholder="Zakat Fitrah" type="text" name="zakatFitrah" id="zakatFitrah" class="form-control">
              </div>
              <div class="col-sm-2">
                <select class="form-control" name="pembelian" id="pembelian">
                  <option value="0">Beli</option>
                  <option value="1">Tidak</option>
                </select>
              </div>
              <div class="col-sm-2">
                <input placeholder="Zakat Mall" type="text" name="zakatMal" id="zakatMal" class="form-control">
              </div>
              <div class="col-sm-2">
                <input placeholder="Infaq" type="text" name="infaq" id="infaq" class="form-control">
              </div>
            </div>
          </form>
        </div>
        <small class="text-muted">Np: Tekan 'ENTER' pada bagian infaq untuk submit</small>
      </div>
    </div>

    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header">
        <?php if (isset($_SESSION['msg'])) {?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['msg'];?>
        </div>
        <?php } ?>
        <form method="post" action="<?php echo site_url(" /zakat_ctrl/index ")?>" id="formsearch">

          <div class="col-sm-12">
            <div class="form-inline col-sm-4">
              Dari :
              <input type="text" class="form-control" id="t1" name="t1" placeholder="YYYY-MM-DD" value="<?php echo $t1; ?>">
            </div>
            <div class="form-inline col-sm-4">
              Sampai :
              <input type="text" class="form-control" id="t2" name="t2" placeholder="YYYY-MM-DD" value="<?php echo $t2; ?>">
            </div>
            <div class="col-sm-1">
              <button type="submit" class="btn btn-primary" id="btnSearch">
                <u>S</u>earch</button>
            </div>
            <h3 class="box-title col-sm-1">
              <button type="button" class="btn btn-default" id="btnPrint">
                <i class="fa fa-print"></i> Print</button>
            </h3>
          </div>

        </form>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th class="min-tablet">Zakat Fitrah</th>
                <th class="min-tablet">Pembelian</th>
                <th class="min-desktop">Zakat Mall</th>
                <th class="min-desktop">Infaq</th>
                <th class="min-desktop">Tanggal</th>
                <th class="min-desktop">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 0;
                foreach ($data as $row): 
                  if ($row->beli == 0) {
                    $beli = 'Beli';
                  }else {
                    $beli = 'Tidak Beli';
                  }
                  $tgl = explode('-', $row->tanggal);
                  $tanggal = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
                  $no++;
                ?>

                <tr>
                  <td class="no">
                    <?php echo $no; ?>
                  </td>
                  <td class="nama_cabang">
                    <?php echo $row->nama; ?>
                  </td>
                  <td class="no_faktur_jual">
                    <?php echo $row->alamat;?>
                  </td>
                  <td class="tanggal_transaksi">
                    <?php echo $row->zakat_fitrah;?>
                  </td>
                  <td class="nama_kasir">
                    <?php echo $beli;?>
                  </td>
                  <td class="jenis_penjualan">
                    <?php echo number_format((double)$row->zakat_mall,0,"," , ".");?>
                  </td>
                  <td class="jenis_pembayaran">
                    <?php echo number_format((double)$row->infaq,0,",",".");?>
                  </td>
                  <td>
                    <?php echo $tanggal;?>
                  </td>
                  <td align="center">

                    <?php if ($this->session->userdata("17view")=="1"){?>
                    <a href="#">
                      <span data-placement='top' data-toggle='tooltip' title='Struk'></span>
                      <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                        <span class='glyphicon glyphicon-print'></span>
                      </button>
                    </a>
                    <?php } ?>
                    <?php if ($this->session->userdata("17edit")=="1"){?>
                    <a href='#'>
                      <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                      <button class='btn btn-warning btn-xs btnEdit' data-title='Edit' data-toggle='modal' data-target='#myModal' id="btnEdit">
                        <span class='glyphicon glyphicon-pencil'></span>
                      </button>
                    </a>
                    <?php } ?>
                    <!-- <?php if ($this->session->userdata("17delete")=="1"){?>
                    <a class ="buttonDelete" href='#'>
                      <span data-placement='top' data-toggle='tooltip' title='Delete'>
                        <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' data-toggle='modal' data-target='#deleteModal' id="btnDelete">
                        <span class='glyphicon glyphicon-remove'></span>
                        </button>
                      </a>
                      <?php } ?> -->

                  </td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <td>Total :</td>
              </tr>
            </tfoot>
          </table>
      </div>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/controlside');
$this->load->view('template/foot');
$this->load->view('template/js');
?>
 <!--DataTables [ OPTIONAL ]-->
  <script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/media/js/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/AdminLTE-2.3.7/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>

  <script>
    $(function () {
      $('#datatable').DataTable({
        "responsive" : true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      $('#infaq').keypress(function(e){
        if (e.which == 13) {
          if ($('#nama').val() == '') {
            alert('Nama Harus Diisi');
          }else if($('#alamat').val() == ''){
            alert('Alamat Tidak Boleh Kosong');
          }else if($('#zakatFitrah').val() == ''){
            alert('Zakat Fitrah Tidak Boleh Kosong');
          }else{
            $('#form').submit();
          }
        }
      })

      $('#t1, #t2').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
      });
      
      $('#zakatMal, #infaq').inputmask('decimal',{
        digits: 2,
        placeholder: "0",
        digitsOptional: false,
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true
      });

      $('#btnPrint').click(function () {
        var tanggal1 = '<?php echo str_replace(' - ','.
        ',$t1); ?>';
        var tanggal2 = '<?php echo str_replace(' - ','.
        ',$t2); ?>';
        var url = '<?php echo site_url("/zakat_ctrl/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
        console.log(url);
        newwindow = window.open(url, 'Print', 'height=500,width=1100');
        if (window.focus) {
          newwindow.focus()
        }
        return false;
      });
    });
  </script>
  <?php
  $this->load->view('template/endbody');
  ?>