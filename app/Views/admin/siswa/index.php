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
                    <a href="<?= base_url('siswa/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus">Tambahkan</i></a>
                </div>
                <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Angkatan</th>
                                <th>Kelas</th>
                                <th>Foto</th>
                                <th width="100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;
                          foreach ($siswa as $key => $value) { ?>
                            <tr>
                              <td><?= $no++?></td>
                              <td><?= $value['nisn']?></td>
                              <td><?= $value['nama_siswa']?></td>
                              <td><?= $value['jenis_kelamin']?></td>
                              <td><?= $value['angkatan']?></td>
                              <td><?= $value['kelas']?></td>
                              <td class=" text-center">
                                <img src="<?= base_url('fotosiswa/'. $value['foto_siswa']) ?>" class="img-circle" width="70px" height="70px">
                              </td>
                              <td class="text-center">
                                <a href="<?= base_url('siswa/edit/'. $value['id_siswa']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_siswa'] ?>"><i class="fa fa-trash"></i></button>
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

<!-- Modal Delete -->
<?php foreach ($siswa as $key => $value) { ?>
<div class="modal modal-success fade" id="delete<?= $value['id_siswa'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Siswa</h4>
              </div>
              <div class="modal-body">

              Apakah anda yakin ingin menghapus <?= $value['nama_siswa'] ?> ?


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('siswa/delete/'. $value['id_siswa']) ?>" class="btn btn-warning">Hapus</a>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>