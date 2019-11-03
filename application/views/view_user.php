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
      <small>
        <?php echo $_SESSION['nama']; ?></small>
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
        <h3 class="box-title"><button type="button" class="btn btn-medium btn-block btn-primary" data-toggle="modal"
            data-target="#modalBaru">Buat Akun</button></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th class="min-tablet">Hak Akses</th>
                <th class="min-tablet">Status Aktif</th>
                <th class="min-desktop">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($data as $item): 
                    if ($item->status_aktif == 1) {
                      $status = 'Aktif';
                    }else {
                      $status = 'Non_Aktif';
                    }
                    if ($item->kode_akses == null){
                      $hak_akses = "Null";
                    }else {
                      $hak_akses = $item->hak_akses;
                    }
                    ?>
              <tr>
                <input type="hidden" name="id" id="id_admin" value="<?php echo $item->id_admin ?>">
                <input type="hidden" name="kode_akses" id="kode_akses" value="<?php echo $item->kode_akses ?>">
                <td>
                  <?php echo $no; ?>
                </td>
                <td class="nama">
                  <?php echo $item->nama; ?>
                </td>
                <td class="username">
                  <?php echo $item->username; ?>
                </td>
                <td class="hak_akses">
                  <?php echo $hak_akses; ?>
                </td>
                <td class="status">
                  <?php echo $status; ?>
                  <input type="hidden" name="status" id="status" value="<?php echo $item->status_aktif ?>">
                </td>
                <td>
                  <a href="<?=base_url("History/index/").$item->id_admin?>"><button id="btnView" class="btnView btn btn-primary btn-xs"><i
                      class="fa fa-eye"></i></button></a>
                  <button id="btnEdit" data-toggle="modal" data-target="#modalEdit" class="btn btn-warning btn-xs"><i
                      class="fa fa-gear"></i></button>
                  <button id="btnDelete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <?php $no++; endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    <!-- Start Modal Baru -->
    <div class="modal fade" id="modalBaru">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Buat Admin Baru</h4>
          </div>
          <form id="formTambah" action="<?= site_url('user_ctrl/buatAkun') ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="NamaBru">Nama :</label>
                <input type="text" name="NamaBru" id="NamaBru" class="form-control" placeholder="Nama" required>
              </div>
              <div class="form-group">
                <label for="UsernameBru">Username :</label>
                <input type="text" name="UsernameBru" id="UsernameBru" class="form-control" placeholder="Username"
                  required>
              </div>
              <div class="form-group">
                <label for="editPass">Password</label>
                <input type="password" name="passBru" id="passBru" class="form-control" placeholder="********" required>
              </div>
              <div class="form-group">
                <label for="confirmPassword">Confirmasi Password</label>
                <input type="password" name="passConfirm" id="passConfirm" class="form-control" placeholder="********"
                  required>
              </div>
              <div class="form-group">
                <label for="AksesBru">Hak Akses :</label>
                <select name="aksesBru" id="aksesBru" class="form-control" required>
                  <?php foreach ($getHakAkses as $item) : ?>
                  <option value="<?= $item->kode_akses ?>">
                    <?= $item->hak_akses ?>
                  </option>
                  <?php endforeach; ?>
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
    <!-- /.End Modal Baru -->

    <!-- Start Modal Edit -->
    <div class="modal fade" id="modalEdit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit User</h4>
          </div>
          <form id="formEdit" action="<?= site_url('user_ctrl/edit')?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="namaEdt">Nama :</label>
                <input type="text" name="namaEdt" id="namaEdt" class="form-control" placeholder="Nama">
              </div>
              <div class="form-group">
                <label for="usernameEdt">Username :</label>
                <input type="text" name="usernameEdt" id="usernameEdt" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="aksesEdt">Hak Akses :</label>
                <select name="aksesEdt" id="aksesEdt" class="form-control">
                  <?php foreach ($getHakAkses as $item) : ?>
                  <option value="<?= $item->kode_akses ?>">
                    <?= $item->hak_akses ?>
                  </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="StatusEdt">Status Aktif : </label>
                <select class="form-control" name="statusEdt" id="statusEdt">
                  <option value="1">Aktif</option>
                  <option value="0">Non_Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label for="passwordEdt">Password :</label>
                <input type="password" name="passwordEdt" id="passwordEdt" class="form-control" placeholder="Password" aria-describedby="password">
                <small id="password" class="text-muted">Password Boleh Kosong</small>
              </div>
              <div class="form-group">
                <label for="passConfirmEdt">Password Confirmation :</label>
                <input type="password" name="passConfirmEdt" id="passConfirmEdt" class="form-control" placeholder="Password" aria-describedby="passwordConfirm">
                <small id="PasswordConfirm" class="text-muted">Password Boleh Kosong</small>
              </div>
              <input type="hidden" name="id_admin" id="id" value="">
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
    <!-- /.End Modal Edit -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>
