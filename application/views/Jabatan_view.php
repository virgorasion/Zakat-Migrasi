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
                    <h1>Setting Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Kas Masjid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Daftar Jabatan
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <form action="<?=site_url('Jadwal_jumat_ctrl/index')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <?php if ($_SESSION['17insert'] == 1): ?>
                                <button type="button" name="btnAddJabatan" id="btnAddJabatan"
                                    class="btn btn-primary col-md-2">Tambah Data</button>
                                <?php endif ?>
                            </div>
                        </form>
                        <!-- /.form group -->

                        <table id="tableJabatan" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Jabatan</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?>
                                <tr>
                                <td class="MainID">
                                    <?= $item->id ?>
                                </td>
                                <td class="MainNama">
                                    <?= $item->nama ?>
                                </td>
                                <td class="MainKet">
                                    <?= $item->keterangan ?>
                                </td>
                                <td>
                                    <?php if ($this->session->userdata("17edit") == "1"): ?>
                                    <a href='#'>
                                    <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                                    <button class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                                        <span class='fa fa-edit'></span>
                                    </button>
                                    </a>
                                    <?php endif ?>
                                    <?php if ($this->session->userdata("17delete") == "1"): ?>
                                    <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                    <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'>
                                        <span class='fa fa-trash-alt'></span>
                                    </button>
                                    </span>
                                    <?php endif ?>
                                </td>
                                </tr>
                                <?php endforeach ?>
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

        <!-- Modal Tambah Anggota -->
        <div class="modal fade" id="modalJabatan">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= site_url('Jabatan_ctrl/ActionJabatan') ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                    <label for="AddNama">Nama</label>
                    <input type="text" class="form-control" name="AddNama" id="AddNama" placeholder="Ketua Takmir">
                </div>
                <div class="form-group">
                    <label for="AddKeterangan">Keterangan</label>
                    <textarea class="form-control" name="AddKeterangan" id="AddKeterangan" rows="3"></textarea>
                </div>
                </div>
                <input type="hidden" name="ID" id="inputID" class="form-control">
                <input type="hidden" name="Type" id="inputType" class="form-control">
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
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(document).ready(function () {
    $('#btnAddJabatan').click(function () {
      $('#modalJabatan').modal('show');
      $('#inputType').val('add');
	});
	
	<?php if(@$_SESSION['succ']):?>
    toastr.success("<?=@$_SESSION['succ']?>");
    <?php endif ?>
    <?php if(@$_SESSION['fail']):?>
    toastr.error("<?=@$_SESSION['fail']?>");
    <?php endif ?>


    $('#tableJabatan').on('click', '.btnEdit', function () {
      var item = $(this).closest('tr');
      var id = item.find('.MainID').text().trim();
      var nama = item.find('.MainNama').text().trim();
      var ket = item.find('.MainKet').text().trim();
      $('#modalJabatan').modal('show');
      $('#inputType').val('edit');
      $('#inputID').val(id);
      $('#AddNama').val(nama);
      $('#AddKeterangan').val(ket);
    });

    $('#tableJabatan').on('click', '.btnDelete', function () {
      var $item = $(this).closest("tr");
      var $nama = $item.find(".MainNama").text().trim();
      var id = $item.find('.MainID').text().trim();
      console.log($nama);
      // $item.find("input[id$='no']").val();
      // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Peringatan !',
        content: 'Hapus data zakat ' + $nama,
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
          delete: {
            text: 'Delete',
            action: function () {
              window.location = "<?=site_url('Jabatan_ctrl/HapusJabatan/')?>" + id;
            }
          }
        }
      });
    });
  })
</script>