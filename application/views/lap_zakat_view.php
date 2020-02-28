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
					<h1>Laporan Zakat & Infaq</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Beranda</a></li>
						<li class="breadcrumb-item active">Zakat & Infaq</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<?php if ($_SESSION['1insert'] == 1): ?>
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-edit"></i>
					Form Input Zakat
				</h3>
			</div>
			<div class="card-body">
				<form id="form" action="<?php echo site_url('zakat_ctrl/action')?>" method="POST">
					<input type="hidden" name="action" id="action" value="add">
					<div class="row">
						<div class="col-md-2">
							<input placeholder="Nama" type="text" name="actionNama" id="nama" class="form-control" autofocus
								required>
						</div>
						<div class="col-md-2">
							<input placeholder="Alamat" type="text" name="actionAlamat" id="alamat" class="form-control"
								required>
						</div>
						<div class="col-md-2">
							<input placeholder="Zakat Fitrah" class="inputMask form-control" type="number"
								name="actionFitrah" id="zakatFitrah" class="form-control">
						</div>
						<div class="col-md-2">
							<select class="form-control" name="actionBeli" id="pembelian">
								<option value="">- Pilih Tipe -</option>
								<option value="0">Beli</option>
								<option value="1">Tidak</option>
							</select>
						</div>
						<div class="col-md-2">
							<input placeholder="Zakat Mall" type="text" name="actionMall" id="zakatMal"
								class="form-control">
						</div>
						<div class="col-md-2">
							<input placeholder="Infaq" type="text" name="actionInfaq" id="infaq" class="form-control">
						</div>
					</div>
				</form>
				<small class="text-muted">Np: Tekan 'ENTER' pada bagian infaq untuk submit</small>
			</div>
			<!-- /.card -->
		</div>
		<?php endif ?>

		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-edit"></i>
					Daftar Zakat
				</h3>
			</div>
			<div class="card-body">
				<div class="tab-content" id="custom-content-below-tabContent">
					<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
						aria-labelledby="custom-content-below-home-tab">
						<!-- Date range -->
						<form action="<?=site_url('zakat_ctrl/index')?>" method="post" class="form-group">
							<div class="col-sm-12 row">
								<div class="input-group col-sm-5">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
									<input type="text" class="form-control float-right" value="<?=@$date?>"
										name="searchByDate" id="searchByDate">
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
									<th>Nama</th>
									<th class="min-tablet">Alamat</th>
									<th class="min-tablet">Zakat Fitrah</th>
									<th class="min-tablet">Pembelian</th>
									<th class="min-desktop">Zakat Mall</th>
									<th class="min-desktop">Infaq</th>
									<th class="min-desktop">Tanggal</th>
									<?php if ($_SESSION['1edit'] == "1" && $_SESSION['1delete'] == "1"): ?>
									<th class="min-desktop">Action</th>
									<?php endif ?>
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

		<?php if ($_SESSION['6edit'] == 1 || $_SESSION['6insert'] == 1): ?>
		<!-- Modal -->
		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<!-- form start -->
					<form id="formEdit" class="form-horizontal" action="<?php echo site_url('zakat_ctrl/action') ?>"
						method="post">
						<div class="modal-header">
							<h4 class="modal-title" id="modelTitle">Tambah Data Zakat</h4>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="actionNama">Nama :</label>
								<input type="text" name="actionNama" id="actionNama" class="form-control"
									placeholder="ex : Virgorasion">
							</div>
							<div class="form-group">
								<label for="actionAlamat">Alamat :</label>
								<input type="text" name="actionAlamat" id="actionAlamat" class="form-control"
									placeholder="ex : Kapas madya">
							</div>
							<div class="form-group">
								<label for="actionFitrah">Zakat Fitrah :</label>
								<input type="text" name="actionFitrah" id="actionFitrah" class="form-control"
									placeholder="ex : 5">
							</div>
							<div class="form-group">
								<label for="actionBeli">Pembelian :</label>
								<select class="form-control" name="actionBeli" id="actionBeli">
									<option value="1">Beli</option>
									<option value="0">Tidak</option>
								</select>
							</div>
							<div class="form-group">
								<label for="actionMall">Zakat Mall :</label>
								<input type="text" name="actionMall" id="actionMall" class="form-control inputMask"
									placeholder="ex : 50.000">
							</div>
							<div class="form-group">
								<label for="actionInfaq">Infaq :</label>
								<input type="text" name="actionInfaq" id="actionInfaq" class="form-control inputMask"
									placeholder="ex : 100.000">
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" class="form-control" id="idZakat" name="idZakat">
							<input type="hidden" name="action" id="action" value="edit">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary btnSave">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