<script src="<?= base_url('assets/AdminLTE-2.3.7/plugins/bootstrap-validator/bootstrapValidator.min.js') ?>"></script>
<script>
  $(document).ready(function () {
    $("#datatable").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    })
    $('#datatable').on('click', '[id^=btnEdit]', function () {
      var $item = $(this).closest('tr');
      var nama = $.trim($item.find('.nama').text());
      var username = $.trim($item.find('.username').text());
      var cabang = $.trim($item.find('.nama_cabang').text());
      var akses = $.trim($item.find('#kode_akses').val());
      var id = $.trim($item.find('#id_admin').val());
      var status = $.trim($item.find('#status').val());
      var password = $.trim($item.find('#password').val());
      console.log(status);
      $('#namaEdt').val(nama);
      $('#usernameEdt').val(username);
      $('#cabangEdt').val(cabang);
      $('#aksesEdt').val(akses);
      $('#statusEdt').val(status);
      $('#id').val(id);
    });

    var faIcon = {
      valid: 'fa fa-check-circle fa-lg text-success',
      invalid: 'fa fa-times-circle fa-lg',
      validating: 'fa fa-refresh'
    }

    $('#formTambah').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: faIcon,
      fields: {
        passBru: {
          validators: {
            notEmpty: {
              message: 'The password is required and can\'t be empty'
            },
            identical: {
              field: 'passConfirm',
              message: 'The password and its confirm are not the same'
            }
          }
        },
        passConfirm: {
          validators: {
            notEmpty: {
              message: 'The confirm password is required and can\'t be empty'
            },
            identical: {
              field: 'passBru',
              message: 'The password and its confirm are not the same'
            }
          }
        }
      }
    });

    $('#formEdit').bootstrapValidator({
      feedbackIcons: faIcon,
      fields: {
        passwordEdt: {
          validators: {
            identical: {
              field: 'passConfirmEdt',
              message: 'The password and its confirm are not the same'
            }
          }
        },
        passConfirmEdt: {
          validators: {
            identical: {
              field: 'passwordEdt',
              message: 'The password and its confirm are not the same'
            }
          }
        }
      }
    });

    $('#datatable').on('click', '[id^=btnDelete]', function () {
      var $item = $(this).closest("tr");
      var $id = $item.find("#id_admin").val();
      //console.log($id);
      // $item.find("input[id$='no']").val();
      // alert("hai");
      $.confirm({
        theme: 'supervan',
        title: 'Hapus User Ini ?',
        content: 'Hapus ' + $.trim($item.find('.nama').text()),
        autoClose: 'Cancel|5000',
        buttons: {
          Cancel: function () {},
            deleteUser: {
            text: 'Delete',
            action: function () {
              window.location = "user_ctrl/hapus/" + $id;
            }
          }
        }
      });
    });
  });
</script>
<?php $this->load->view('template/endbody') ?>