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
                <!-- <h4>Custom Content Below</h4> -->
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                            href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                            aria-selected="false">Profile</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <br>
                        <!-- Date range -->
                        <form action="<?=site_url('Kas_ctrl')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" name="searchByDate" id="searchByDate">
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
                                    <th>Nama</th>
                                    <th class="min-tablet">Admin</th>
                                    <th class="min-tablet">Tipe</th>
                                    <th class="min-tablet">Jumlah</th>
                                    <th class="min-desktop">Tanggal</th>
                                    <th class="min-desktop">Keterangan</th>
                                    <?php if($_SESSION['25edit'] == 1 || $_SESSION['25delete'] == 1){ ?>
                                    <th class="min-desktop">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                        aria-labelledby="custom-content-below-profile-tab">
                        <form action="<?php echo site_url('kas_ctrl/tambah'); ?>" method="POST">
                            <div class="row">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p class="col-md-2"><b>Nama Admin:</b> <?php echo $_SESSION['nama']; ?></p>
                                        <input type="hidden" class="form-control" name="addAdmin"
                                            value="<?php echo $_SESSION['nama']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama :</label>
                                        <input required type="text" class="form-control col-md-10" name="addNama"
                                            placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tipe :</label>
                                        <select required class="form-control col-md-7" name="addTipe" id="addTipe">
                                            <option value="">- Pilih Tipe -</option>
                                            <option value="6">Donatur Tetap</option>
                                            <option value="7">Donatur Tidak Tetap</option>
                                            <option value="8">Infaq</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tanggal :</label>
                                        <input required type="text" class="form-control col-md-10 datePicker" name="addTanggal"
                                            placeholder="31-Agustus-2000" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Jumlah :</label>
                                        <input required type="text" class="form-control inputMask col-md-7" name="addJumlah"
                                            placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                </div>
                <!-- <div class="tab-custom-content">
                    <p class="lead mb-0">Custom Content goes here</p>
                </div> -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

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
$(document).ready(function(){
    $("#searchByDate").daterangepicker({
        startDate: moment().startOf('month'),
        endDate: moment().endOf('month')
    });
    $('.datePicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2000
    });

    <?php if(@$_SESSION['msg']):?>
    toastr.success("<?=@$_SESSION['msg']?>");
    <?php endif ?>
    <?php if(@$_SESSION['err']):?>
    toastr.error("<?=@$_SESSION['err']?>");
    <?php endif ?>

    var url = "<?= site_url($data) ?>";
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-success").slideUp(500);
    });

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
                    {
                        "data": null,
                        "orderable": false,
                        "searchable": false
                    },
                    {"data": "nama_donatur"},
                    {"data": "nama"},
                    {"data": "tipe"},
                    {"data": "jumlah", render: $.fn.dataTable.render.number(',', '.', '')},
                    {"data": "tanggal"},
                    {"data": "keterangan"}
                    <?php if($_SESSION['25edit'] == 1 || $_SESSION['25delete'] == 1){ ?>
                    ,{"data": "action", "orderable": false, "searchable": false}
                    <?php } ?>
                ],
        order: [[5, 'desc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }

    });
    // end setup datatables

    $('.inputMask').inputmask('decimal',{
        digits: 2,
        placeholder: "0",
        digitsOptional: true,
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true,
        rightAlign: false
    });

    <?php if($_SESSION['25edit']==1){ ?>
    $('#datatable').on('click','.edit_data',function(){
        var id = $(this).data('id');
        var donatur =  $(this).data('donatur');
        var tipe =  $(this).data('tipe');
        var jumlah =  $(this).data('jumlah');
        var tanggal =  $(this).data('tanggal');
        var keterangan =  $(this).data('keterangan');
        $('#modalEdit').modal('show');
        $('#formEdit').find('#editTipe').val(tipe);
        $('#formEdit').find('#editDonatur').val(donatur);
        $('#formEdit').find('#editJumlah').val(jumlah);
        $('#formEdit').find('#editTanggal').val(tanggal);
        $('#formEdit').find('#editKeterangan').val(keterangan);
        $('#formEdit').find('#idEdit').val(id);
        $('.btnSave').click(function(){
            $('#formEdit').submit();
        });
    });
    <?php } ?>

    $("#btnPrint").click(function(){
        var url = "<?=site_url("Kas_ctrl/print/").$t1."/".$t2?>";
        newwindow = window.open(url, 'Print', 'height=500,width=1100');
        if (window.focus) {
            newwindow.focus()
        }
        return false;
    });

    <?php if($_SESSION['25delete']==1){ ?>
    $('#datatable').on('click', '.delete_data', function () {
        var tanggal = $(this).data('tanggal');
        var nama = $(this).data('donatur');
        var id = $(this).data('id');
        // $item.find("input[id$='no']").val();
        // alert("hai");
        $.confirm({
            theme: 'supervan',
            icon: 'fas fa-exclamation-triangle',
            title: 'Hapus Data Ini ?',
            type: 'red',
            content: 'Hapus Data Zakat<br> Nama: ' + nama +'<br>Tanggal: '+ tanggal,
            autoClose: 'Cancel|10000',
            buttons: {
                Cancel: function () {},
                delete: {
                    text: 'Delete',
                    action: function () {
                        window.location = "<?=site_url('kas_ctrl/hapus/')?>" + id
                    }
                }
            }
        });
    });
<?php } ?>
});
</script>