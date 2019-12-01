<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Perlengkapan
            <!-- <small>it all starts here</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol> -->
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
        <?php } ?>
        <?php if (isset($_SESSION['fail'])) { ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
            <h5>
                <span class='glyphicon glyphicon-remove'></span> Info!</h5>
            <?php echo $_SESSION['fail']; ?>
        </div>
        <?php } ?>

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Perlengkapan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row col-md-12">
                    <div class="col-md-2">
                        <select class="form-control" name="select_ruangan" id="select_ruangan">
                            <option value="0">Semua</option>
                            <?php foreach($data_ruangan as $data_ruang){?>
                            <option value="<?=$data_ruang->id?>"><?= $data_ruang->nama_ruang ?></option>
                            <?php } ?>
                        </select>
                        <br>
                    </div>
                    <button class="btn btn-primary btn-flat" id="addRuangan">Tambah Ruangan</button>
                    <button class="btn btn-primary btn-flat" id="addPerlengkapan">Tambah Perlengkapan</button>
                </div>
                <table id="table_perlengkapan" class="table table-bordered table-striped table-responsive table-hover"
                    width="100%">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tempat</td>
                            <td>Nama Barang</td>
                            <td class="min-tablet">Kondisi</td>
                            <td class="min-tablet">Jumlah</td>
                            <td class="min-tablet">Aksi</td>
                        </tr>
                    </thead>
                    <tbody id="content_table">

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- Start Modal Edit -->
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Perlengkapan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('Perlengkapan_ctrl/updateDataPerlengkapan');?>" method="POST">
                            <div class="form-group">
                                <label for="namaEdt">Nama Barang :</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                    placeholder="Contoh: Sapu, Kipas Angin, AC">
                            </div>
                            <div class="form-group">
                                <label for="pembelianEdt">Kondisi :</label>
                                <select class="form-control" name="kondisi_barang" id="kondisi_barang">
                                    <option >Pilih</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Sedikit Rusak">Sedikit Rusak</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zakatFitrahEdt">Jumlah :</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control"
                                    placeholder="Contoh: 2">
                            </div>
                        <input type="hidden" name="id_perlengkapan" id="id_perlengkapan" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Start Modal Tambah -->
        <div class="modal fade" id="modalTambahPerlengkapan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tambah Perlengkapan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('Perlengkapan_ctrl/tambahDataPerlengkapan');?>" method="POST">
                            <div class="form-group">
                                <label for="namaEdt">Nama Barang :</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                    placeholder="Contoh: Sapu, Kipas Angin, AC">
                            </div>
                            <div class="form-group">
                                <label for="pembelianEdt">Kondisi :</label>
                                <select class="form-control" name="kondisi_barang" id="kondisi_barang">
                                    <option >Pilih</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Sedikit Rusak">Sedikit Rusak</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zakatFitrahEdt">Jumlah :</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control"
                                    placeholder="Contoh: 2">
                            </div>
                            <input type="hidden" name="id_perlengkapan" id="id_perlengkapan" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Start Modal Tambah -->
        <div class="modal fade" id="modalTambahRuangan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tambah Perlengkapan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('Perlengkapan_ctrl/updateDataPerlengkapan');?>" method="POST">
                            <div class="form-group">
                                <label for="namaEdt">Nama Barang :</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                    placeholder="Contoh: Sapu, Kipas Angin, AC">
                            </div>
                            <div class="form-group">
                                <label for="pembelianEdt">Kondisi :</label>
                                <select class="form-control" name="kondisi_barang" id="kondisi_barang">
                                    <option >Pilih</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Sedikit Rusak">Sedikit Rusak</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zakatFitrahEdt">Jumlah :</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control"
                                    placeholder="Contoh: 2">
                            </div>
                            <input type="hidden" name="id_perlengkapan" id="id_perlengkapan" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
$this->load->view('template/js');
?>
<script>
    $(document).ready(function () {
        var table_semua_data_perlengkapan = "";
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

        function tableSemuaDataPerlengkapan() {
            let url = "<?= site_url('Perlengkapan_ctrl/dataSemuaPerlengkapan')?>";
            table_semua_data_perlengkapan = $("#table_perlengkapan").DataTable({
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
                        "data": "nama_ruang"
                    },
                    {
                        "data": "nama_barang"
                    },
                    {
                        "data": "kondisi"
                    },
                    {
                        "data": "jumlah"
                    },
                    {
                        "data": "action"
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
            return table_semua_data_perlengkapan;
        }

        function tablePerlengkapanTiapRuangan(ruangan) {
            let url = "<?= site_url('Perlengkapan_ctrl/dataPerlengkapanTiapRuangan/')?>" + ruangan;
            table_semua_data_perlengkapan = $("#table_perlengkapan").DataTable({
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
                        "data": "nama_ruang"
                    },
                    {
                        "data": "nama_barang"
                    },
                    {
                        "data": "kondisi"
                    },
                    {
                        "data": "jumlah"
                    },
                    {
                        "data": "action"
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
            return table_semua_data_perlengkapan;
        }
        // end setup datatables
        tableSemuaDataPerlengkapan();

        $("#select_ruangan").on("change", function (item) {
            // console.log($(this).val());
            let ruangan = $(this).val();
            if (ruangan == 0) {
                if ($.fn.DataTable.isDataTable("#table_perlengkapan") == true) {
                    table_semua_data_perlengkapan.destroy();
                    tableSemuaDataPerlengkapan();
                } else {
                    tableSemuaDataPerlengkapan();
                }
            } else {
                if ($.fn.DataTable.isDataTable("#table_perlengkapan") == true) {
                    table_semua_data_perlengkapan.destroy();
                    tablePerlengkapanTiapRuangan(ruangan)
                } else {
                    tablePerlengkapanTiapRuangan(ruangan);
                }
            }
        });

        $(".alert").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert").slideUp(500);
        });

        $("#addPerlengkapan").on("click", function(){
            $("#modalTambahPerlengkapan").modal("show");
        })

        $("#addRuangan").on("click", function(){
            $("#modalTambahRuangan").modal("show");
        })

        $("#table_perlengkapan").on("click", ".edit_data", function(){
            let id_perlengkapan = $(this).data("id");
            let nama_barang = $(this).data("barang");
            let kondisi = $(this).data("kondisi");
            let jumlah = $(this).data("jumlah");
            $("#modalEdit").modal("show");
            $("#modalEdit").find("#id_perlengkapan").val(id_perlengkapan);
            $("#modalEdit").find("#nama_barang").val(nama_barang);
            $("#modalEdit").find("#kondisi_barang").val(kondisi);
            $("#modalEdit").find("#jumlah").val(jumlah);
        })

        $('#table_perlengkapan').on('click', '.delete_data', function () {
            let barang = $(this).data("barang");
            let ruangan = $(this).data("ruang");
            let id = $(this).data("id");
            $.confirm({
                theme: 'supervan',
                title: 'Hapus Data Perlengkapan',
                content: 'Ruangan : ' + ruangan + '<br> Barang : ' + barang,
                autoClose: 'Cancel|10000',
                buttons: {
                    Cancel: function () {},
                    delete: {
                        text: 'Delete',
                        action: function () {
                            window.location =
                                "<?=site_url('Perlengkapan_ctrl/hapusDataPerlengkapan/')?>" +
                                id;
                        }
                    }
                }
            });
        });
    })
</script>