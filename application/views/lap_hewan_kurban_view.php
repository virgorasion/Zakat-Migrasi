<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Hewan Kurban
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Laporan</a>
      </li>
      <li class="active">Hewan Kurban</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

       <?php if (isset($_SESSION['succ'])) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['succ']; ?>
        </div>
        <?php 
      } ?>
    <?php if (isset($_SESSION['fail'])) { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='fa fa-remove'></span> Info!</h5>
          <?php echo $_SESSION['fail']; ?>
        </div>
        <?php 
      } ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header">

        <?php if (isset($_SESSION['msg'])) {?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['msg'];?>
        </div>
        <?php } ?>
        <form method="post" action="<?php echo site_url("Hewan_kurban/index") ?>" id="formsearch">
          <div class="col-sm-12">
          <?php if ($_SESSION['6insert'] == 1) { ?>
            <button type="button" name="btnTambah" id="btnTambah" class="btn btn-info col-md-2">Tambah</button>
          <?php } ?>
            <div class="form-inline col-md-4">
              <div class="input-group input-daterange">
                <input type="text" class="form-control" name="t1" id="t1" value="<?= $t1 ?>" autocomplete="off">
                <div class="input-group-addon">to</div>
                <input type="text" class="form-control" name="t2" id="t2" value="<?= $t2 ?>" autocomplete="off">
              </div>
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
      <!-- /.box-header -->
      <div class="box-body">
        <table id="tableKurban" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Admin</th>
              <th>Penyumbang</th>
              <th>Alamat</th>
              <th>Jenis Hewan</th>
              <th>jumlah</th>
              <?php if($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1) { ?>
              <th>Action</th>
              <?php } ?>  
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
        foreach ($data as $row){ 
        switch ($row->jenis) {
          case '1':
            $jenis = "Kambing";
            break;
          case '2':
            $jenis = "Sapi";
            break;
          default:
            $jenis = "Undefined";
            break;
        }
        ?>
            <tr>
              <input type="hidden" name="id" class="id" value="<?php echo $row->id; ?>">
              <td class="no">
                <?php echo $no ?>
              </td>
              <td class="tanggal">
                <?php echo $row->tanggal_transaksi ?>
              </td>
              <td class="admin">
                <?php echo $row->admin; ?>
              </td>
              <td class="penyumbang">
                <?php echo $row->penyumbang;?>
              </td>
              <td class="alamat">
                <?php echo $row->alamat;?>
              </td>
              <td class="jenisHewan">
                <?php echo $jenis;?>
              </td>
              <td class="jumlah">
                <?php echo $row->jumlah ;?>
              </td>
              <td>
                <!-- <?php if ($this->session->userdata("6view")=="1"){?>
                <a href="#">
                  <span data-placement='top' data-toggle='tooltip' title='Struk'>
                    <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                      <span class='glyphicon glyphicon-print'></span>
                    </button>
                </a>
                <?php } ?> -->
                <?php if ($this->session->userdata("6edit")=="1"){?>
                <a href='#'>
                  <span data-placement='top' data-toggle='tooltip' title='Edit'>
                    <button class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                      <span class='glyphicon glyphicon-pencil'></span>
                    </button>
                </a>
                <?php } ?>
                <?php if ($this->session->userdata("6delete")=="1"){?>
                <a class="buttonDelete" href='#'>
                  <span data-placement='top' data-toggle='tooltip' title='Delete'>
                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'>
                      <span class='glyphicon glyphicon-remove'></span>
                    </button>
                </a>
                <?php } ?>
              </td>
            </tr>
            <?php $no++;
        }
        ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box -->

    <?php if($_SESSION['6edit'] == 1 || $_SESSION['6delete'] == 1 || $_SESSION['6insert'] == 1){ ?>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo site_url('Hewan_kurban/aksi') ?>" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Data Kurban</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label">Penyumbang</label>
                  <input type="text" class="form-control" id="penyumbang" name="penyumbang" placeholder="M Nur Fauzan W"
                    require>
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Kapas Madya" required
                    autofocus="on">
                </div>
                <div class="form-group">
                  <label for="jenisHewan">Jenis Hewan</label>
                  <select class="form-control" name="jenisHewan" id="jenisHewan">
                    <option selected>-=Pilih=-</option>
                    <option value="1">Kambing</option>
                    <option value="2">Sapi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="2" require>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" class="form-control" id="idKurban" name="idKurban">
              <input type="hidden" name="action" id="action" value="add">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btnSave">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
  $(function () {
    $('#tableKurban').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    
    $(".alert").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert").slideUp(500);
    });

    $(".btnSave").click(function () {
      $('#form-horizontal').submit(function () {
        return false;
      });
    });

    // DateRange (Date Main)
    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });

    // $('#tableKurban').on('click', '[id^=btnStruk]', function () {
    //   var $item = $(this).closest("tr");
    //   console.log($item.find("input[id$='no']").val());
    //   var url = '<?php echo site_url("/ahad_dhuha/printstruk/")?>' + $item.find("input[id$='no']").val();
    //   console.log(url);
    //   newwindow = window.open(url, 'Print Nota', 'height=500,width=1100');
    //   if (window.focus) {
    //     newwindow.focus()
    //   }
    //   return false;
    // });

    // Fungsi Tambah
    $("#btnTambah").click(function () {
      $("#modalTambah").modal('show');
      $("#action").val("add");
      $("#nomor").val();
      $("#penyumbang").val();
      $("#alamat").val();
      $("#jenisHewan").val();
      $("#jumlah").val();
    });

    $('#tableKurban').on('click', '.btnEdit', function () {
      var $item = $(this).closest("tr");
      var jenisHewan = $item.find(".jenisHewan").text().trim();
      switch (jenisHewan) {
        case 'Kambing':
          var jenis = "1";
          break;
        case 'Sapi':
          var jenis = "2";
          break;
        default:
          var jenis = "";
          break;
      }
      console.log(jenis);
      $("#id_admin").val("<?php echo $_SESSION['id_admin']; ?>");
      $("#idKurban").val($.trim($item.find(".id").val()));
      $("#penyumbang").val($.trim($item.find(".penyumbang").text()));
      $("#alamat").val($.trim($item.find(".alamat").text()));
      $("#jenisHewan").val(jenis);
      $("#jumlah").val($.trim($item.find(".jumlah").text()));
      $("#modalTambah").modal('show');
      $("#action").val("edit");
    });

    $('#tableKurban').on('click', '.btnDelete', function () {
      $item = $(this).closest('tr');
      $nomor = $.trim($item.find('.id').val());
      $penyumbang = $.trim($item.find('.penyumbang').text());

      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Kurban',
        content: 'Hapus Data ' + $penyumbang,
        autoClose: 'Batal|5000',
        buttons: {
          Batal: function () {},
          Hapus: {
            title: 'Hapus',
            action: function () {
              window.location = "<?= site_url('Hewan_kurban/hapus/')?>" + $nomor;
            }
          }
        }
      })
    })

    $('#btnPrint').click(function () {
      var tanggal1 = $("#t1").val();
      var tanggal2 = $("#t2").val();
      var url = '<?php echo site_url("/Hewan_kurban/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
    });

  });
</script>
<?php
$this->load->view('template/endbody');
?>