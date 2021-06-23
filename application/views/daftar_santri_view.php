<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Santri & Penilaian
        </h1>
        <ol class="breadcrumb">
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><a href="Tambah_santri"><button class="btn btn-primary">Tambah Santri</button></a>
                </h3>

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
                            <th>Nama Santri</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Wali</th>
                            <th>No HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Kode Akses</th>
                            <th>Keterangan</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($getSantri as $data): ?>
                        <tr>
                            <td><?=$data->nama?></td>
                            <td><?=$data->nama_kelas?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->nama_wali?></td>
                            <td><?=$data->nomor_hp?></td>
                            <td><?=$data->tgl_lahir?></td>
                            <td><?=$data->kode_akses?></td>
                            <td class="text-center">
                                <?=($data->tanggal_keluar != NULL)? '<span class="label label-danger">Santri Keluar</span>': '<span class="label label-success">Santri Aktif</span>'?>
                            </td>
                            <td>
                                <a href="<?=site_url("Raport/").$data->id?>"><button title="Raport Santri" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></button></a> 
                                <a href="#"><button title="Edit Santri" class="btnEdit btn btn-xs btn-info" data-id="<?=$data->id?>" data-nama="<?=$data->nama?>" data-kelas="<?=$data->id_kelas?>" data-alamat="<?=$data->alamat?>" data-wali="<?=$data->nama_wali?>" data-nomor="<?=$data->nomor_hp?>" data-lahir="<?=$data->tgl_lahir?>" data-keluar="<?=$data->tanggal_keluar?>"><i class="fa fa-gear"></i></button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- Modal Edit Mapel -->
        <div class="modal fade" id="modalEditSantri">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Santri</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/update_santri")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="editNama">Nama Santri</label>
                                <input required type="text" name="editNama" id="editNama" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editNama">
                            </div>
                            <div class="form-group">
                                <label for="editKelas">Kelas</label>
                                <select class="form-control" name="editKelas" id="editKelas">
                                    <?php foreach($getKelas as $kelas): ?>
                                    <option value="<?=$kelas->id?>"><?=$kelas->nama_kelas?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editAlamat">Alamat</label>
                                <input required type="text" name="editAlamat" id="editAlamat" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editAlamat">
                            </div>
                            <div class="form-group">
                                <label for="editWali">Wali Santri</label>
                                <input required type="text" name="editWali" id="editWali" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editWali">
                            </div>
                            <div class="form-group">
                                <label for="editNope">No HP</label>
                                <input required type="text" name="editNope" id="editNope" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editNope">
                            </div>
                            <div class="form-group">
                                <label for="editLahir">Tanggal Lahir</label>
                                <input required type="text" name="editLahir" id="editLahir" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editLahir">
                            </div>
                            <div class="form-group">
                              <label for="editKeluar">Tanggal Keluar</label>
                              <input type="text" class="form-control" name="editKeluar" id="editKeluar" aria-describedby="editKeluarInfo" placeholder="Tanggal Keluar">
                              <small id="editKeluarInfo" class="form-text text-muted text-danger">Tidak Perlu Diisi Jika Santri Masih Aktif</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idEditSantri" id="idEditSantri">
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

    $("#datatable").on("click",".btnEdit", function(){
        let id = $(this).data("id");
        let nama = $(this).data("nama");
        let alamat = $(this).data("alamat");
        let kelas = $(this).data("kelas");
        let wali = $(this).data("wali");
        let nomor = $(this).data("nomor");
        let lahir = $(this).data("lahir");
        let keluar = $(this).data("keluar");
        $("#modalEditSantri").modal("show");
        $("#idEditSantri").val(id);
        $("#editNama").val(nama);
        $("#editAlamat").val(alamat);
        $("#editKelas").val(kelas);
        $("#editNope").val(nomor);
        $("#editWali").val(wali);
        $("#editLahir").val(lahir);
        $("#editKeluar").val(keluar);
    })
</script>