<section class="content-header">
    <h1>
          <?= $title ?>
    </h1>
</section>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus">Tambahkan</i></button>
                </div>
                <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <?php 
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                            </ul>
                        </div>
                <?php } ?>



                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                      }
                    ?>



                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th>Nama Pengguna</th>
                                <th>Username</th>
                                <th>Foto</th>
                                <th width="100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_user'] ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td class="text-center">
                                        <img src="<?= base_url('foto/'. $value['foto']) ?>" class="img-circle" alt="User Image" width="70px" height="70px">
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
            </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        
    </div>
</div>

<!-- Modal Add -->
<div class="modal modal-success fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Pengguna</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open_multipart('user/add');
                ?>

                <div class="form-group">
                    <label for="">Nama Pengguna</label>
                    <input name="nama_user" class="form-control" placeholder="Pengguna" >
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" class="form-control" placeholder="Username" >
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" class="form-control" placeholder="Password" >
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-warning">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- Modal Edit -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal modal-success fade" id="edit<?= $value['id_user'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Pengguna</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open_multipart('user/edit/'. $value['id_user']);
                ?>

                <div class="form-group">
                    <label for="">Nama Pengguna</label>
                    <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Pengguna" >
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Username" >
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password" >
                </div>

                <div class="form-group">
                    <label for="">Ubah Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="form-group">
                    <img src="<?= base_url('foto/'. $value['foto']) ?>" alt="" class="img-circle" alt="User Image" width="70px" height="70px">
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-warning">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>


    <!-- Modal Delete -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal modal-success fade" id="delete<?= $value['id_user'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Pengguna</h4>
              </div>
              <div class="modal-body">

              Apakah anda yakin ingin menghapus <?= $value['nama_user'] ?> ?


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('user/delete/'. $value['id_user']) ?>" class="btn btn-warning">Hapus</a>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>