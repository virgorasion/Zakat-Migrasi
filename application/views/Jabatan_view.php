<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Setting Jabatan
      <small>
        <?= $_SESSION['nama']?></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <button id="btnAddJabatan" type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">Tambah</button>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table id="tableJabatan" class="table table-bordered">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Jabatan</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) { ?>
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
                <?php if ($this->session->userdata("17edit") == "1") { ?>
                <a href='#'>
                  <span data-placement='top' data-toggle='tooltip' title='Edit'></span>
                  <button class='btn btn-warning btn-xs btnEdit' data-title='Edit'>
                    <span class='glyphicon glyphicon-pencil'></span>
                  </button>
                </a>
                <?php 
                } ?>
                <?php if ($this->session->userdata("17delete") == "1") { ?>
                <span data-placement='top' data-toggle='tooltip' title='Delete'>
                  <button class='btn btn-danger btn-xs btnDelete' data-title='Delete'>
                    <span class='glyphicon glyphicon-remove'></span>
                  </button>
                </span>
                <?php 
                } ?>
              </td>
            </tr>
            <?php 
            } ?>
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

    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="modalJabatan">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Jabatan</h4>
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
<script>
  $(document).ready(function () {
    $('#btnAddJabatan').click(function () {
      $('#modalJabatan').modal('show');
      $('#inputType').val('add');
    });

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