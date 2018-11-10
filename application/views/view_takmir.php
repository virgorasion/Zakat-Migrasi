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

        <!-- quick email widget -->
        <div class="box box-success">
          <div class="box-header">
            <i class="fa fa-users"></i>

            <h3 class="box-title">Daftar Anggota</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#modalTambahAnggota">Tambah Anggota</a></li>
                  <!-- <li><a href="#">Edit Anggota</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Hapus Anggota</a></li> -->
                </ul>
              </div>
              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-success btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                  class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <table id="tableAnggota" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th class="min-tablet">Alamat</th>
                    <th class="min-tablet">No Hp</th>
                    <th class="min-tablet">No Telp</th>
                    <th class="min-tablet">Jenis Kelamin</th>
                    <th class="min-desktop">Action</th>
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
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">
        <!-- Start Box Petugas -->
        <div class="box box-info">
          <div class="box-header with-border">
            <i class="fa fa-sitemap"></i>
            <h3 class="box-title">Daftar Pengurus</h3>
            <div class="pull-right box-tools">
              <div class="btn-group">
                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#" id="AddTakmir">Tambahkan Takmir</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                  class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="tablePetugas" class="table table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jabatan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($petugas as $org) { ?>
                <tr>
                  <td>
                    <?= $org->nama ?>
                  </td>
                  <td>
                    <?= $org->jabatan ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.END Box Petugas -->

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

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
            <h4 class="modal-title">Tambah Anggota</h4>
          </div>
          <form action="<?= site_url('Takmir_ctrl/TambahTakmir') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="addAnggotaTakmir">Nama</label>
                <select class="form-control" name="addAnggotaTakmir" id="addAnggotaTakmir">
                  <!-- Diisi Ajax -->
                </select>
              </div>
              <div class="form-group">
                <label for="addJabatan">Jenis Kelamin</label>
                <select class="form-control" name="addJabatan" id="addJabatan">
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
        },
        {
          "data": "action",
          "orderable": false,
          "searchable": false
        }
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

    $('#AddTakmir').click(function(){
      $('#modalTambahTakmir').modal('show');
      var urlAnggota = "<?=site_url('Takmir_ctrl/getAjaxAnggota')?>";
      var urlTakmir = "<?=site_url('Takmir_ctrl/getAjaxTakmir')?>";
      $.ajak({
        url: urlAnggota,
        type: 'POST',
        success:function(result){
          var data = JSON.parse(result);
          var html = '';
          $.each(data, function(i){
            html += '<option value="'+data[i].id_anggota+'">'+data[i].nama_anggota+'</option>';
            $('#addNamaAnggota').html(html)
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
            html += '<option value="'+data[i].id+'">'+data[i].jabatan+'</option>';
            $('#addJabatan').html(html);
          })
        }
      })
    })

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

    $("#tablePetugas").DataTable({
      searching: true,
      paging: true
    })

    $('#tableAnggota').on('click', '.delete_data', function () {
      var nama = $(this).data('nama');
      var id = $(this).data('id');
      $.confirm({
        theme: 'supervan',
        title: 'Hapus Data Ini ?',
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
  })
</script>