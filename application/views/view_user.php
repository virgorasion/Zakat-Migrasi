<?php 
$this->load->view('template/head');
?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-validator/dist/css/bootstrapValidator.min.css">
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
                    <h1>User Kontrol</h1>
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
                    Daftar User
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <form action="<?=site_url('Jadwal_jumat_ctrl/index')?>" method="post" class="form-group">
                            <div class="col-sm-12 row">
                                <?php if ($_SESSION['11insert'] == 1): ?>
                                <button type="button" name="btnTambah" id="btnTambah"
                                    class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modalBaru">Tambah Data</button>
                                <?php endif ?>
                            </div>
                        </form>
                        <!-- /.form group -->

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
                                    class="fa fa-edit"></i></button>
                                <button id="btnDelete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php $no++; endforeach ?>
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

        <!-- Start Modal Baru -->
        <div class="modal fade" id="modalBaru">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Admin Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
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
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
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
$this->load->view('template/js');
?>
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- bootstrap-validator -->
<script src="<?= base_url()?>assets/plugins/bootstrap-validator/dist/js/bootstrapValidator.min.js"></script>
<!-- <script src="<?= base_url()?>assets/plugins/bootstrap-validator/dist/js/"></script> -->

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