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
            <small>Miftahul Jannah</small>
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
                <h3 class="box-title">Daftar Pembukuan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

                <!-- FORM VALIDATION ON TABS -->
                <!--===================================================-->
                <div class="tab-base">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="forms-validation.html#demo-bsc-tab-1" data-toggle="tab">
                                <i class="fa fa-history"></i> Informasi</a>
                        </li>
                        <li>
                            <a href="forms-validation.html#demo-bsc-tab-2" data-toggle="tab">
                                <i class="fa fa-edit"></i> Tambah Data</a>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div id="demo-bv-bsc-tabs" class="form-horizontal">
                        <div class="tab-content">
                            <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th class="min-tablet">Admin</th>
                                            <th class="min-tablet">Kategori</th>
                                            <th class="min-tablet">Jumlah</th>
                                            <th class="min-desktop">Tanggal</th>
                                            <th class="min-desktop">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total :</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Start Second Tab -->
                            <div class="tab-pane fade" id="demo-bsc-tab-2">
                                <h4 class="mar-btm text-thin">Tambah Data</h4>
                                <hr>
                                <form action="<?php echo site_url('kas_ctrl/tambah'); ?>" method="POST">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama :</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="addNama" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Kategori</label>
                                        <div class="col-lg-7">
                                            <select class="form-control" name="addKategori" id="addKategori">
                                                    <option value="6">Donatur Tetap</option>
                                                    <option value="7">Donatur Tidak Tetap</option>
                                                    <option value="8">Infaq</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tanggal :</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control datepicker" name="addTanggal" placeholder="Tanggal" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Jumlah</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control inputMask" name="addJumlah" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-lg-offset-3">
                                        <input type="submit" value="Submit" class="btn btn-flat btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!-- END FORM VALIDATION ON TABS -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
$(document).ready(function (){
    $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('Kas_ctrl/ajaxTable') ?>",
            "type": "POST"
        },
        "columnDefs": [
            {
            "targets": [0],
            "orderable":false,
        },
    ],
        "paging": true,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.inputMask').inputmask('decimal',{
        digits: 2,
        placeholder: "0",
        digitsOptional: true,
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true,
        rightAlign: false,
        prefix: "Rp "
    });

    $(".datepicker").datepicker({
        format: "dd-MM-yyyy",
        autoclose: true,
        todayBtn: "linked",
        todayHighlight: true
    });
    $('#datatable').on('click','[id^=btnEdit]',function(){
        var $test = $(this).closest('tr');
        var $nama = $test.find('.nama').text().trim();
        var $jumlah = $test.find('.jumlah').text().trim();
        var $id = $test.find('#id').val().trim();
        var $tgl = $test.find('.tanggal').text().trim();
        var $ket = $test.find('.keterangan').text().trim();
        $('#formEdit').find('#editPetugas').val($nama);
        $('#formEdit').find('#editJumlah').val($jumlah);
        $('#formEdit').find('#editTanggal').val($tgl);
        $('#formEdit').find('#editKeterangan').val($ket);
        $('#formEdit').find('#idEdit').val($id);
        });

        $('#datatable').on('click', '[id^=btnDelete]', function () {
            var $item = $(this).closest("tr");
            var $nama = $item.find(".tanggal").text();
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
                            window.location = "Kas_ctrl/hapus/" + $item.find("#id").val();
                        }
                    }
                }
            });
        });
    });
</script>