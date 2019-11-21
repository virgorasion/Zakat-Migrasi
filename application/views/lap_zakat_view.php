<?php
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Zakat & Infaq
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-gear"></i> Laporan</a>
      </li>
      <li class="active">Zakat & Infaq</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

  <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
          <h5>
            <span class='glyphicon glyphicon-ok'></span> Info!</h5>
          <?php echo $_SESSION['msg']; ?>
        </div>
        <?php 
      } ?>

    <?php if ($_SESSION['1insert'] == 1) { ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Input</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body" id="bodyInput">
        <div class="row">
          <form id="form" action="<?php echo site_url('zakat_ctrl/tambahData');?>" method="POST">
            <div class="form-group">
              <div class="col-sm-2">
                <input placeholder="Nama" type="text" name="nama" id="nama" class="form-control" autofocus required>
              </div>
              <div class="col-sm-2">
                <input placeholder="Alamat" type="text" name="alamat" id="alamat" class="form-control" required>
              </div>
              <div class="col-sm-2">
                <input placeholder="Zakat Fitrah" class="inputMask form-control" type="number" name="zakatFitrah" id="zakatFitrah" class="form-control">
              </div>
              <div class="col-sm-2">
                <select class="form-control" name="pembelian" id="pembelian">
                  <option value="">- Pilih Tipe -</option>
                  <option value="0">Beli</option>
                  <option value="1">Tidak</option>
                </select>
              </div>
              <div class="col-sm-2">
                <input placeholder="Zakat Mall" type="text" name="zakatMal" id="zakatMal" class="form-control">
              </div>
              <div class="col-sm-2">
                <input placeholder="Infaq" type="text" name="infaq" id="infaq" class="form-control">
              </div>
            </div>
          </form>
        </div>
        <small class="text-muted">Np: Tekan 'ENTER' pada bagian infaq untuk submit</small>
      </div>
    </div>
    <?php } ?>

    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header">
        <form method="post" action="<?php echo site_url("zakat_ctrl/index") ?>" id="formsearch">
          <div class="col-sm-12">
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
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Admin</th>
              <th>Nama</th>
              <th class="min-tablet">Alamat</th>
              <th class="min-tablet">Zakat Fitrah</th>
              <th class="min-tablet">Pembelian</th>
              <th class="min-desktop">Zakat Mall</th>
              <th class="min-desktop">Infaq</th>
              <th class="min-desktop">Tanggal</th>
              <?php if ($_SESSION['1edit'] == "1" && $_SESSION['1delete'] == "1") { ?>
              <th class="min-desktop">Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 0;
                foreach ($data as $row): 
                  if ($row->beli == 0) {
                    $beli = 'Beli';
                  }else {
                    $beli = 'Tidak Beli';
                  }
                  $tgl = explode('-', $row->tanggal);
                  $tanggal = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
                  $no++;
                ?>

              <tr>
                <td class="no">
                  <?php echo $row->admin; ?>
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
                <td class="zakat_mall">
                  <?php echo number_format((double)$row->zakat_mall,0,"," , ".");?>
                </td>
                <td class="data_infaq">
                  <?php echo number_format((double)$row->infaq,0,",",".");?>
                </td>
                <td>
                  <?php echo $tanggal;?>
                </td>
                <?php if ($_SESSION['1edit'] == "1" && $_SESSION['1delete'] == "1") { ?>
                <td align="center">
                <input type="hidden" name="nomor" id="id" value="<?php echo $row->nomor ?>">
                  <input type="hidden" name="data_nama" id="data_nama" value="<?php echo $row->nama ?>">
                  <!-- <?php if ($this->session->userdata("17view")=="1"){?>
                  <a href="#">
                    <span data-placement='top' data-toggle='tooltip' title='Struk'></span>
                    <button class='btn btn-primary btn-xs btnPrint' data-title='Struk' id="btnStruk">
                      <span class='glyphicon glyphicon-print'></span>
                    </button>
                  </a>
                  <?php } ?> -->
                  <?php if ($_SESSION['1edit'] == "1"){?>
                  <a href='#'>
                    <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                    <button id="btnEdit" class='btn btn-warning btn-xs btnEdit' data-title='Edit'
                      data-toggle='modal' data-target='#modalEdit'>
                      <span class='glyphicon glyphicon-pencil'></span>
                    </button>
                  </a>
                  <?php } ?>
                  <?php if ($_SESSION['1delete'] == "1"){?>
                  <span data-placement='top' data-toggle='tooltip' title='Delete'>
                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete' id="btnDelete">
                      <span class='glyphicon glyphicon-remove'></span>
                    </button>
                  </span>
                  <?php } ?>
                </td>
                <?php } ?>
              </tr>
              <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <td>Total :</td>
            </tr>
          </tfoot>
        </table>

        <!-- <table>
          <tr>
            <th>cek</th>
            <th>cek</th>
            <th>cek</th>
            <th>cek</th>
            <th>cek</th>
            <th>cek</th>
          </tr>
          <tbody id="pro">

          </tbody>
        </table> -->
      </div>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->

  <?php if ($_SESSION['1delete'] == "1") { ?>
  <!-- Start Modal Delete -->
  <div class="modal modal-danger fade" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Danger Modal</h4>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <?php } ?>

  <?php if ($_SESSION['1edit'] == "1") { ?>
  <!-- Start Modal Edit -->
  <div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Edit Zakat</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo site_url('zakat_ctrl/simpanEdit');?>" method="POST">
            <div class="form-group">
              <label for="namaEdt">Nama :</label>
              <input type="text" name="namaEdt" id="namaEdt" class="form-control" placeholder="ex : Virgorasion">
            </div>
            <div class="form-group">
              <label for="alamatEdt">Alamat :</label>
              <input type="text" name="alamatEdt" id="alamatEdt" class="form-control" placeholder="ex : Kapas madya">
            </div>
            <div class="form-group">
              <label for="zakatFitrahEdt">Zakat Fitrah :</label>
              <input type="text" name="zakatFitrahEdt" id="zakatFitrahEdt" class="form-control" placeholder="ex : 5">
            </div>
            <div class="form-group">
              <label for="pembelianEdt">Pembelian :</label>
              <select class="form-control" name="pembelianEdt" id="pembelianEdt">
                <option value="0">Beli</option>
                <option value="1">Tidak</option>
              </select>
            </div>
            <div class="form-group">
              <label for="zakatMalEdt">Zakat Mall :</label>
              <input type="text" name="zakatMalEdt" id="zakatMalEdt" class="form-control" placeholder="ex : 50.000">
            </div>
            <div class="form-group">
              <label for="infaqEdt">Infaq :</label>
              <input type="text" name="infaqEdt" id="infaqEdt" class="form-control" placeholder="ex : 100.000">
            </div>
              <input type="hidden" name="nomor" id="nomor" value="">
              <input type="hidden" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <?php } ?>


</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>

<script>
  $("#datatable").on("click","#btnEdit", function(){
    var item = $(this).closest('tr');
    var id = item.find('#id').val();
    var url = "<?php echo site_url('zakat_ctrl/edit/'); ?>" + id ;
    // console.log(url);
    $.ajax({
      url: url,
      type: 'POST',
      beforeSend: function () {
        // loading section
      },
      success: function (result) {
        var data = JSON.parse(result);
        // console.log(data[0]);
        $('#nomor').val(data[0].nomor);
        $('#namaEdt').val(data[0].nama);
        $('#alamatEdt').val(data[0].alamat);
        $('#zakatFitrahEdt').val(data[0].zakat_fitrah);
        $('#pembelianEdt').val(data[0].beli);
        $('#zakatMalEdt').val(data[0].zakat_mall);
        $('#infaqEdt').val(data[0].infaq);
      }
    });
  });

  

  $(function () {
  //   var t1 = $('#t1').val();
  //   var t2 = $('#t2').val();
  //   var url = "<?php echo site_url('zakat_ctrl/synchronize/'); ?>" + t1 + "/" + t2;
  //   setInterval(function(){

  //   $.ajax({
  //     url: url,
  //     type: 'POST',
  //     success: function (result) {
  //       var data = JSON.parse(result);
  //       var html = '';
  //       // console.log(result);
  //       $.each(data, function(i){

  //       html += '<tr>'
  //             +  '  <td class="gak">'+data[i].nama+'</td>'
  //             +  '  <td class="blas">'+data[i].nomor+'</td>'
  //             +  '  <td class="moh">'+data[i].alamat+'</td>'
  //             +  '  <td class="wes">'+data[i].zakat_fitrah+'</td>'
  //             +  '  <td class="yo">'+data[i].zakat_mall+'</td>'
  //             +  '  <td class="man">'+data[i].infaq+'</td>'
  //             + '</tr>';
  //             $('#pro').html(html);
  //       });
  //     }
  //   });
  //   }, 1000);

    $('#datatable').DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    // DateRange (Date Main)
    $('.input-daterange').datepicker({
      format: 'dd-MM-yyyy'
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-success").slideUp(500);
    });

    $('#infaq').keypress(function (e) {
      if (e.which == 13) {
        console.log('tertekan');
        if ($('#nama').val() == '') {
          alert('Nama Harus Diisi');
        } else if ($('#alamat').val() == '') {
          alert('Alamat Tidak Boleh Kosong');
        } else if ($('#zakatFitrah').val() == '') {
          alert('Zakat Fitrah Tidak Boleh Kosong');
        } else {
          $('#form').submit();
        }
      }
    });

    $('#zakatMal, #infaq, #zakatMalEdt, #infaqEdt, .inputMask').inputmask('decimal', {
      digits: 2,
      placeholder: "0",
      digitsOptional: true,
      radixPoint: ",",
      groupSeparator: ".",
      autoGroup: true,
      rightAlign: false
    });

    $('#btnPrint').click(function () {
      var tanggal1 = '<?php echo str_replace(' - ','.
      ',$t1); ?>';
      var tanggal2 = '<?php echo str_replace(' - ','.
      ',$t2); ?>';
      var url = '<?php echo site_url("zakat_ctrl/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
      console.log(url);
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
        newwindow.focus()
      }
      return false;
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
              window.location = "<?=site_url('zakat_ctrl/hapus/')?>" + $item.find("#id").val();
            }
          }
        }
      });
    });

  });
</script>
<?php
  $this->load->view('template/endbody');
  ?>