<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Hewan Kurban
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Laporan</a>
      </li>
      <li class="active">Hewan Kurban</li>
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

        <?php if (isset($_SESSION['msg'])) {?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['msg'];?>
        </div>
        <?php } ?>
        <form method="post" action="<?php echo site_url("Hewan_kurban/index") ?>" id="formsearch">
          <div class="col-sm-12">
          <?php if ($_SESSION['6insert'] == 1) { ?>
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2">Tambah</button>
          <?php } ?>
            <div class="form-inline col-md-4">
              <div class="input-group input-daterange">
                <input type="text" class="form-control" name="t1" id="t1" value="<?= $t1 ?>" autocomplete="off">
                <div class="input-group-addon">to</div>
                <input type="text" class="form-control" name="t2" id="t2" value="<?= $t2 ?>" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-1">
              <button type="submit" class="btn btn-primary" id="btnSearch">
                Search</button>
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
        <table id="tableKurban" class="table table-bordered table-hover" width="100%">
          <thead>
            <tr>
              <th>No.</th>
              <th class="min-tablet">Tanggal</th>
              <th class="min-tablet">Admin</th>
              <th>Penyumbang</th>
              <th class="min-tablet">Alamat</th>
              <th>Jenis Hewan</th>
              <th class="min-tablet">jumlah</th>
              <?php if($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1) { ?>
              <th class="min-desktop">Action</th>
              <?php } ?>  
            </tr>
          </thead>
          <tbody>
              <!-- Content Diisi Ajax Datatables -->
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box -->

    <?php if($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1 || $_SESSION['6insert'] == 1){ ?>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo site_url('Hewan_kurban/aksi') ?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label">Penyumbang</label>
                  <input type="text" class="form-control" id="penyumbang" name="penyumbang" placeholder="M Nur Fauzan W"
                    require>
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Kapas Madya" required
                    autofocus="on">
                </div>
                <div class="form-group">
                  <label for="jenisHewan">Jenis Hewan</label>
                  <select class="form-control" name="jenisHewan" id="jenisHewan">
                    <option selected>-=Pilih=-</option>
                    <option value="1">Kambing</option>
                    <option value="2">Sapi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="2" require>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" class="form-control" id="idKurban" name="idKurban">
              <input type="hidden" name="action" id="action" value="add">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btnSave">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
  $(function () {
    var table_kurban = "";
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
    table_kurban = $("#tableKurban").DataTable({
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
          "data": "tanggal_transaksi"
        },
        {
          "data": "admin"
        },
        {
          "data": "penyumbang"
        },
        {
          "data": "alamat"
        },
        {
          "data": "jenis_hewan", "orderable": false, "searchable": false
        },
        {
          "data": "jumlah"
        },
        {
          "data": "aksi", "orderable": false
        }
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
    
    $(".alert").fadeTo(3500, 500).slideUp(500, function () {
        $(".alert").slideUp(500);
    });

    $(".btnSave").click(function () {
      $('#form-horizontal').submit(function () {
        return false;
      });
    });

    // DateRange (Date Main)
    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });

    // Fungsi Tambah
    $("#btnTambah").click(function () {
      $("#modalTambah").modal('show');
      $("#action").val("add");
      $("#nomor").val();
      $("#penyumbang").val();
      $("#alamat").val();
      $("#jenisHewan").val();
      $("#jumlah").val();
      $("#myModalLabel").html("Tambah Hewan Kurban");
    });

    $('#tableKurban').on('click', '.btnEdit', function () {
      let id = $(this).data("id");
      let penyumbang = $(this).data("penyumbang");
      let alamat = $(this).data("alamat");
      let hewan = $(this).data("hewan");
      let jumlah = $(this).data("jumlah");
      $("#id_admin").val("<?php echo $_SESSION['id_admin']; ?>");
      $("#idKurban").val(id);
      $("#penyumbang").val(penyumbang);
      $("#alamat").val(alamat);
      $("#jenisHewan").val(hewan);
      $("#jumlah").val(jumlah);
      $("#modalTambah").modal('show');
      $("#action").val("edit");
      $("#myModalLabel").html("Edit Hewan Kurban");
    });

    $('#tableKurban').on('click', '.btnDelete', function () {
      let id = $(this).data("id");
      let penyumbang = $(this).data("penyumbang");
      let tanggal = $(this).data("tanggal");
      let hewan = $(this).data("hewan");

      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Kurban',
        content: 'Hapus Data:<br> Penyumbang: '+penyumbang+"<br>Tanggal: "+tanggal+"<br>Hewan: "+hewan,
        autoClose: 'Batal|10000',
        buttons: {
          Batal: function () {},
          Hapus: {
            title: 'Hapus',
            action: function () {
              window.location = "<?= site_url('Hewan_kurban/hapus/')?>" + id;
            }
          }
        }
      })
    })

    $('#btnPrint').click(function () {
      var tanggal1 = $("#t1").val();
      var tanggal2 = $("#t2").val();
      var url = '<?php echo site_url("/Hewan_kurban/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
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