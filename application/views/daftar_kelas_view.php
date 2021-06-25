<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Kelas
            <!-- <small>it all starts here</small> -->
        </h1>
        <ol class="breadcrumb">
            <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li> -->
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><button type="button" class="btn btn-primary" data-target="#modalTambahKelas"
                        data-toggle="modal">Tambah Kelas</button></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Metode</th>
                            <th>Tingkatan</th>
                            <th>Ustadz/Ustadzah</th>
                            <th>Jumlah Santri</th>
                            <th>Keterangan</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataDaftarKelas as $data): ?>
                        <tr>
                            <td><?=$data->nama_kelas?></td>
                            <td><?=$data->metode?></td>
                            <td><?=$data->tingkatan?></td>
                            <td><?=$data->nama_guru?></td>
                            <td><?=$data->jumlah_santri?></td>
                            <td class="text-center"><?=$data->keterangan?></td>
                            <td>
                                <a href="#"><button title="Penilaian Kelas" data-id="<?=$data->id?>" data-toggle="modal" data-target="#modalPenilaian"
                                        class="btn btn-xs btn-warning btnPenilaian"><i
                                            class="fa fa-pencil-square-o"></i></button></a>
                                <a href="#"><button title="Edit Kelas" class="btnEdit btn btn-xs btn-info" data-id="<?=$data->id?>" data-nama="<?=$data->nama_kelas?>" data-metode="<?=$data->metode?>" data-tingkatan="<?=$data->tingkatan?>" data-guru="<?=$data->id_guru?>" data-keterangan="<?=$data->keterangan?>"><i class="fa fa-gear"></i></button></a>
                                <a href="#"><button title="Hapus Kelas" class="btnDel btn btn-xs btn-danger" data-id="<?=$data->id?>"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer">
                Footer
            </div> -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

        <!-- Modal Tambah Kelas -->
        <div class="modal fade" id="modalTambahKelas">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Kelas</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/post_kelas")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="addKelas">Nama Kelas</label>
                              <input required type="text" name="addKelas" id="addKelas" class="form-control" placeholder="Nama Kelas" aria-describedby="tambahKelas">
                            </div>
                            <div class="form-group">
                              <label for="addMetode">Metode</label>
                              <input required type="text" name="addMetode" id="addMetode" class="form-control" placeholder="Metode" aria-describedby="tambahKelas">
                            </div>
                            <div class="form-group">
                              <label for="addTingkatan">Tingkatan</label>
                              <input required type="text" name="addTingkatan" id="addTingkatan" class="form-control" placeholder="Tingkatan" aria-describedby="tambahKelas">
                            </div>
                            <div class="form-group">
                              <label for="addGuru">Ustadz/Ustadzah</label>
                              <select class="form-control" name="addGuru" id="addGuru">
                                <option disabled selected value>-Pilih Ustadz/Ustadzah-</option>
                                <?php foreach($getDataGuru as $data): ?>
                                <option value="<?=$data->id?>"><?=$data->nama?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="addKeterangan">Keterangan</label>
                              <input type="text" name="addKeterangan" id="addKeterangan" class="form-control" placeholder="Keterangan" aria-describedby="tambahKelas">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Edit Kelas -->
        <div class="modal fade" id="modalEditKelas">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Kelas</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/update_kelas")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="editKelas">Nama Kelas</label>
                              <input required type="text" name="editKelas" id="editKelas" class="form-control" placeholder="Nama Kelas" aria-describedby="tambahKelas">
                            </div>
                            <div class="form-group">
                              <label for="editMetode">Metode</label>
                              <input required type="text" name="editMetode" id="editMetode" class="form-control" placeholder="Metode" aria-describedby="tambahKelas">
                            </div>
                            <div class="form-group">
                              <label for="editTingkatan">Tingkatan</label>
                              <input required type="text" name="editTingkatan" id="editTingkatan" class="form-control" placeholder="Tingkatan" aria-describedby="tambahKelas">
                            </div>
                            <div class="form-group">
                              <label for="editGuru">Ustadz/Ustadzah</label>
                              <select class="form-control" name="editGuru" id="editGuru">
                                <option disabled selected value>-Pilih Ustadz/Ustadzah-</option>
                                <?php foreach($getDataGuru as $data): ?>
                                <option value="<?=$data->id?>"><?=$data->nama?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="addKeterangan">Keterangan</label>
                              <input type="text" name="editKeterangan" id="editKeterangan" class="form-control" placeholder="Keterangan" aria-describedby="tambahKelas">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idKelasEdit" id="idKelasEdit">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Penilaian -->
        <div class="modal fade" id="modalPenilaian">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Penilaian</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/post_mapel_kelas")?>" method="post">
                        <div class="modal-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Mapel</th>
                                    <th>Mapel Yang Diambil</th>
                                </tr>
                            </thead>
                            <tbody class="dataAjax">
                                <?php foreach($dataMapel as $mapel): ?>
                                <tr>
                                    <td><?=$mapel->nama?></td>
                                    <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input flat-green" name="addMapelKelas[]" id="mapel<?=$mapel->id?>" value="<?=$mapel->id?>">
                                            <input type="hidden" name="rombel<?=$mapel->id?>" id="rombel<?=$mapel->id?>">
                                          </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idKelas" id="idKelas" value="">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script>
    $('#datatable').DataTable({
        "responsive": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });

    $(".btnEdit").click(function(){
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let tingkatan = $(this).data('tingkatan');
        let metode = $(this).data("metode");
        let guru = $(this).data('guru');
        let keterangan = $(this).data("keterangan");
        $("#modalEditKelas").modal("show");
        $("#idKelasEdit").val(id);
        $("#editKelas").val(nama);
        $("#editMetode").val(metode);
        $("#editTingkatan").val(tingkatan);
        $("#editGuru").val(guru);
        $("#editKeterangan").val(keterangan);
    });

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

    $(".btnPenilaian").click(function(){
        let id = $(this).data("id");
        $("input[type=checkbox]").iCheck("uncheck");
        $("#idKelas").val(id);
        $.ajax({
            url: "<?=site_url("Santri_ctrl/getMapelKelas")?>",
            type: "POST",
            data: {key:id},
            success:function(data){
                let res = JSON.parse(data);
                $.each(res, function(i){
                    let idMapel = "#mapel"+res[i].id;
                    $("rombel"+res[i].id).val(res[i].id_rombel);
                    $(idMapel).iCheck('check');
                });
            }
        })
    });

    $('#datatable').on("click",".btnDel",function () {
        var id = $(this).data('id');
        $.confirm({
            theme: 'supervan',
            title: 'Hapus Kelas',
            content: 'Apakah Anda Yakin Ingin Menghapus Kelas Ini ? ',
            autoClose: 'Cancel|10000',
            buttons: {
                Cancel: function () {},
                delete: {
                    text: 'Delete',
                    action: function () {
                        window.location = "<?=site_url('Santri_ctrl/delete_kelas/')?>" + id
                    }
                }
            }
        });
    });
</script>