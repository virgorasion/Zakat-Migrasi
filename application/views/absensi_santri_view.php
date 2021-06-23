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

        <?php foreach($dataKelas as $kelas): ?>
        <div class="boxAbsensi box box-primary collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title" data-widget="collapse" style="cursor:pointer"><?=$kelas->nama_kelas?> | Metode: <?=$kelas->metode?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?=site_url("Santri_ctrl/post_absensi")?>" method="post">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Santri</th>
                            <th>Alamat</th>
                            <th>No. HP Wali</th>
                            <th class="text-center" style="width:10%">Hadir</th>
                            <th class="text-center" style="width:10%">Izin</th>
                            <th class="text-center" style="width:15%">Tidak Hadir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; $dataSantri = $this->tpa_model->getSantri($kelas->id); foreach($dataSantri as $santri): ?>
                        <tr>
                            <input type="hidden" name="idSantri" value="<?=$santri->id?>">
                            <td><?=$no?></td>
                            <td><?=$santri->nama?></td>
                            <td><?=$santri->alamat?></td>
                            <td><?=$santri->nomor_hp?></td>
                            <td class="text-center">
                                <input type="radio" class="flat-green" name="absen[]" id="hadir[]" value="H" >
                            </td>
                            <td class="text-center">
                                <input type="radio" class="flat-blue" name="absen[]" id="izin[]" value="I" >
                            </td>
                            <td class="text-center">
                                <input type="radio" class="flat-red" name="absen[]" id="alfa[]" value="A" >
                            </td>
                        </tr>
                    <?php $no++; endforeach ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success pull-right">Simpan Absensi</button>
                </form>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <?php endforeach ?>

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

    $(".box-header").click(function(){
        if ($(".box-title").hasClass("fa-minus")) {
            $(".box-title").removeClass("fa-minus");
            
        }else{
            $(".box-title").removeClass("fa-plus");
        }
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass   : 'iradio_flat-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>