<!-- InputMask -->
<script src="<?= base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script>
	$('body').addClass('sidebar-collapse');
	// Setup datatables
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

	var url = "<?=site_url($data)?>";
	var table = $("#datatable").dataTable({
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
		columns: [
			{
				"data": "nama"
			},
			{
				"data": "alamat"
			},
			{
				"data": "zakatFitrah"
			},
			{
				"data": "pembelian"
			},
			{
				"data": "zakatMall"
			},
			{
				"data": "infaq_formated"
			},
			{
				"data": "tgl"
			}
			<?php if ($_SESSION['25edit'] == 1 || $_SESSION['25delete'] == 1): ?> 
			,{
				"data": "action",
				"orderable": false,
				"searchable": false
			} 
			<?php endif ?>
		],
		// order: [
		// 	[5, 'desc']
		// ],
		rowCallback: function (row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			// $('td:eq(0)', row).html(index);
		}

	});
	// end setup datatables

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

	<?php if($_SESSION['25edit']==1){ ?>
    $('#datatable').on('click','.edit_data',function(){
        var id = $(this).data('id');
        var nama =  $(this).data('nama');
        var alamat =  $(this).data('alamat');
        var fitrah =  $(this).data('fitrah');
        var beli =  $(this).data('beli');
        var mall =  $(this).data('mall');
        var infaq =  $(this).data('infaq');
        $('#modalTambah').modal('show');
		$("#modelTitle").html('Edit Data Zakat')
        $('#actionNama').val(nama);
        $('#actionAlamat').val(alamat);
        $('#actionFitrah').val(fitrah);
        $('#actionBeli').val(beli);
        $('#actionMall').val(mall);
        $('#actionInfaq').val(infaq);
        $('#idZakat').val(id);
        $('.btnSave').click(function(){
            $('#formEdit').submit();
        });
    });
    <?php } ?>

	$('#infaq').keypress(function (e) {
		if (e.which == 13) {
			if ($('#nama').val() == '') {
				alert('Nama Harus Diisi');
			} else if ($('#alamat').val() == '') {
				alert('Alamat Tidak Boleh Kosong');
			} else if ($('#zakatFitrah').val() == '') {
				alert('Zakat Fitrah Tidak Boleh Kosong');
			} else {
				$('#form').submit();
			}
		}
	});

	$('#zakatMal, #infaq, #zakatMalEdt, #infaqEdt, .inputMask').inputmask('decimal', {
		digits: 2,
		placeholder: "0",
		digitsOptional: true,
		radixPoint: ",",
		groupSeparator: ".",
		autoGroup: true,
		rightAlign: false
	});

	$('#btnPrint').click(function () {
		let tanggal = $("#searchByDate").val();
		tanggal = tanggal.split("/");
		tanggal = tanggal.join("-");
		let url = '<?php echo site_url("zakat_ctrl/laporan_print/");?>' + tanggal;
		console.log(url);
		newwindow = window.open(url, 'Print', 'height=500,width=1100');
	});

	$('#datatable').on('click', '.delete_data', function () {
		var id = $(this).data("id");
		var nama = $(this).data("nama");
		var alamat = $(this).data("alamat");
		var tanggal = $(this).data("tanggal");
		$.confirm({
			theme: 'supervan',
			title: 'Hapus Data Ini ?',
			content: 'Hapus Data Zakat<br>Nama: '+nama+'<br>Alamat: '+alamat+'<br>Tanggal: '+tanggal,
			autoClose: 'Cancel|10000',
			buttons: {
				Cancel: function () {},
				delete: {
					text: 'Delete',
					action: function () {
						window.location = "<?=site_url('zakat_ctrl/hapus/')?>" + id;
					}
				}
			}
		});
	});
</script>