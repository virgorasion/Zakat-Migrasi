<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jadwal Tarawih
      <small><?=$_SESSION['nama']?></small>
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i>
          </button>
        </div>
        <form method="post" action="<?php echo site_url("jadwal_tarawih_ctrl/index") ?>" id="formsearch">
          <div class="col-sm-12">
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2" btn-lg btn-block">Tambah Jadwal</button>
            <div class="form-inline col-md-3">
              Dari :  
              <input type="text" class="form-control" id="t1" name="t1" placeholder="YYYY-MM-DD" value="<?= @$t1 ?>" autocomplete="off">
            </div>
            <div class="form-inline col-md-3">
              Sampai :
              <input type="text" class="form-control" id="t2" name="t2" placeholder="YYYY-MM-DD" value="<?= @$t2 ?>" autocomplete="off">
            </div>
            <div class="col-sm-1">
              <button type="submit" class="btn btn-primary" id="btnSearch">
                Search</button>
            </div>
            <h3 class="box-title col-sm-1">
              <button type="button" class="btn btn-default" id="btnPrint">
                <i class="fa fa-print"></i> Print</button>
            </h3>
          </div>
        </form>
      </div>
      <div class="box-body">
        <table id="tableJadwal" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Imam</th>
            <th>Bilal</th>
            <th>Ceramah</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($datas as $data){ ?>
          <tr>
            <td><?=$no?></td>
            <td><?=$data->tgl?></td>
            <td><?=$data->imam?></td>
            <td><?=$data->bilal?></td>
            <td><?=$data->ceramah?></td>
            <td>
            <?php if ($this->session->userdata("17edit") == "1") { ?>
                  <a href='#'>
                    <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                    <button id="btnEdit" class='btn btn-warning btn-xs btnEdit' data-title='Edit'
                      data-toggle='modal' data-target='#modalEdit'>
                      <span class='glyphicon glyphicon-pencil'></span>
                    </button>
                  </a>
                  <?php 
                } ?>
                  <?php if ($this->session->userdata("17delete") == "1") { ?>
                  <span data-placement='top' data-toggle='tooltip' title='Delete'>
                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' id="btnDelete">
                      <span class='glyphicon glyphicon-remove'></span>
                    </button>
                  </span>
                  <?php 
                } ?>
            </td>
          </tr>
          <?php $no++; } ?>
        </tbody>
        </table>
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

<script>
$(document).ready(function(){
    $('#tableJadwal').dataTable({
      language: {
        infoEmpty: "No entries to show"
      }
    })

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-success").slideUp(500);
    });

    $('#t1, #t2').datepicker({
      format: 'dd-MM-yyyy',
      autoclose: true
    });

    $('#datatable').on('click', '[id^=btnDelete]', function () {
      var $item = $(this).closest("tr");
      var $nama = $item.find("#data_nama").val();
      console.log($nama);
      // $item.find("input[id$='no']").val();
      // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Ini ?',
        content: 'Hapus data zakat ' + $nama,
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Delete',
            action: function () {
              window.location = "zakat_ctrl/hapus/" + $item.find("#id").val();
            }
          }
        }
      });
    });

  });
  
</script>
