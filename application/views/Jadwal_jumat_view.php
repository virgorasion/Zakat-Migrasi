<?php 
$this->load->view('template/head');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?php
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Sholat Jum'at</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Kas Masjid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Daftar Imam & Makmum
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <br>
                        <!-- Date range -->
                        <form action="<?=site_url('Jadwal_jumat_ctrl/index')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <?php if ($_SESSION['11insert'] == 1): ?>
                                <button type="button" name="btnTambah" id="btnTambah"
                                    class="btn btn-primary col-md-2">Tambah Data</button>
                                <?php endif ?>
                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" name="searchByDate"
                                        id="searchByDate" value="<?=$date?>">
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    style="margin-right:5px">Tampilkan</button>
                                <button class="btn btn-default" id="btnPrint">Print</button>
                            </div>
                        </form>
                        <!-- /.form group -->

                        <table id="datatable" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Imam</th>
                                    <th>Bilal</th>
                                    <th>Ceramah</th>
                                    <?php if($_SESSION['11edit']==1 || $_SESSION['11delete']==1){ ?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="tab-custom-content">
                    <p class="lead mb-0">Custom Content goes here</p>
                </div> -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

        <?php if ($_SESSION['11insert'] == 1): ?>
        <!-- Modal Tambah Jadwal -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo site_url('Jadwal_jumat_ctrl/ActionJadwal') ?>"
                        method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Buat Data Pengeluaran</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <input id="idf" value="1" type="hidden" />
                                <table class="table">
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
                                    <tbody id="inputDinamis">
                                    </tbody>
                                </table>
                                <button type="button" id="tambahInput" class="btn btn-secondary"><i class="fa fa-plus"></i> Tambah</button>
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
        <?php endif; ?>

        <?php if($_SESSION['11edit']==1): ?>
        <!-- Modal Edit Jadwal -->
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="formEdit" action="<?= site_url('Jadwal_jumat_ctrl/EditJadwal') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edtTgl">Tanggal</label>
                                <input type="text" class="form-control datePicker" name="edtTgl" id="edtTgl"
                                    autocomplete="off">
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
        <?php endif ?>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!-- DateRangePicker -->
<script src="<?= base_url()?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
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
    table_pengeluaran = $("#datatable").DataTable({
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
          "data": "tanggal"
        },
        {
          "data": "imam"
        },
        {
          "data": "bilal"
        },
        {
          "data": "ceramah_convert"
        }
        <?php if ($_SESSION['7edit'] == 1):?>
        ,{
          "data": "action", "orderable": false, "searchable":false 
        }
		    <?php endif; ?>
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
    $("#searchByDate").daterangepicker({
        // startDate: moment().startOf('month'),
        // endDate: moment().endOf('month')
	});

	$('.datePicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2000
    });
	
	<?php if(@$_SESSION['succ']):?>
    toastr.success("<?=@$_SESSION['succ']?>");
    <?php endif ?>
    <?php if(@$_SESSION['fail']):?>
    toastr.error("<?=@$_SESSION['fail']?>");
    <?php endif ?>
    
    <?php if($_SESSION['11insert']==1): ?>
    // Open Modal Tambah
    $('#btnTambah').click(function () {
      $('#modalTambah').modal('show');
    })
  <?php endif ?>

    <?php if($_SESSION['11edit']==1): ?>
    // Open Modal Edit
    $('#datatable').on('click', '.btnEdit', function () {
	  let tanggal = $(this).data("tanggal");
	  let imam = $(this).data("imam");
	  let bilal = $(this).data("bilal");
	  let ceramah = $(this).data("ceramah");
	  let id = $(this).data("id");
      if (ceramah == "Ceramah") {
        ceramah = 1;
      } else {
        ceramah = 0;
      }
      $('#modalEdit').modal('show');
      $("#formEdit").find("#edtTgl").val(tanggal);
      $("#formEdit").find("#edtImam").val(imam);
      $("#formEdit").find("#edtBilal").val(bilal);
      $("#formEdit").find("#edtCeramah").val(ceramah);
      $("#formEdit").find("#editID").val(id);
    })
  <?php endif ?>

    <?php if($_SESSION['11insert']==1):?>
    // Function FormDinamis
    $('#tambahInput').click(function () {
      var idf = document.getElementById("idf").value;
      if (idf > 1) {
        var id = idf - 1;
        var getDate = $("#tgl" + id).val();
        var lastDate = new Date(getDate);
        lastDate.setDate(lastDate.getDate() + 7);
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
        idf + "\"); return false;'><i class='fa fa-minus'></i></button>" +
        "</td>" +
        "</tr>";
      $("#inputDinamis").append(stre);
      idf = (idf - 1) + 2;
      document.getElementById("idf").value = idf;
    })
  <?php endif ?>

    $('#btnPrint').click(function () {
      var tanggal1 = $("#t1").val();
      var tanggal2 = $("#t2").val();
      var url = '<?php echo site_url("/Jadwal_jumat_ctrl/laporanPrint/"); ?>' + tanggal1 + '/' + tanggal2;
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

    <?php if($_SESSION['11delete']==1): ?>
    // Function Delete Data
    $('#datatable').on('click', '.btnDelete', function () {
	  let imam = $(this).data("imam");
	  let bilal = $(this).data("bilal");
	  let tanggal = $(this).data("tanggal");
	  let id = $(this).data("id");
      $.confirm({
        theme: 'supervan',
        title: 'Peringatan !',
        content: 'Hapus Data Jadwal<br>'+'Imam: '+imam+'<br>Bilal: '+bilal+'<br>Tanggal: '+tanggal,
        autoClose: 'Cancel|10000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Hapus',
            action: function () {
              window.location = "Jadwal_jumat_ctrl/HapusData/" + id;
            }
          }
        }
      });
    });
  <?php endif ?>

  });
</script>
<?php $this->load->view('template/endbody') ?>