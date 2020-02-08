<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Pengeluaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-gear"></i> Laporan</a></li>
      <li class="active">Pengeluaran</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <?php if (isset($_SESSION['succ'])) { ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
      <h5>
        <span class='glyphicon glyphicon-ok'></span> Info!</h5>
      <?php echo $_SESSION['succ']; ?>
    </div>
    <?php 
      } ?>
    <?php if (isset($_SESSION['fail'])) { ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
      <h5>
        <span class='fa fa-remove'></span> Info!</h5>
      <?php echo $_SESSION['fail']; ?>
    </div>
    <?php 
      } ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <form method="post" action="<?php echo site_url("Lap_pengeluaran/index") ?>" id="formsearch">            
          <div class="col-sm-12">
          <?php if ($_SESSION['7insert'] == 1) { ?>
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2">Tambah</button>
          <?php } ?>
              <div class="form-inline col-md-4">
              <div class="input-group input-daterange">
                  <input type="text" class="form-control" name="t1" id="t1" value="<?= @$t1 ?>" autocomplete="off">
                  <div class="input-group-addon">to</div>
                  <input type="text" class="form-control" name="t2" id="t2" value="<?= @$t2 ?>" autocomplete="off">
              </div>
              </div>
              <div class="col-sm-1">
              <button type="submit" class="btn btn-primary" id="btnSearch">
                  Tampilkan</button>
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
        <table id="tablePengeluaran" class="table table-bordered table-hover" width="100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th class="min-tablet">Tanggal</th>
              <th class="min-tablet">Jumlah</th>
              <th class="min-tablet">Keterangan</th>
              <?php
              if ($_SESSION['7edit'] == 1) {
              ?>
              <th class="min-tablet">Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <!-- Content With Ajax DataTables -->
          </tbody>
        </table>
      </div>
    </div><!-- /.box -->

    <?php if ($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1 || $_SESSION['6insert'] == 1) { ?>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo site_url('Lap_pengeluaran/Action') ?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Buat Data Pengeluaran</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <input type="text" class="form-control" id="addNama" name="addNama" placeholder="M Nur Fauzan W"
                    require value="<?=$_SESSION['nama']?>" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal</label>
                  <input type="text" class="form-control datePicker" id="addTanggal" name="addTanggal"
                    placeholder="31-Agustus-2000" required autocomplete="off">
                </div>
                <div class="form-group">
                  <label class="control-label">Jumlah</label>
                  <input type="text" class="form-control inputMask" id="addJumlah" name="addJumlah" required>
                </div>
                <div class="form-group">
                  <label for="addKeterangan">Keterangan</label>
                  <textarea class="form-control" name="addKeterangan" id="addKeterangan" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" class="form-control" id="idPengeluaran" name="idPengeluaran">
              <input type="hidden" name="action" id="action" value="add">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btnSave">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php 
  } ?>

  </section><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
  $(function () {
    var table_pengeluaran = "";
    // Setup datatables
    // $.fn.dataTable.ext.errMode = 'none';
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    let url = "<?= site_url($data) ?>";
    table_pengeluaran = $("#tablePengeluaran").DataTable({
      initComplete: function () {
        var api = this.api();
        $('#mytable_filter input')
          .off('.DT')
          .on('input.DT', function () {
            api.search(this.value).draw();
          });
      },
      oLanguage: {
        sProcessing: 'Loading....'
      },
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
        "url": url,
        "type": "POST"
      },
      columns: [{
          "data": null,
          "orderable": false,
          "searchable": false
        },
        {
          "data": "admin"
        },
        {
          "data": "tanggal"
        },
        {
          "data": "jumlah", "render": $.fn.DataTable.render.number(".", ",", "")
        },
        {
          "data": "keterangan"
        }
        <?php
        if ($_SESSION['7edit'] == 1) {
        ?>
        ,{
          "data": "aksi"
        }
      <?php } ?>
      ],
      order: [
        [1, 'asc']
      ],
      rowCallback: function (row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });
    // End Datatables

    $(".alert").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert").slideUp(500);
    });

    // DateRange (Date Main)
    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });
    //DatePicker Modal
    $(".datePicker").datepicker({
      format: "dd-MM-yyyy",
      autoclose: true,
      todayBtn: "linked",
      todayHighlight: true
    });

    //Inputmask global
    $('.inputMask').inputmask('decimal', {
      digits: 2,
      placeholder: "0",
      digitsOptional: true,
      radixPoint: ",",
      groupSeparator: ".",
      autoGroup: true,
      rightAlign: false
    });

    <?php
    if ($_SESSION['7insert'] == 1) {
    ?>
      // Fungsi Tambah
      $("#btnTambah").click(function () {
        $("#modalTambah").modal('show');
        $("#action").val("add");
        $("#addNama").val();
        $("#addTanggal").val();
        $("#addJumlah").val();
        $("#addKeterangan").val();
      }); 
      <?php } ?>

    <?php
    if ($_SESSION['7edit'] == 1) {
    ?>
      $("#tablePengeluaran").on("click", ".btnEdit", function () {
          let nama = $(this).data("admin");
          let tanggal = $(this).data("tanggal");
          let jumlah = $(this).data("jumlah");
          let keterangan = $(this).data("keterangan");
          let id_pengeluaran = $(this).data("id_pengeluaran");
          $("#addNama").val(nama);
          $("#addTanggal").val(tanggal);
          $("#addJumlah").val(jumlah);
          $("#addKeterangan").val(keterangan);
          $("#idPengeluaran").val(id_pengeluaran);
          $("#action").val("edit");
          $("#modalTambah").modal("show");
        }) 
    <?php } ?>

    $('#btnPrint').click(function () {
      var tanggal1 = $("#t1").val();
      var tanggal2 = $("#t2").val();
      var url = '<?php echo site_url("/Lap_pengeluaran/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

    <?php
    if ($_SESSION['7delete'] == 1) {
    ?>
      $('#tablePengeluaran').on('click', '.btnDelete', function () {
        var tanggal = $(this).data("tanggal");
        var id = $(this).data("id_pengeluaran");
        $.confirm({
          theme: 'supervan',
          title: 'Peringatan !',
          content: 'Hapus Pengeluaran Tanggal ' + tanggal,
          autoClose: 'Cancel|5000',
          buttons: {
            Cancel: function(){},
            delete: {
              text: 'Delete',
              action: function () {
                window.location = "Lap_pengeluaran/HapusData/" + id
              }
            }
          }
        });
      }); 
      <?php } ?>
  });
</script>
<?php
$this->load->view('template/endbody');
?>