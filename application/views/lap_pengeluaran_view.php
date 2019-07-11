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
        <form method="post" action="<?= site_url("Lap_pengeluaran/index") ?>" id="formsearch">
          <div class="col-sm-12">
            <?php if ($_SESSION['7insert'] == 1) { ?>
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2">Tambah</button>
            <?php 
        } ?>
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
        <table id="tablePengeluaran" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($data as $row): ?>
            <tr>
              <input type="hidden" class="idPengeluaran" value="<?php echo $row->id_pengeluaran; ?>">
              <td class="no">
                <?php echo $no; ?>
              </td>
              <td class="nama">
                <?php echo $row->admin; ?>
              </td>
              <td class="tanggal">
                <?php echo $row->tanggal;?>
              </td>
              <td class="jumlah">
                <?php echo number_format((double)$row->jumlah,0,"," , ".");?>
              </td>
              <td class="keterangan">
                <?php echo $row->keterangan;?>
              </td>
              <td>
                <?php if ($this->session->userdata("7edit") == "1") { ?>
                <a href='#'>
                  <span data-placement='top' data-toggle='tooltip' title='Edit'>
                    <button class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                      <span class='glyphicon glyphicon-pencil'></span>
                    </button>
                </a>
                <?php 
              } ?>
                <?php if ($this->session->userdata("7delete") == "1") { ?>
                <a class="buttonDelete" href='#'>
                  <span data-placement='top' data-toggle='tooltip' title='Delete'>
                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'>
                      <span class='glyphicon glyphicon-remove'></span>
                    </button>
                </a>
                <?php 
              } ?>
              </td>
            </tr>
            <?php $no++;
        endforeach
        ?>
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
                  <input type="text" class="form-control datePicker" id="addTanggal" name="addTanggal" placeholder="31-Agustus-2000"
                    required autocomplete="off">
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
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script>
  $(function () {
    $('#tablePengeluaran').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

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

    <?php if($_SESSION['7insert'] == 1) { ?>
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

    <?php if($_SESSION['7edit'] == 1) { ?>
    $("#tablePengeluaran").on("click", ".btnEdit", function () {
      var core = $(this).closest("tr");
      $("#addNama").val(core.find(".nama").text().trim());
      $("#addTanggal").val(core.find(".tanggal").text().trim());
      $("#addJumlah").val(core.find(".jumlah").text().trim());
      $("#addKeterangan").val(core.find(".keterangan").text().trim());
      $("#idPengeluaran").val(core.find(".idPengeluaran").val());
      $("#action").val("edit");
      $("#modalTambah").modal("show");
    })
  <?php } ?>

    $('#btnPrint').click(function () {
      var tanggal1 = '<?php echo str_replace(' - ','.
      ',$t1); ?>';
      var tanggal2 = '<?php echo str_replace(' - ','.
      ',$t2); ?>';
      var url = '<?php echo site_url("/Lap_pengeluaran/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

    <?php if($_SESSION['7delete'] == 1){ ?>
    $('#tablePengeluaran').on('click', '.btnDelete', function () {
            var core = $(this).closest("tr");
            var tanggal = core.find(".tanggal").text().trim();
            var id = core.find(".idPengeluaran").val();
            // $item.find("input[id$='no']").val();
            // alert("hai");
            $.confirm({
                theme: 'supervan',
                title: 'Peringatan !',
                content: 'Hapus Pengeluaran Tanggal ' + tanggal,
                autoClose: 'Cancel|5000',
                buttons: {
                    Cancel: function () {},
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