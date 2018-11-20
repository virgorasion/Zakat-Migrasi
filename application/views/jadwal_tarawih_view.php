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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i>
          </button>
        </div>
        <form method="post" action="<?php echo site_url("Jadwal_tarawih_ctrl/index") ?>" id="formsearch">
          <div class="col-sm-12">
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2" btn-lg btn-block">Tambah
              Jadwal</button>
            <div class="form-inline col-md-4">
              <div class="input-group input-daterange">
                <input type="text" class="form-control" name="t1" id="t1" value="<?=$t1?>">
                <div class="input-group-addon">to</div>
                <input type="text" class="form-control" name="t2" id="t2" value="<?=$t2?>">
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
              <th>Action</th>
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
              <td>
                <?=$data->tgl?>
              </td>
              <td>
                <?=$data->imam?>
              </td>
              <td>
                <?=$data->bilal?>
              </td>
              <td>
                <?=$ceramah?>
              </td>
              <td>
                <?php if ($this->session->userdata("17edit") == "1") { ?>
                <a href='#'>
                  <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                  <button id="btnEdit" class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                    <span class='glyphicon glyphicon-pencil'></span>
                  </button>
                </a>
                <?php 
                } ?>
                <?php if ($this->session->userdata("17delete") == "1") { ?>
                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                  <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' id="btnDelete">
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
            <input type="hidden" name="ID" id="inputID" class="form-control">
            <input type="hidden" name="ActType" id="ActType" class="form-control">
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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>

<script>
  function removeFormField(idf) {
    $(idf).remove();
  }
  $(document).ready(function () {
    $('#tableJadwal').dataTable({
      language: {
        infoEmpty: "No entries to show"
      }
    });

    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });

    $('.datepicker').datepicker({
      format: 'dd-MM-yyyy'
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-success").slideUp(500);
    });

    $('#btnTambah').click(function () {
      $('#modalTambah').modal('show');
      $('#formAction').find('#ActType').val('add');
    })

    $('#tableJadwal').on('click', '.btnEdit', function () {
      $('#modalTambah').modal('show');
      $('#formAction').find('#ActType').val('edit');
    })

    $('#tambahInput').click(function () {
      var idf = document.getElementById("idf").value;
      stre = "<tr id='srow" + idf + "'>" +
        "<td scope='row'>" +
        "<input type='date' class='form-control datepicker' name='tanggal[]' required>" +
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
        "</td>" +
        "</tr>";
      $("#inputDinamis").append(stre);
      idf = (idf - 1) + 2;
      document.getElementById("idf").value = idf;
    })

    $('#datatable').on('click', '[id^=btnDelete]', function () {
      var $item = $(this).closest("tr");
      var $nama = $item.find("#data_nama").val();
      console.log($nama);
      // $item.find("input[id$='no']").val();
      // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Ini ?',
        content: 'Hapus data zakat ' + $nama,
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Delete',
            action: function () {
              window.location = "zakat_ctrl/hapus/" + $item.find("#id").val();
            }
          }
        }
      });
    });

  });
</script>
<?php $this->load->view('template/endbody') ?>