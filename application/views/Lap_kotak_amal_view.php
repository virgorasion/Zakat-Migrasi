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
                    <h1>Kotak Amal Masjid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Kotak Amal Masjid</li>
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
                    Laporan Kotak Amal Masjid
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!-- <h4>Custom Content Below</h4> -->
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                            href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                            aria-selected="false">Tambah Data</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
						<br>

                        <table id="datatable" class="table table-bordered table-striped" width="100%">
							<thead>
								<tr>
									<th>Tipe</th>
									<th>Jumlah</th>
									<th>Tanggal</th>
									<th class="min-tablet">Nama Admin</th>
									<th class="min-desktop">Keterangan</th>
									<?php if($_SESSION['24edit']==1 || $_SESSION['24delete']==1){ ?>
									<th class="min-desktop">Action</th>
									<?php } ?>
								</tr>
							</thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

					<?php if($_SESSION['24insert']==1): ?>
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                        aria-labelledby="custom-content-below-profile-tab">
                        <form action="<?php echo site_url('Kotak_amal_ctrl/input_data'); ?>" method="POST">
                            <div class="row">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p class="col-md-2"><b>Nama Admin:</b> <?php echo $_SESSION['nama']; ?></p>
                                        <input type="hidden" class="form-control" name="addNama"
                                            value="<?php echo $_SESSION['nama']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tanggal :</label>
                                        <input required type="text" class="form-control col-md-10 datePicker" name="addTanggal"
                                            placeholder="31-Agustus-2000" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tipe :</label>
                                        <select required class="form-control col-md-7" name="addTipe" id="addTipe">
                                                <option value="">- Pilih Tipe -</option>
                                                <option value="1">Amal Jumatan</option>
                                                <option value="2">Amal Ahad Dhuha</option>
                                                <option value="3">Amal Tarawih</option>
                                                <option value="4">Amal Idul Fitri</option>
                                                <option value="5">Amal Idul Adha</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Jumlah :</label>
                                        <input required type="text" class="form-control inputMask col-md-10" name="addJumlah"
                                            placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Keterangan :</label>
                                        <textarea class="form-control" rows="3" placeholder="Keterangan"
                                            name="addKeterangan"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-lg-offset-3">
                                    <input type="submit" value="Submit" class="btn btn-flat btn-primary">
                                </div>
                            </div>
                            <!-- End Row -->
                        </form>
                    </div>
					<?php endif ?>
                </div>
                <!-- <div class="tab-custom-content">
                    <p class="lead mb-0">Custom Content goes here</p>
                </div> -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

		<?php if($_SESSION['24edit']==1){ ?>
        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- form start -->
                    <form id="formEdit" class="form-horizontal" action="<?php echo site_url('Kotak_amal_ctrl/edit_data')?>"
                        method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Data Amal</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <p class="col-md-12"><b>Nama Admin:</b> <?php echo $_SESSION['nama']; ?></p>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" id="editPetugas" name="editPetugas"
                                            value="<?php echo $_SESSION['nama'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-3 control-label">Tipe</label>
                                    <div class="col-sm-11">
                                        <select class="form-control" name="editTipe" id="editTipe">
                                            <option value="">- Pilih Tipe -</option>
                                            <option value="1">Amal Jumatan</option>
                                            <option value="2">Amal Ahad Dhuha</option>
                                            <option value="3">Amal Tarawih</option>
                                            <option value="4">Amal Idul Fitri</option>
                                            <option value="5">Amal Idul Adha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-7">
                                    <label class="col-sm-4 control-label">Tanggal</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control datePicker" id="editTanggal" name="editTanggal"
                                        required>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control inputMask" id="editJumlah" name="editJumlah"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group col-md-11">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="editKeterangan" id="editKeterangan"
                                            rows="3"></textarea>
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
        <?php } ?>

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
    $(document).ready(function () {
        <?php if(@$_SESSION['succ']):?>
        toastr.success("<?=@$_SESSION['succ']?>");
        <?php endif ?>
        <?php if(@$_SESSION['fail']):?>
        toastr.error("<?=@$_SESSION['fail']?>");
        <?php endif ?>
        <?php if(@$_SESSION['form_error']):?>
        $(document).Toasts('create', {
        class: 'bg-danger', 
        title: '<?=$_SESSION['form_error']?>',
        subtitle: '',
        body: `<?=validation_errors("<li>","</li>")?>`
        });
        <?php endif ?>


        // Setup datatables
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
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

        var url = "<?=site_url($url)?>";
        
        var table = $("#datatable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                });
            },
                oLanguage: {
                sProcessing: 'Loading....'
            },
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {"url": url, "type": "POST"},
                    columns: [
                        {"data": "tipe"},
                        {"data": "jumlah", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "tanggal"},
                        {"data": "nama"},
                        {"data": "keterangan"}
                        <?php if($_SESSION['25edit'] == 1 || $_SESSION['25delete'] == 1){ ?>
                        ,{"data": "action", "orderable": false, "searchable": false}
                        <?php } ?>
                    ],
            order: [[4, 'desc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
            }

        });
        // end setup datatables

        $('.datePicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 2000
        });

        $('.inputMask').inputmask('decimal', {
            digits: 2,
            placeholder: "0",
            digitsOptional: true,
            radixPoint: ",",
            groupSeparator: ".",
            autoGroup: true,
            rightAlign: false
        });

        <?php if($_SESSION['24edit']==1){ ?>
        $('#datatable').on('click', '.edit_data', function () {
            $("#modalEdit").modal("show");
            let $jumlah = $(this).data("jumlah");
            let $id = $(this).data("id");
            let $tgl = $(this).data("tanggal");
            let $ket = $(this).data("keterangan");
            let $tipe = $(this).data("tipe");
            $('#formEdit').find('#editTipe').val($tipe);
            $('#formEdit').find('#editJumlah').val($jumlah);
            $('#formEdit').find('#editTanggal').val($tgl);
            $('#formEdit').find('#editKeterangan').val($ket);
            $('#formEdit').find('#idEdit').val($id);
        });
        <?php } ?>

        <?php if($_SESSION['24delete']==1){ ?>
        $('#datatable').on('click', '.delete_data', function () {
            let id = $(this).data("id");
            let tipe = $(this).data("tipe");
            let tanggal = $(this).data("tanggal");
            let jumlah = $(this).data("jumlah");
            $.confirm({
                theme: 'supervan',
                title: 'Peringatan !',
                content: 'Hapus Data '+tipe+'<br> Tanggal: '+tanggal+'<br> Jumlah: '+jumlah,
                autoClose: 'Cancel|10000',
                buttons: {
                    Cancel: function () {},
                    delete: {
                        text: 'Delete',
                        action: function () {
                            window.location = "<?=site_url('Kotak_amal_ctrl/hapus_data/')?>"+id;
                        }
                    }
                }
            });
        });
    <?php } ?>
    });
</script>