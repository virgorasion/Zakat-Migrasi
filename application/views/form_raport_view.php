<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
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
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Laporan Hasil Mengaji: <?=$getRaportSantri[0]->nama?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th style="width: 30%">Matapelajaran</th>
                        <th>Nilai</th>
                        <th>Label</th>
                    </tr>
                    <?php $no=1; foreach($getMapel as $data): ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$data->nama?></td>
                        <td>
                            <input type="text" name="mapel<?=$data->id?>" placeholder="Nilai <?=$data->nama?>" class="form-control">
                        </td>
                        <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <?php $no++; endforeach ?>
                   
                </table>
            </div>
            <!-- /.box-body -->
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