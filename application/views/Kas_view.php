<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kas Masjid
            <!-- <small>Miftahul Jannah</small> -->
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>

            <li class="active">Kas Masjid</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <form method="post" action="<?php echo site_url("Kas_ctrl/index") ?>" id="formsearch">
                <div class="col-sm-12">
                    <div class="form-inline col-md-4">
                    <div class="input-group input-daterange">
                        <input type="text" class="form-control" name="t1" id="t1" value="<?= @$t1 ?>" autocomplete="off">
                        <div class="input-group-addon">to</div>
                        <input type="text" class="form-control" name="t2" id="t2" value="<?= @$t2 ?>" autocomplete="off">
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary" id="btnSearch">
                        Tampilkan</button>
                    </div>
                    <h3 class="box-title col-sm-1">
                    <button type="button" class="btn btn-default" id="btnPrint">
                        <i class="fa fa-print"></i> Print</button>
                    </h3>
                </div>
                </form>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

            <!-- Alert -->
            <?php if(@$_SESSION['msg']){?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
              <h5>
                <span class='glyphicon glyphicon-ok'></span> Info!</h5>
              <?php echo @$_SESSION['msg']; ?>
            </div>
            <?php } ?>
            <?php if(@$_SESSION['err']){?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
              <h5>
                <span class='glyphicon glyphicon-ok'></span> Info!</h5>
              <?php echo @$_SESSION['err']; ?>
            </div>
            <?php } ?>
            <!-- END Alert -->

                <!-- FORM VALIDATION ON TABS -->
                <!--===================================================-->
                <div class="tab-base">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="forms-validation.html#demo-bsc-tab-1" data-toggle="tab">
                                <i class="fa fa-history"></i> Informasi</a>
                        </li>
                        <?php if($_SESSION['25insert']==1){ ?>
                        <li>
                            <a href="forms-validation.html#demo-bsc-tab-2" data-toggle="tab">
                                <i class="fa fa-edit"></i> Tambah Data</a>
                        </li>
                        <?php } ?>
                    </ul>

                    <!-- Tabs Content -->
                    <div id="demo-bv-bsc-tabs" class="form-horizontal">
                        <div class="tab-content">
                            <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
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
                                    <br>
                                    
                                    </tbody>
                                </table>
                            </div>

                            <?php if($_SESSION['25insert']==1){ ?>
                            <!-- Start Second Tab -->
                            <div class="tab-pane fade" id="demo-bsc-tab-2">
                                <h4 class="mar-btm text-thin">Tambah Data</h4>
                                <hr>
                                <form action="<?php echo site_url('kas_ctrl/tambah'); ?>" method="POST">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama Admin :</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="addAdmin" value="<?php echo $_SESSION['nama']; ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama :</label>
                                        <div class="col-lg-7">
                                            <input required type="text" class="form-control" name="addNama" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tipe :</label>
                                        <div class="col-lg-7">
                                            <select required class="form-control" name="addTipe" id="addTipe">
                                                    <option value="">- Pilih Tipe -</option>
                                                    <option value="6">Donatur Tetap</option>
                                                    <option value="7">Donatur Tidak Tetap</option>
                                                    <option value="8">Infaq</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tanggal :</label>
                                        <div class="col-lg-7">
                                            <input required type="text" class="form-control datepicker" name="addTanggal" placeholder="31-Agustus-2000" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Jumlah :</label>
                                        <div class="col-lg-7">
                                            <input required type="text" class="form-control inputMask" name="addJumlah" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Keterangan :</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control" rows="3" placeholder="Keterangan" name="addKeterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-lg-offset-3">
                                        <input type="submit" value="Submit" class="btn btn-flat btn-primary">
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!-- END FORM VALIDATION ON TABS -->

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <?php if($_SESSION['25edit']==1){ ?>
        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form id="formEdit" class="form-horizontal" action="<?php echo site_url('Kas_ctrl/edit') ?>"
                        method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data Kas</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Admin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="editPetugas" name="editPetugas"
                                            value="<?php echo $_SESSION['nama'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Donatur</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="editDonatur" name="editDonatur">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tipe</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="editTipe" id="editTipe">
                                            <option value="1">Amal Jumatan</option>
                                            <option value="2">Amal Ahad Dhuha</option>
                                            <option value="3">Amal Tarawih</option>
                                            <option value="4">Amal Idul Fitri</option>
                                            <option value="5">Amal Idul Adha</option>
                                            <option value="6">Donatur Tetap</option>
                                            <option value="7">Donatur Tidak Tetap</option>
                                            <option value="8">Infaq</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control inputMask" id="editJumlah" name="editJumlah"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control datepicker" id="editTanggal" name="editTanggal"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="editKeterangan" id="editKeterangan" rows="3"></textarea>
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
<script>
$(document).ready(function(){
    var url = "<?= site_url($data) ?>";
    // DateRange (Date Main)
    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });

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

    $(".datepicker").datepicker({
        format: "dd-MM-yyyy",
        autoclose: true,
        todayBtn: "linked",
        todayHighlight: true
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
        var id = $(this).data('id');
        console.log(tanggal);
        // $item.find("input[id$='no']").val();
        // alert("hai");
        $.confirm({
            theme: 'supervan',
            title: 'Hapus Data Ini ?',
            content: 'Hapus data zakat ' + tanggal,
            autoClose: 'Cancel|5000',
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