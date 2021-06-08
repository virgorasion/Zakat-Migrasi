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
                            <th>Alamat</th>
                            <th>Wali</th>
                            <th>No HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Keterangan</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($getSantri as $data): ?>
                        <tr>
                            <td><?=$data->nama?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->nama_wali?></td>
                            <td><?=$data->nomor_hp?></td>
                            <td><?=$data->tgl_lahir?></td>
                            <td class="text-center"><?=($data->tanggal_keluar != NULL)? '<span class="label label-info">Santri Keluar</span>': '<span class="label label-success">Santri Aktif</span>'?></td>
                            <td><a href="<?=site_url("Raport/").$data->id?>"><button title="Raport Santri" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></button></a> <a href="#"><button title="Edit Santri" class="btnEdit btn btn-xs btn-info"><i class="fa fa-gear"></i></button></a></td>
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
</script>