<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <button type="button" class="btn btn-primary">Kembali</button> Form Raport Santri
        </h1>
        <ol class="breadcrumb">
        </ol>
    </section>

    <!-- <?= var_dump($getRaportSantri); ?> -->
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Laporan Hasil Mengaji: <?=$getRaportSantri[0]->nama?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?=site_url("Santri_ctrl/post_raport")?>" method="post">
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 30%">Matapelajaran</th>
                            <th>Nilai</th>
                            <th>Label</th>
                        </tr>
                        <?php $no=1; foreach($dataMapelByKelas as $data): ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data->nama?></td>
                            <td>
                                <input type="text" name="mapel[]" placeholder="Nilai <?=$data->nama?>"
                                    class="form-control" id="mapel<?=$no?>">
                                <input type="hidden" name="idMapel[]" value="<?=$data->id?>">
                            </td>
                            <td><span id="labelNilai<?=$no?>" class="badge"></span></td>
                        </tr>
                        <?php $no++; endforeach ?>

                    </table>
                    <br>
                    <input type="hidden" name="idSantri" value="<?=$idSantri?>">
                    <input type="hidden" name="idGuru" value="<?=$dataKelasBySantri[0]->id_guru?>">
                    <button type="submit" class="btn btn-success col-sm-12">Simpan Nilai</button>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Riwayat Laporan Hasil Mengaji: <?=$getRaportSantri[0]->nama?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th style="width: 30%">Kelas</th>
                        <th>Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
                    </tr>
                    <?php $no=1; foreach($getRaportSantri as $data): ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$data->nama_kelas?></td>
                        <td><?=$data->nama_guru?></td>
                        <td><?=$data->mapel?></td>
                        <td><?=$data->nilai?></td>
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
<script>
    for (let i = 1; i < <?= $dataMapelLength + 1 ?> ; i++) {
        $("#mapel" + i).keyup(function () {
            if ($(this).val() < 25) {
                $("#labelNilai" + i).text("D");
                $("#labelNilai" + i).addClass("bg-red");
                $("#labelNilai" + i).removeClass("bg-green");
                $("#labelNilai" + i).removeClass("bg-yellow");
                $("#labelNilai" + i).removeClass("bg-blue");
            } else if ($(this).val() < 50) {
                $("#labelNilai" + i).text("C");
                $("#labelNilai" + i).removeClass("bg-red");
                $("#labelNilai" + i).addClass("bg-yellow");
                $("#labelNilai" + i).removeClass("bg-blue");
                $("#labelNilai" + i).removeClass("bg-green");
            } else if ($(this).val() < 75) {
                $("#labelNilai" + i).text("B");
                $("#labelNilai" + i).removeClass("bg-red");
                $("#labelNilai" + i).removeClass("bg-yellow");
                $("#labelNilai" + i).addClass("bg-blue");
                $("#labelNilai" + i).removeClass("bg-green");
            } else if ($(this).val() <= 100) {
                $("#labelNilai" + i).text("A");
                $("#labelNilai" + i).removeClass("bg-red");
                $("#labelNilai" + i).removeClass("bg-yellow");
                $("#labelNilai" + i).removeClass("bg-blue");
                $("#labelNilai" + i).addClass("bg-green");
            }
        });
    }
</script>