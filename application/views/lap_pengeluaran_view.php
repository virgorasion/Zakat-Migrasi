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
                    <h1>Kas Masjid</h1>
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
                    Tabel Kas Masjid
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <!-- Date range -->
                        <form action="<?=site_url('Lap_pengeluaran/index')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
								<?php if ($_SESSION['7insert'] == 1): ?>
								<button type="button" name="btnTambah" id="btnTambah" class="btn btn-primary col-md-2">Tambah Data</button>
								<?php endif; ?>
                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" value="<?=$date?>" name="searchByDate" id="searchByDate">
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    style="margin-right:5px">Tampilkan</button>
                                <button class="btn btn-default" id="btnPrint">Print</button>
                            </div>
                        </form>
                        <!-- /.form group -->

                        <table id="tablePengeluaran" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th class="min-tablet">Tanggal</th>
                                    <th class="min-tablet">Jumlah</th>
                                    <th class="min-tablet">Keterangan</th>
                                    <?php if ($_SESSION['7edit'] == 1):?>
                                    <th class="min-tablet">Action</th>
									<?php endif; ?>
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

        <?php if ($_SESSION['7edit'] == 1 || $_SESSION['7delete'] == 1 || $_SESSION['7insert'] == 1): ?>
        <!-- Modal -->
		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<!-- form start -->
					<form class="form-horizontal" action="<?php echo site_url('Lap_pengeluaran/Action') ?>" method="post">
						<div class="modal-header">
							<h4 class="modal-title" id="modelTitle">Tambah Data Pengeluaran</h4>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="box-body">
								<div class="row col-md-12">
									<div class="form-group col-md-12">
										<p><b>Nama Admin:</b> <?php echo $_SESSION['nama']; ?></p>
										<input type="hidden" id="addNama" name="addNama" value="<?php echo $_SESSION['nama'] ?>">
									</div>
									<div class="form-group col-md-12">
										<label class="control-label">Tanggal</label>
										<input type="text" class="form-control datePicker" id="addTanggal" name="addTanggal"
											placeholder="31-Agustus-2000" required autocomplete="off">
									</div>
									<div class="form-group col-md-12">
										<label class="control-label">Jumlah</label>
										<input type="text" class="form-control inputMask" id="addJumlah" name="addJumlah" required>
									</div>
									<div class="form-group col-md-12">
										<label for="addKeterangan">Keterangan</label>
										<textarea class="form-control" name="addKeterangan" id="addKeterangan" rows="3"></textarea>
									</div>
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
        <?php endif; ?>


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
<!-- InputMask -->
<script src="<?= base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
        <?php if ($_SESSION['7edit'] == 1):?>
        ,{
          "data": "aksi", "orderable": false, "searchable":false 
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

    <?php if ($_SESSION['7insert'] == 1):?>
		// Fungsi Tambah
      $("#btnTambah").click(function () {
        $("#modalTambah").modal('show');
        $("#action").val("add");
        $("#addNama").val();
        $("#addTanggal").val();
        $("#addJumlah").val();
        $("#addKeterangan").val();
      }); 
	<?php endif; ?>

    <?php if ($_SESSION['7edit'] == 1):?>
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
          $("#modalTitle").html("Edit Data Pengeluaran");
          $("#modalTambah").modal("show");
        }) 
    <?php endif; ?>

    $('#btnPrint').click(function () {
      let tgl = $("#searchByDate").val();
	  tgl = tgl.split("/");
	  let tanggal = tgl.join("-");
      let url = '<?php echo site_url("/Lap_pengeluaran/laporan_print/");?>' + tanggal;
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
    });

    <?php
    if ($_SESSION['7delete'] == 1):?>
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
                window.location = "<?=site_url('Lap_pengeluaran/HapusData/')?>" + id
              }
            }
          }
        });
      }); 
	<?php endif; ?>
  });
</script>
<?php
$this->load->view('template/endbody');
?>