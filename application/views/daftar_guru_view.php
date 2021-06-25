<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Ustadz & Ustadzah
        </h1>
        <ol class="breadcrumb">
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><a href="#"><button data-toggle="modal" data-target="#modalTambahGuru" class="btnAdd btn btn-primary">Tambah Ustadz</button></a>
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
                            <th>Nama Ustadz/Ustadzah</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Syahadah</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataDaftarGuru as $data): ?>
                        <tr>
                            <td><?=$data->nama?></td>
                            <td><?=$data->no_telp?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->syahadah?></td>
                            <td>
                                <a href="#"><button title="Edit Ustadz" class="btnEdit btn btn-xs btn-info" data-nama="<?=$data->nama?>" data-telp="<?=$data->no_telp?>" data-alamat="<?=$data->alamat?>" data-syahadah="<?=$data->syahadah?>"><i class="fa fa-gear"></i></button></a>
                                <a href="#"><button title="Hapus Ustadz" class="btnDel btn btn-xs btn-info" data-id="<?=$data->id?>"><i class="fa fa-trash"></i></button></a>
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
         <div class="modal fade" id="modalTambahGuru">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Ustadz/Ustadzah</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/post_guru")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="addNama">Nama</label>
                                <input required type="text" name="addNama" id="addNama" class="form-control"
                                    placeholder="Nama Ustadz/Ustadzah" aria-describedby="addNama">
                            </div>
                            <div class="form-group">
                                <label for="addAlamat">Alamat</label>
                                <input required type="text" name="addAlamat" id="addAlamat" class="form-control"
                                    placeholder="Alamat Ustadz/Ustadzah" aria-describedby="addAlamat">
                            </div>
                            <div class="form-group">
                                <label for="addNope">No HP</label>
                                <input required type="text" name="addNope" id="addNope" class="form-control"
                                    placeholder="No Ustadz/Ustadzah" aria-describedby="addNope">
                            </div>
                            <div class="form-group">
                              <label for="addSyahadah">Kepemilikan Syahadah</label>
                              <select class="form-control" name="addSyahadah" id="addSyahadah">
                                <option value="punya">Punya</option>
                                <option value="tidak">Tidak Punya</option>
                              </select>
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

        <!-- Modal Edit Mapel -->
        <div class="modal fade" id="modalEditGuru">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Ustadz</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/update_guru")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="editNama">Nama</label>
                                <input required type="text" name="editNama" id="editNama" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editNama">
                            </div>
                            <div class="form-group">
                                <label for="editAlamat">Alamat</label>
                                <input required type="text" name="editAlamat" id="editAlamat" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editAlamat">
                            </div>
                            <div class="form-group">
                                <label for="editNope">No HP</label>
                                <input required type="text" name="editNope" id="editNope" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editNope">
                            </div>
                            <div class="form-group">
                                <label for="editSyahadah">Syahadah</label>
                                <input required type="text" name="editNope" id="editNope" class="form-control"
                                    placeholder="Nama Santri" aria-describedby="editNope">
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
        let nama = $(this).data("nama");
        let alamat = $(this).data("alamat");
        let kelas = $(this).data("kelas");
        let telp = $(this).data("telp");
        $("#modalEditSantri").modal("show");
        $("#editNama").val(nama);
        $("#editAlamat").val(alamat);
        $("#editKelas").val(kelas);
        $("#editNope").val(telp);
    })

    $('#datatable').on("click",".btnDel",function () {
        var id = $(this).data('id');
        $.confirm({
            theme: 'supervan',
            title: 'Hapus Ustaz',
            content: 'Apakah Anda Yakin Ingin Menghapus Ustadz Ini ? ',
            autoClose: 'Cancel|10000',
            buttons: {
                Cancel: function () {},
                delete: {
                    text: 'Delete',
                    action: function () {
                        window.location = "<?=site_url('Santri_ctrl/delete_guru/')?>" + id
                    }
                }
            }
        });
    });
</script>