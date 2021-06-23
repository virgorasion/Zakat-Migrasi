<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Riwayat Absensi
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

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
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status Kehadiran</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($dataRiwayatAbsensi as $data): ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data->nama?></td>
                            <td><?=$data->nama_kelas?></td>
                            <td><?=($data->absen == "H")? "<span class='label label-success'>Hadir</span>" : (($data->absen == "I")? "<span class='label label-warning'>Izin</span>" : "<span class='label label-danger'>Tidak Hadir</span>")?></td>
                            <td><?=date_format(date_create($data->tanggal),"d-F-Y")?></td>
                        </tr>
                        <?php $no++; endforeach ?>
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

        <!-- Modal Tambah Mapel -->
        <div class="modal fade" id="modalTambahMapel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Mapel</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/post_mapel")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="addMapel">Nama Mapel</label>
                              <input required type="text" name="addMapel" id="addMapel" class="form-control" placeholder="Nama Matapelajaran" aria-describedby="AddMapel">
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
        <div class="modal fade" id="modalEditMapel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Mapel</h4>
                    </div>
                    <form action="<?=site_url("Santri_ctrl/update_mapel")?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="editMapel">Nama Mapel</label>
                              <input required type="text" name="editMapel" id="editMapel" class="form-control" placeholder="Nama Matapelajaran" aria-describedby="editMapel">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idEditMapel" id="idEditMapel">
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

    $("#datatable").on("click",".btnEdit",function(){
        let id = $(this).data("id");
        let nama = $(this).data('nama');
        $("#modalEditMapel").modal("show");
        $("#idEditMapel").val(id);
        $("#editMapel").val(nama);
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