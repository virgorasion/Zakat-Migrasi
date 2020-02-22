<?php 
$this->load->view('template/head');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?php
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pengurus Masjid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Daftar Pengurus Masjid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Daftar Anggota
                        </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                    </div>
                    <div class="card-body">
                        <!-- <h4>Custom Content Below</h4> -->
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">
                                <!-- Date range -->
                                <?php if($_SESSION['26insert']==1){ ?>
                                <div class="form-group">
                                    <div class="col-sm-12 row">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAnggota">Tambah Anggota</button>
                                    </div>
                                </div>
                                <?php } ?>
                                <table id="tableAnggota" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th class="min-desktop">Alamat</th>
                                            <th class="min-desktop">No Hp</th>
                                            <th class="min-desktop">No Telp</th>
                                            <?php if($_SESSION['26edit']==1 || $_SESSION['26delete']==1){ ?>
                                            <th>Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Diisi oleh ajax -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="tab-custom-content">
                            <p class="lead mb-0">Custom Content goes here</p>
                        </div> -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-5">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-sitemap"></i>
                            Daftar Pengurus
                        </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                    </div>
                    <div class="card-body">
                        <!-- <h4>Custom Content Below</h4> -->
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">
                                <!-- Date range -->
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <?php if($_SESSION['26insert']==1){ ?>
                                        <button class="btn btn-success col-sm-4" id="addTakmir">Tambah Pengurus</button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-default col-sm-3" id="btnPrint"><i class="fa fa-print"></i> Print</button>
                                    </div>
                                </div>
                                <table id="tablePetugas" class="table table-bordered table-striped" style="width:100%">
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
                                    <!-- Diisi oleh ajax -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="tab-custom-content">
                            <p class="lead mb-0">Custom Content goes here</p>
                        </div> -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->

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
                            <input type="text" class="form-control" name="EditNama" id="EditNama"
                                placeholder="M Nur Fauzan W">
                        </div>
                        <div class="form-group">
                            <label for="EditAlamat">Alamat</label>
                            <input type="text" class="form-control" name="EditAlamat" id="EditAlamat"
                                placeholder="Kapas Madya 3i/4">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="<?= site_url('Takmir_ctrl/TambahAnggota') ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="AddNama">Nama</label>
                                <input type="text" class="form-control" name="AddNama" id="AddNama"
                                    placeholder="M Nur Fauzan W">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AddAlamat">Alamat</label>
                                <input type="text" class="form-control" name="AddAlamat" id="AddAlamat"
                                    placeholder="Kapas Madya 3i/4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AddHP">No HP</label>
                                <input type="text" class="form-control" name="AddHP" id="AddHP" placeholder="083849575737">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AddTelp">No Telp</label>
                                <input type="text" class="form-control" name="AddTelp" id="AddTelp" placeholder="-">
                            </div>
                            <div class="form-group col-12">
                                <label for="AddJK">Jenis Kelamin</label>
                                <select class="form-control" name="AddJK" id="AddJK">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
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
                    <h4 class="modal-title" id="FormActionTakmirTitle">Tambah Takmir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
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
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $('body').addClass('sidebar-collapse');

	  <?php if(@$_SESSION['msg']):?>
    toastr.success("<?=@$_SESSION['msg']?>");
    <?php endif ?>
    <?php if(@$_SESSION['err']):?>
    toastr.error("<?=@$_SESSION['err']?>");
    <?php endif ?>
    <?php if(@$_SESSION['form_error']):?>
    $(document).Toasts('create', {
      class: 'bg-danger', 
      title: 'Form Error',
      subtitle: '',
      body: `<?=validation_errors("<li>","</li>")?>`
    });
    <?php endif ?>
	
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

    var table = $("#tablePetugas").dataTable({
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
        "url": "<?php echo site_url('Takmir_ctrl/AjaxTablePetugas') ?>",
        "type": "POST"
      },
      columns: [{
          "data": "nama"
        },
        {
          "data": "jabatan"
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
    $('#addTakmir').click(function(){
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

    $('#tablePetugas').on('click', '.edit_data', function(){
      let idAnggota = $(this).data("id_anggota");
      let idJabatan = $(this).data("id_jabatan");
      let idTakmir = $(this).data("id");
      let urlTakmir = "<?= site_url('Takmir_ctrl/getAnggotaAjaxKhusus') ?>";
      let urlJabatan = "<?= site_url('Takmir_ctrl/getAjaxTakmir') ?>";
      $.ajax({
        url: urlTakmir,
        type: 'POST',
        success:function(result){
          var data = JSON.parse(result);
          var html = '<option value="0" selected>- Pilih Anggota -</option>';
          $.each(data, function(i){
            html += '<option value="'+data[i].id_anggota+'">'+data[i].nama+'</option>';
            $('#addAnggotaTakmir').html(html);
          })
        }
      })
      $.ajax({
        url: urlJabatan,
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
      $("#FormActionTakmirTitle").html("Edit Takmir");
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

    $('#tablePetugas').on('click', '.delete_data', function () {
      var item = $(this).closest('tr');
      var nama = $(this).data("nama");
      var jabatan = $(this).data("jabatan");
      var idTakmir = $(this).data("id");
      var idAnggota = $(this).data("anggota");
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