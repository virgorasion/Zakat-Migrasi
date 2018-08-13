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
        <h3 class="box-title">Data Tarawih</h3>

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
        <table id="datatable" class="table table-bordered table-striped">
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
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
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

  $(function () {
    $('#datatable').DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
      $(".alert-success").slideUp(500);
    });

    $('#infaq').keypress(function (e) {
      if (e.which == 13) {
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
    })

    $('#t1, #t2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $('#btnPrint').click(function () {
      var tanggal1 = '<?php echo str_replace(' - ','.
      ',$t1); ?>';
      var tanggal2 = '<?php echo str_replace(' - ','.
      ',$t2); ?>';
      var url = '<?php echo site_url("/zakat_ctrl/laporan_print/");?>' + tanggal1 + '/' + tanggal2;
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
              window.location = "zakat_ctrl/hapus/" + $item.find("#id").val();
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