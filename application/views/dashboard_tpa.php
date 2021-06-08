<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard TPA
            <small>Miftahul Jannah</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Murid Laki-laki</span>
                        <span class="info-box-number">21</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Murid Perempuan</span>
                        <span class="info-box-number">40</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">total murid</span>
                        <span class="info-box-number">61</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">total alumni</span>
                        <span class="info-box-number">25</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Murid Laki-Laki</h3>

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Kelas</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Oki Ferdiansyah</td>
                                    <td>21</td>
                                    <td>Kitab</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Sahrul Ramadhan</td>
                                    <td>18</td>
                                    <td>Kitab</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Ikmal Amrillah</td>
                                    <td>18</td>
                                    <td>Kitab</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Murid Perempuan</h3>

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Kelas</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nur Aini</td>
                                    <td>20</td>
                                    <td>Al-quran</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Fatin Zahidah Mas'ud</td>
                                    <td>20</td>
                                    <td>Qiroah</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Vinka Rusdiana</td>
                                    <td>21</td>
                                    <td>Al-quran</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.box -->
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Guru Pengajar</h3>

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Telp</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Misbachul Chamim</td>
                                    <td>Kitab</td>
                                    <td>08517284157</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Choirul Anam</td>
                                    <td>Iqro'</td>
                                    <td>0851536346</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>M Nur Fauzan W</td>
                                    <td>Kitab</td>
                                    <td>08517284157</td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Kelas</h3>

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kelas</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Al-quran</td>
                                    <td>25</td>
                                    <td><span class="label label-success">Tersedia</span></td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Iqro</td>
                                    <td>50</td>
                                    <td><span class="label label-warning">Penuh</span></td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td>Kitab</td>
                                    <td>10</td>
                                    <td><span class="label label-success">Tersedia</span></td>
                                    <td><a href="#"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
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