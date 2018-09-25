<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Control
        <small><?php echo $_SESSION['nama']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><button type="button" class="btn btn-medium btn-block btn-primary" data-toggle="modal" data-target="#modalBaru">Buat Akun</button></h3>
        </div>
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Nama Cabang</th>
              <th>Hak Akses</th>
              <th>Status Aktif</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($data as $item): 
                  if ($item->status_aktif == 1) {
                      $status = 'Aktif';
                  }else {
                    $status = 'Non_Aktif';
                  }
                  ?> 
              <tr>
                <input type="hidden" name="id" id="id_admin" value="<?php echo $item->id_admin ?>">
                <input type="hidden" name="password" id="password" value="<?php echo $item->password ?>">
                <td><?php echo $no; ?></td>
                <td class="nama"><?php echo $item->nama; ?></td>
                <td class="username"><?php echo $item->username; ?></td>
                <td class="nama_cabang"><?php echo $item->nama_cabang; ?></td>
                <td class="hak_akses"><?php echo $item->hak_akses; ?></td>
                <td class="status"><?php echo $status; ?><input type="hidden" name="status" id="status" value="<?php echo $item->status_aktif ?>"></td>
                <td><button id="btnEdit" data-toggle="modal" data-target="#modalEdit" class="btn btn-warning btn-xs"><i class="fa fa-gear"></i></button>
                    <button id="btnDelete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td>
              </tr>
              <?php $no++; endforeach ?>
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

    <!-- Start Modal Edit -->
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
              <label for="namaEdt">Nama :</label>
              <input type="text" name="namaEdt" id="namaEdt" class="form-control" placeholder="Nama">
              </div>
              <div class="form-group">
              <label for="usernameEdt">Username :</label>
              <input type="text" name="usernameEdt" id="usernameEdt" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
              <label for="passwordEdt">Password :</label>
              <input type="password" name="passwordEdt" id="passwordEdt" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
              <label for="cabangEdt">Nama Cabang :</label>
              <input type="text" name="cabangEdt" id="cabangEdt" class="form-control" placeholder="Nama Cabang">
              </div>
              <div class="form-group">
              <label for="aksesEdt">Hak Akses :</label>
              <input type="text" name="aksesEdt" id="aksesEdt" class="form-control" placeholder="Hak Akses">
              </div>
              <div class="form-group">
                <label for="StatusEdt">Status Aktif : </label>
                <select class="form-control" name="StatusEdt" id="StatusEdt">
                  <option value="1">Aktif</option>
                  <option value="0">Non_Aktif</option>
                </select>
              </div>
              <input type="hidden" name="id_admin" id="id" value="">
              <input type="hidden" name="statusEdt" id="stts" value="">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.End Modal Edit -->

    <!-- Start Modal Baru -->
    <div class="modal fade" id="modalBaru">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Buat Baru</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo site_url('user_ctrl/buatAkun') ?>" method="post">
                <div class="form-group">
                <label for="NamaBru">Nama :</label>
                <input type="text" name="NamaBru" id="NamaBru" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                <label for="UsernameBru">Username :</label>
                <input type="text" name="UsernameBru" id="UsernameBru" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                <label for="PasswordBru">Password :</label>
                <input type="text" name="PasswordBru" id="PasswordBru" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                <label for="CabangBru">Nama Cabang :</label>
                <input type="text" name="CabangBru" id="cabangBru" class="form-control" placeholder="Nama Cabang">
                </div>
                <div class="form-group">
                <label for="AksesBru">Hak Akses :</label>
                <input type="text" name="AksesBru" id="AksesBru" class="form-control" placeholder="Hak Akses">
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
    <!-- /.End Modal Baru -->

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
    $('#datatable').on('click', '[id^=btnEdit]',function(){
        var $item = $(this).closest('tr');
        var nama = $.trim($item.find('.nama').text());
        var username = $.trim($item.find('.username').text());
        var cabang = $.trim($item.find('.nama_cabang').text());
        var akses = $.trim($item.find('.hak_akses').text());
        var id = $.trim($item.find('#id_admin').val());
        var status = $.trim($item.find('#status').val());
        var password = $.trim($item.find('#password').val());
        $('#namaEdt').val(nama);
        $('#usernameEdt').val(username);
        $('#cabangEdt').val(cabang);
        $('#aksesEdt').val(akses);
        $('#id').val(id);
        $('#statusEdt').val(status);
        $('#passwordEdt').val(password);
    });

    $('#datatable').on('click', '[id^=btnDelete]', function() {
      var $item = $(this).closest("tr");
      var $id = $item.find("#id_admin").val();
      //console.log($id);
      // $item.find("input[id$='no']").val();
        // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus User Ini ?',
        content: 'Hapus '+$.trim($item.find('.nama').text()),
        autoClose: 'Cancel|5000',
        buttons: {
            deleteUser: {
                text: 'Delete',
                action: function () {
                  window.location = "user_ctrl/hapus/"+$id;
                }
            },
            Cancel: function () {
            }
        }
      });
    });
});
</script>
<?php $this->load->view('template/endbody') ?>