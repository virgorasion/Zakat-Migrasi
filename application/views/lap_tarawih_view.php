<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Kotak Amal Tarawih
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Laporan</a>
      </li>
      <li class="active">Kotak Amal Tarawih</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form id="formEdit" class="form-horizontal" action="<?php echo site_url('tarawih_php/editData')?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Edit Amal Tarawih</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-3 control-label">petugas</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="editPetugas" name="editPetugas" placeholder="Nama Petugas" autofocus required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="editJumlah" name="editJumlah" placeholder="Jumlah" required>
                  </div>
                </div>
                <input type="hidden" name="idEdit" id="idEdit" value="">
              </div>
            </div>
            <div class="modal-footer">
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
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['msg'];?>
        </div>
        <?php } ?>

        <form method="post" action="<?php echo site_url(" /zakat_ctrl/index ")?>" id="formsearch">
          <div class="col-sm-12">
          <div class="form-inline col-sm-1">
          <?php if($_SESSION['10insert'] == 1){ ?>
            <button type="button" class="btn btn-primary" id="btnNew" data-toggle="modal" data-target="#myModal">New</button>
          <?php } ?>
          </div>
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

      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Petugas</th>
              <th class="min-tables">Tanggal</th>
              <th class="min-tablet">Jumlah</th>
              <th class="min-desktop">Log Time</th>
              <?php if($_SESSION['10edit'] == 1 || $_SESSION['10delete'] == 1){ ?>
              <th class="min-desktop">Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
        foreach ($data as $row): 
        $pcs = explode('-',$row->tanggal);
        $tanggal = $pcs[2].'-'.$pcs[1].'-'.$pcs[0];
        ?>
        
            <tr>
              <td class="no">
                <?php echo $no; ?>
              </td>
              <td class="nama">
                <?php echo $row->petugas; ?>
              </td>
              <td class="tanggal">
                <?php echo $tanggal;?>
              </td>
              <td class="jumlah">
                <?php echo number_format((double)$row->jumlah,0,"," , ".");?>
              </td>
              <td class="logtime">
                <?php echo $row->log_time;?>
              </td>
              <td align="center">
                <input type="hidden" name="nomor" id="id" value="<?php echo $row->nomor ?>">
                <input type="hidden" name="tanggal" id="tanggal" value="<?php echo $tanggal ?>">
                <!-- <span data-placement='top' data-toggle='tooltip' title='Struk'>
                  <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                    <span class='glyphicon glyphicon-print'></span>
                  </button>
                </span> -->
                <?php if($_SESSION['10edit'] == 1) { ?>
                <span data-placement='top' data-toggle='tooltip' title='Edit'>
                  <button class='btn btn-warning btn-xs btnEdit' data-title='Edit' data-toggle='modal' data-target='#modalEdit' id="btnEdit">
                    <span class='glyphicon glyphicon-pencil'></span>
                  </button>
                </span>
                <?php } ?>
                <?php if($_SESSION['10delete'] == 1){ ?>
                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                  <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' data-toggle='modal' data-target='#deleteModal' id="btnDelete">
                    <span class='glyphicon glyphicon-remove'></span>
                  </button>
                </span> 
                <?php } ?>
              </td>
            </tr>
            <?php 
            $no++;
        endforeach
        ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box -->

    <!-- Modal Add -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo site_url('tarawih_php/tambah') ?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Laporan Amal Tarawih</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-3 control-label">petugas</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="addPetugas" name="addPetugas" placeholder="Nama Petugas" autofocus required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="addJumlah" name="addJumlah" placeholder="Jumlah" required>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btnSave">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
  // function Tambah(){
  //   var url = "<?php echo site_url('tarawih.php/dataTambah') ?>"
  //   $.ajax({
  //     url: url,
  //     type: 'POST',
  //     success:function(result){
  //       var data = JSON.parse(result);
  //       $('#addNomor').val(data.nomor);
  //       $('#addTanggal').val(data);
  //     }
  //   })
  // }

  $(function () {
    $('#datatable').DataTable({
      "paging": true,
      "responsive":true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#t1,#t2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
    });

    $('#addJumlah,#editJumlah').inputmask('decimal', {
      digits: 2,
      placeholder: "0",
      digitsOptional: true,
      radixPoint: ",",
      groupSeparator: ".",
      autoGroup: true
    });

    $('#btnPrint').click(function () {
      var tanggal1 = '<?php echo str_replace(' - ','.
      ',$t1); ?>';
      var tanggal2 = '<?php echo str_replace(' - ','.
      ',$t2); ?>';
      var url = '<?php echo site_url("/tarawih_php/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
      console.log(url);
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

    $('#datatable').on('click','[id^=btnEdit]',function(){
      var $test = $(this).closest('tr');
      var $nama = $test.find('.nama').text().trim();
      var $jumlah = $test.find('.jumlah').text().trim();
      var $id = $test.find('#id').val().trim();
      $('#formEdit').find('#editPetugas').val($nama);
      $('#formEdit').find('#editJumlah').val($jumlah);
      $('#formEdit').find('#idEdit').val($id);
    });

    $('#datatable').on('click', '[id^=btnDelete]', function() {
      var $item = $(this).closest("tr");
      var $tanggal = $item.find("#tanggal").val();
      // console.log($tanggal);
      // $item.find("input[id$='no']").val();
        // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Ini ?',
        content: 'Hapus data amal tanggal '+$tanggal,
        autoClose: 'Cancel|5000',
        buttons: {
            deleteUser: {
                text: 'Delete',
                action: function () {
                  window.location = "tarawih_php/hapus/"+$item.find("#id").val();
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