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
                    <h1>Laporan Hewan Kurban</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Hewan Kurban</li>
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
                    Daftar Kurban
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <!-- Date range -->
                        <form action="<?=site_url('Hewan_kurban/index')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
								<?php if ($_SESSION['6insert'] == 1): ?>
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

                        <table id="tableKurban" class="table table-bordered table-striped" width="100%">
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

        <?php if ($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1 || $_SESSION['6insert'] == 1): ?>
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
                                        <label class="control-label">Penyumbang</label>
                                        <input type="text" class="form-control" id="penyumbang" name="penyumbang" placeholder="M Nur Fauzan W"
                                            require>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Kapas Madya" required
                                            autofocus="on">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="jenisHewan">Jenis Hewan</label>
                                        <select class="form-control" name="jenisHewan" id="jenisHewan">
                                            <option selected>-=Pilih=-</option>
                                            <option value="1">Kambing</option>
                                            <option value="2">Sapi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Jumlah</label>
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="2" require>
                                    </div>
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
    
    $(".btnSave").click(function () {
      $('#form-horizontal').submit(function () {
        return false;
      });
    });

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
      $("#modelTitle").html("Edit Hewan Kurban");
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
		let tgl = $("#searchByDate").val();
	  	tgl = tgl.split("/");
		let tanggal = tgl.join("-");
		var url = '<?php echo site_url("/Hewan_kurban/laporan_print/");?>' + tanggal;
		newwindow = window.open(url, 'Print', 'height=500,width=1100');
    });

  });
</script>
<?php
$this->load->view('template/endbody');
?>