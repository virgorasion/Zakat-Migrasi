<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jadwal Tarawih
      <small>
        <?=$_SESSION['nama']?></small>
    </h1>

  </section>
  <!-- Main content -->
  <section class="content">
    <?php if(@$_SESSION['succ'] != null){ ?>
    <!-- Page Alert -->
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Pemberitahuan !</h4>
      <?=$_SESSION['msg']?>
    </div>
    <?php } ?>
    <?php if(@$_SESSION['fail'] != null){ ?>
    <!-- Page Alert -->
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Pemberitahuan !</h4>
      <?=$_SESSION['err']?>
    </div>
    <?php } ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
        <form method="post" action="<?php echo site_url("Jadwal_tarawih_ctrl/index") ?>" id="formsearch">
          <div class="col-sm-12">
            <?php if($_SESSION['10insert'] == 1){ ?>
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2" btn-lg btn-block">Tambah
              Jadwal</button>
            <?php } ?>
            <div class="form-inline col-md-4">
              <div class="input-group input-daterange">
                <input type="text" class="form-control" name="t1" id="t1" value="<?=$t1?>" autocomplete="off">
                <div class="input-group-addon">to</div>
                <input type="text" class="form-control" name="t2" id="t2" value="<?=$t2?>" autocomplete="off">
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
      <div class="box-body">
        <table id="tableJadwal" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Imam</th>
              <th>Bilal</th>
              <th>Ceramah</th>
              <?php if($_SESSION['10edit'] == 1 || $_SESSION['10delete'] == 1){ ?>
              <th>Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($datas as $data){
              switch ($data->ceramah) {
                case '1':
                  $ceramah = "Ceramah";
                  break;
                case '2':
                  $ceramah = "-";
                  break;
                default:
                  $ceramah = "-";
              }
            ?>
            <tr>
              <td>
                <?=$no?>
              </td>
              <td class="tanggal">
                <?=$data->tgl?>
              </td>
              <td class="imam">
                <?=$data->imam?>
              </td>
              <td class="bilal">
                <?=$data->bilal?>
              </td>
              <td class="ceramah">
                <?=$ceramah?>
              </td>
              <td>
                <input type="hidden" id="ID" value="<?=$data->id?>">
                <input type="hidden" id="kode" value="<?=$data->kode_jadwal?>">
                <?php if ($this->session->userdata("10edit") == "1") { ?>
                <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                <button id="btnEdit" class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                  <span class='glyphicon glyphicon-pencil'></span>
                </button>
                <?php } ?>
                <?php if ($this->session->userdata("10delete") == "1") { ?>
                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                  <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'>
                    <span class='glyphicon glyphicon-remove'></span>
                  </button>
                </span>
                <?php 
                } ?>
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <?php if($_SESSION['10insert'] == 1){ ?>
    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="modalTambah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Jadwal</h4>
          </div>
          <form id="formAction" action="<?= site_url('jadwal_tarawih_ctrl/ActionJadwal') ?>" method="post">
            <div class="modal-body">
              <input id="idf" value="1" type="hidden" />
              <table class="table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Imam</th>
                    <th>Bilal</th>
                    <th>Ceramah</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="inputDinamis">
                </tbody>
              </table>
              <button type="button" id="tambahInput" class="btn btn-secondary"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php } ?>
    
    <?php if($_SESSION['10edit'] == 1){ ?>
    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="modalEdit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Jadwal</h4>
          </div>
          <form id="formEdit" action="<?= site_url('jadwal_tarawih_ctrl/EditJadwal') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="edtTgl">Tanggal</label>
                <input type="text" class="form-control datePicker" name="edtTgl" id="edtTgl" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="edtImam">Imam</label>
                <input type="text" class="form-control" name="edtImam" id="edtImam">
              </div>
              <div class="form-group">
                <label for="edtBilal">Bilal</label>
                <input type="text" class="form-control" name="edtBilal" id="edtBilal">
              </div>
              <div class="form-group">
                <label for="edtCeramah">Ceramah</label>
                <select class="form-control" name="edtCeramah" id="edtCeramah">
                  <option value="1">Ceramah</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="editID" id="editID" value="">
            <input type="hidden" name="kodeJadwal" id="kodeJadwal" value="">
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
  function removeFormField(idf) {
    $(idf).remove();
  }

  function formatDate(date) {
    var monthNames = [
      "01", "02", "03",
      "04", "05", "06", "07",
      "08", "09", "10",
      "11", "12"
    ];
    var days = [
      "01", "02", "03",
      "04", "05", "06", "07",
      "08", "09"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();
    if (day < 10) {
      var res = "0" + day;
    } else {
      var res = day;
    }
    return year + '-' + monthNames[monthIndex] + '-' + res;
  }
  $(document).ready(function () {
    $('#tableJadwal').dataTable({
      language: {
        infoEmpty: "No entries to show"
      }
    });

    // DateRange (Date Main)
    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });

    $('.datePicker').datepicker({
      format: 'dd-MM-yyyy',
      autoclose: true
    });

    $(".alert").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert").slideUp(500);
    });
    
    <?php if($_SESSION['10insert']==1){ ?>
    // Open Modal Tambah
    $('#btnTambah').click(function () {
      $('#modalTambah').modal('show');
    })
  <?php } ?>

    <?php if($_SESSION['10edit'] == 1) { ?>
    // Open Modal Edit
    $('#tableJadwal').on('click', '.btnEdit', function () {
      var item = $(this).closest('tr');
      var tgl = item.find(".tanggal").text().trim();
      var imam = item.find(".imam").text().trim();
      var bilal = item.find(".bilal").text().trim();
      var ceramah = item.find(".ceramah").text().trim();
      var id = item.find("#ID").val().trim();
      var kode = item.find("#kode").val().trim();
      if (ceramah == "Ceramah") {
        ceramah = 1;
      } else {
        ceramah = 0;
      }
      $('#modalEdit').modal('show');
      $("#formEdit").find("#edtTgl").val(tgl);
      $("#formEdit").find("#edtImam").val(imam);
      $("#formEdit").find("#edtBilal").val(bilal);
      $("#formEdit").find("#edtCeramah").val(ceramah);
      $("#formEdit").find("#editID").val(id);
      $("#formEdit").find("#kodeJadwal").val(kode);
    })
  <?php } ?>

    <?php if($_SESSION['10insert']==1) { ?>
    // Function FormDinamis
    $('#tambahInput').click(function () {
      var idf = document.getElementById("idf").value;
      if (idf > 1) {
        var id = idf - 1;
        var getDate = $("#tgl" + id).val();
        var lastDate = new Date(getDate);
        lastDate.setDate(lastDate.getDate() + 1);
        var nowDate = formatDate(lastDate);
      }
      stre = "<tr id='srow" + idf + "'>" +
        "<td>" +
        idf +
        "</td>" +
        "<td scope='row'>" +
        "<input type='date' class='form-control datePicker' id='tgl" + idf + "' name='tanggal[]' value='" +
        nowDate + "' required>" +
        "</td>" +
        "<td>" +
        "<input type='text' class='form-control' name='imam[]' placeholder='Abu Bakar As-Siddiq' required>" +
        "</td>" +
        "<td>" +
        "<input type='text' class='form-control' name='bilal[]' placeholder='Umar Bin Khattab'>" +
        "</td>" +
        "<td>" +
        "<select class='form-control' name='ceramah[]' required>" +
        "<option>-= Pilih =-</option>" +
        "<option value='1'>Ceramah</option>" +
        "<option value='0'>Tidak</option>" +
        "</select>" +
        "</td>" +
        "<td>" +
        "<button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" +
        idf + "\"); return false;'><i class='glyphicon glyphicon-remove'></i></button>" +
        "</td>" 
        "</tr>";
      $("#inputDinamis").append(stre);
      idf = (idf - 1) + 2;
      document.getElementById("idf").value = idf;
    })
  <?php } ?>

    $('#btnPrint').click(function () {
      var tanggal1 = $("#t1").val();
      var tanggal2 = $("#t2").val();
      var url = '<?php echo site_url("/Jadwal_tarawih_ctrl/laporanPrint/"); ?>' + tanggal1 + '/' + tanggal2;
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

    <?php if($_SESSION['10delete']==1){ ?>
    // Function Delete Data
    $('#tableJadwal').on('click', '.btnDelete', function () {
      var $item = $(this).closest("tr");
      var $nama = $item.find(".tanggal").text().trim();
      $.confirm({
        theme: 'supervan',
        title: 'Peringatan !',
        content: 'Hapus jadwal ini ' + $nama,
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Hapus',
            action: function () {
              window.location = "Jadwal_tarawih_ctrl/HapusData/" + $item.find("#ID").val() + "/" + $item.find(
                "#kode").val();
            }
          }
        }
      });
    });
  <?php } ?>

  });
</script>
<?php $this->load->view('template/endbody') ?>