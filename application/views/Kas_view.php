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
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Examples</a>
            </li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

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
                                <i class="fa fa-history"></i> Information</a>
                        </li>
                        <li>
                            <a href="forms-validation.html#demo-bsc-tab-2" data-toggle="tab">
                                <i class="fa fa-edit"></i> Address</a>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <form id="demo-bv-bsc-tabs" class="form-horizontal" action="#" method="post">
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
                                        <tr>
                                            <!-- <td class="no">
                                                <?php echo $no; ?>
                                            </td>
                                            <td class="nama">
                                                <?php echo $row->nama; ?>
                                            </td>
                                            <td class="data_alamat">
                                                <?php echo $row->alamat;?>
                                            </td>
                                            <td class="zakat_fitrah">
                                                <?php echo $row->zakat_fitrah;?> Kg
                                            </td>
                                            <td class="beli">
                                                <?php echo $beli;?>
                                            </td>
                                            <td>
                                                <?php echo $tanggal;?>
                                            </td>
                                            <td align="center">
                                                <input type="hidden" name="nomor" id="id" value="<?php echo $row->nomor ?>">
                                                <input type="hidden" name="data_nama" id="data_nama" value="<?php echo $row->nama ?>">
                                                <?php if ($this->session->userdata("17view")=="1"){?>
                                                <a href="#">
                                                    <span data-placement='top' data-toggle='tooltip' title='Struk'></span>
                                                    <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                                                        <span class='glyphicon glyphicon-print'></span>
                                                    </button>
                                                </a>
                                                <?php } ?>
                                                <?php if ($this->session->userdata("17edit")=="1"){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                                                    <button id="btnEdit" class='btn btn-warning btn-xs btnEdit' data-title='Edit' data-toggle='modal' data-target='#modalEdit'>
                                                        <span class='glyphicon glyphicon-pencil'></span>
                                                    </button>
                                                </a>
                                                <?php } ?>
                                                <?php if ($this->session->userdata("17delete")=="1"){?>
                                                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' id="btnDelete">
                                                        <span class='glyphicon glyphicon-remove'></span>
                                                    </button>
                                                </span>
                                                <?php } ?>

                                            </td> -->
                                        </tr>
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
                                <h4 class="mar-btm text-thin">Second Tab</h4>
                                <hr>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">City</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
$this->load->view('template/controlside');
$this->load->view('template/js');
?>