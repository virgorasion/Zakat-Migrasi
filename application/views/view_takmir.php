<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<style>
  .pilih{
	background-color: #f2f5ca;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Takmir
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">

        <!-- Daftar Anggota -->
        <div class="box box-success">
          <div class="box-header">
            <i class="fa fa-users"></i>

            <h3 class="box-title">Daftar Anggota</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <?php if($_SESSION['26insert']==1){ ?>
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modalTambahAnggota">Tambah Anggota</a></li>
                </ul>
              </div>
              <?php } ?>
              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <table id="tableAnggota" class="table table-bordered table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th class="min-tablet">No Telp</th>
                    <th class="min-tablet">JK</th>
                    <?php if($_SESSION['26edit']==1 || $_SESSION['26delete']==1){ ?>
                    <th class="min-desktop">Action</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <!-- Diisi oleh ajax -->
                </tbody>
              </table>
            </form>
          </div>
        </div>

      </section>
      <!-- /.Left col -->
      <section class="col-lg-5 connectedSortable">
        <!-- Start Box Petugas -->
        <div class="box box-info">
          <div class="box-header with-border">
            <i class="fa fa-sitemap"></i>
            <h3 class="box-title">Daftar Pengurus
              <button type="button" class="btn btn-default" id="btnPrint"><i class="fa fa-print"></i> Print</button>
            </h3>
            <div class="pull-right box-tools">
              <?php if($_SESSION['26insert']==1){ ?>
              <div class="btn-group">
                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#" id="AddTakmir">Tambahkan Takmir</a></li>
                </ul>
              </div>
              <?php } ?>
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="tablePetugas" class="table table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <?php if ($_SESSION['26insert'] == 1 || $_SESSION['26edit'] == 1) { ?>
                  <th>Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($petugas as $org) { ?>
                <tr>
                  <td class="rowAnggota">
                    <?= $org->nama_anggota ?>
                  </td>
                  <td class="rowJabatan">
                    <?= $org->nama_jabatan ?>
                  </td>
                  <input type="hidden" name="anggotaID" id="anggotaID" value="<?=$org->id_anggota?>">
                  <input type="hidden" name="jabatanID" id="jabatanID" value="<?=$org->jabatan_id?>">
                  <input type="hidden" name="takmirID" id="takmirID" value="<?=$org->id?>">

                  <?php if ($_SESSION['26edit'] == 1 OR $_SESSION['26delete'] == 1){ ?>
                  <td>
                  <?php if ($this->session->userdata("26edit") == "1") { ?>
                  <button class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                    <span class='glyphicon glyphicon-pencil'></span>
                  </button>
                  <?php } ?> <!-- End if(edit) -->

                  <?php if ($this->session->userdata("26delete") == "1") { ?>
                  <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'>
                    <span class='glyphicon glyphicon-remove'></span>
                  </button>
                  <?php } ?> <!-- End if(delete) -->
                  </td>
                  <?php } ?> <!-- End if(delete OR edit) -->
                </tr>
                <?php } ?> <!-- End foreach -->
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.END Box Petugas -->

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    <?php if($_SESSION['26edit']==1){ ?>
    <!-- Modal Edit Anggota -->
    <div class="modal fade" id="modalEditAnggota">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          <form action="<?=site_url('Takmir_ctrl/EditAnggota')?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="EditNama">Nama</label>
                <input type="text" class="form-control" name="EditNama" id="EditNama" placeholder="M Nur Fauzan W">
              </div>
              <div class="form-group">
                <label for="EditAlamat">Alamat</label>
                <input type="text" class="form-control" name="EditAlamat" id="EditAlamat" placeholder="Kapas Madya 3i/4">
              </div>
              <div class="form-group">
                <label for="EditHP">No HP</label>
                <input type="text" class="form-control" name="EditHP" id="EditHP" placeholder="083849575737">
              </div>
              <div class="form-group">
                <label for="EditTelp">No Telp</label>
                <input type="text" class="form-control" name="EditTelp" id="EditTelp" placeholder="-">
              </div>
              <div class="form-group">
                <label for="EditJK">Jenis Kelamin</label>
                <select class="form-control" name="EditJK" id="EditJK">
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
              <input type="hidden" name="EditIDAnggota" id="EditIDAnggota" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php } ?>

    <?php if($_SESSION['26insert']==1){ ?>
    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="modalTambahAnggota">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Anggota</h4>
          </div>
          <form action="<?= site_url('Takmir_ctrl/TambahAnggota') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="AddNama">Nama</label>
                <input type="text" class="form-control" name="AddNama" id="AddNama" placeholder="M Nur Fauzan W">
              </div>
              <div class="form-group">
                <label for="AddAlamat">Alamat</label>
                <input type="text" class="form-control" name="AddAlamat" id="AddAlamat" placeholder="Kapas Madya 3i/4">
              </div>
              <div class="form-group">
                <label for="AddHP">No HP</label>
                <input type="text" class="form-control" name="AddHP" id="AddHP" placeholder="083849575737">
              </div>
              <div class="form-group">
                <label for="AddTelp">No Telp</label>
                <input type="text" class="form-control" name="AddTelp" id="AddTelp" placeholder="-">
              </div>
              <div class="form-group">
                <label for="AddJK">Jenis Kelamin</label>
                <select class="form-control" name="AddJK" id="AddJK">
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Tambah Takmir -->
    <div class="modal fade" id="modalTambahTakmir">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Takmir</h4>
          </div>
          <form id="FormActionTakmir" action="<?= site_url('Takmir_ctrl/TambahTakmir') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="addAnggotaTakmir">Nama</label>
                <select class="form-control" name="addAnggotaTakmir" id="addAnggotaTakmir">
                  <!-- Diisi Ajax -->
                </select>
              </div>
              <div class="form-group">
                <label for="addJabatan">Jabatan</label>
                <select class="form-control" name="addJabatan" id="addJabatan">
                  <!-- Diisi Ajax -->
                </select>
              </div>
            </div>
            <input type="hidden" name="MainID" id="MainID">
            <input type="hidden" name="SecondID" id="SecondID"> <!-- ID anggota sebelum berubah -->
            <input type="hidden" name="ActType" id="ActType">
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
  $(document).ready(function () {
    $('body').addClass('sidebar-collapse');
    // Setup datatables
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    $("#tablePetugas").dataTable({});

    var table = $("#tableAnggota").dataTable({
      initComplete: function () {
        var api = this.api();
        $('#mytable_filter input')
          .off('.DT')
          .on('input.DT', function () {
            api.search(this.value).draw();
          });
      },
      oLanguage: {
        sProcessing: 'Loading....'
      },

      processing: true,
      responsive: true,
      serverSide: true,
      ajax: {
        "url": "<?php echo site_url('Takmir_ctrl/AjaxTableAnggota') ?>",
        "type": "POST"
      },
      columns: [{
          "data": "nama"
        },
        {
          "data": "alamat"
        },
        {
          "data": "no_hp"
        },
        {
          "data": "no_telp"
        },
        {
          "data": "jenis_kelamin"
        }
        <?php if($_SESSION['26edit'] == 1 || $_SESSION['26delete'] == 1){ ?>
        ,{
          "data": "action",
          "orderable": false,
          "searchable": false
        }
        <?php } ?>
      ],
      order: [
        [1, 'asc']
      ],
      rowCallback: function (row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
      }

    });
    // end setup datatables

    $("#btnPrint").click(function(){
      var url = "<?=site_url("Takmir_ctrl/print")?>";
      newwindow = window.open(url, 'Print', 'height=500,width=1100');
      if (window.focus) {
          newwindow.focus()
      }
      return false;
    });

    <?php if($_SESSION['26insert']==1){ ?>
    $('#AddTakmir').click(function(){
      $('#modalTambahTakmir').modal('show');
      $('#ActType').val('add')
      var urlAnggota = "<?=site_url('Takmir_ctrl/getAnggotaAjaxKhusus')?>";
      var urlTakmir = "<?=site_url('Takmir_ctrl/getAjaxTakmir')?>";
      $.ajax({
        url: urlAnggota,
        type: 'POST',
        success:function(result){
          var data = JSON.parse(result);
          var html = '';
          $.each(data, function(i){
            html += '<option value="'+data[i].id_anggota+'">'+data[i].nama+'</option>';
            $('#addAnggotaTakmir').html(html);
          })
        }
      })
      $.ajax({
        url: urlTakmir,
        type: 'POST',
        success:function(result){
          var data = JSON.parse(result);
          var html = '';
          $.each(data, function(i){
            html += '<option value="'+data[i].id+'">'+data[i].nama+'</option>';
            $('#addJabatan').html(html);
          })
        }
      })
    })
    <?php } ?>

    <?php if($_SESSION['26edit']==1){ ?>
    $('#tableAnggota').on('click', '.edit_data', function () {
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      var alamat = $(this).data('alamat');
      var hp = $(this).data('hp');
      var telp = $(this).data('telp');
      var jk = $(this).data('jk');
      $('#modalEditAnggota').modal('show');
      $('#EditNama').val(nama);
      $('#EditAlamat').val(alamat);
      $('#EditHP').val(hp);
      $('#EditTelp').val(telp);
      $('#EditJK').val(jk);
      $('#EditIDAnggota').val(id);
    })

    $('#tablePetugas').on('click', '.btnEdit', function(){
      var item = $(this).closest('tr');
      var idAnggota = item.find('#anggotaID').val();
      var idJabatan = item.find('#jabatanID').val();
      console.log(idJabatan);
      var idTakmir = item.find('#takmirID').val();
      var urlAnggota = "<?= site_url('Takmir_ctrl/getAjaxAnggota') ?>";
      var urlTakmir = "<?= site_url('Takmir_ctrl/getAjaxTakmir') ?>";
      $.ajax({
        url: urlAnggota,
        type: 'POST',
        success:function(result){
          var data = JSON.parse(result);
          var html = '';
          $.each(data, function(i){
            html += '<option value="'+data[i].id_anggota+'">'+data[i].nama+'</option>';
            $('#addAnggotaTakmir').html(html);
          })
        }
      }).done(function(data){
        $("#FormActionTakmir").find("#addAnggotaTakmir").val(idAnggota);
      })
      $.ajax({
        url: urlTakmir,
        type: 'POST',
        success:function(result){
          var data = JSON.parse(result);
          var html = '';
          $.each(data, function(i){
            html += '<option value="'+data[i].id+'">'+data[i].nama+'</option>';
            $('#addJabatan').html(html);
          })
        }
      }).done(function(data){
        $("#FormActionTakmir").find("#addJabatan").val(idJabatan);
      })
      $('#modalTambahTakmir').modal('show');
      $("#FormActionTakmir").find("#ActType").val('edit');
      $("#FormActionTakmir").find("#SecondID").val(idAnggota);
      $("#FormActionTakmir").find("#MainID").val(idTakmir);
    })
    <?php } ?>

    <?php if($_SESSION['26delete']==1){ ?>
    $('#tableAnggota').on('click', '.delete_data', function () {
      var nama = $(this).data('nama');
      var id = $(this).data('id');
      $.confirm({
        theme: 'supervan',
        title: 'Peringatan !',
        content: 'Hapus Anggota \"' + nama +"\"",
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Delete',
            action: function () {
              window.location = "Takmir_ctrl/HapusDataAnggota/" + id
            }
          }
        }
      });
    });

    $('#tablePetugas').on('click', '.btnDelete', function () {
      var item = $(this).closest('tr');
      var nama = item.find('.rowAnggota').text().trim();
      var jabatan = item.find('.rowJabatan').text().trim();
      var idTakmir = item.find('#takmirID').val();
      var idAnggota = item.find('#anggotaID').val();
      $.confirm({
        theme: 'supervan',
        title: 'Peringatan !',
        content: 'Hapus Petugas \"'+nama+'\" Sebagai \"'+jabatan+'\" '  ,
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Delete',
            action: function () {
              window.location = "Takmir_ctrl/HapusTakmir/" + idTakmir +"/"+ idAnggota;
            }
          }
        }
      });
    });
    <?php } ?>
  })
</script>