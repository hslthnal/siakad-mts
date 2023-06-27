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
                                <th>Status Kepegawaian</th>
                                <th>Keterangan</th>
                                <th width="100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($status as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['status'] ?></td>
                                    <td><?= $value['keterangan'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_status'] ?>"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_status'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambahkan Status Kepegawaian</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open('status/add');
                ?>

                <div class="form-group">
                    <label for="">Status Kepegawaian</label>
                    <input name="status" class="form-control" placeholder="Status Kepegawaian" required>
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input name="keterangan" class="form-control" placeholder="Keterangan">
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
<?php foreach ($status as $key => $value) { ?>
<div class="modal modal-success fade" id="edit<?= $value['id_status'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Tahun Akademik</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open('status/edit/'. $value['id_status']);
                ?>

                <div class="form-group">
                    <label for="">Status Kepegawaian</label>
                    <input name="status" class="form-control" placeholder="Status Kepegawaian" required>
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input name="keterangan" class="form-control" placeholder="Keterangan">
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
<?php foreach ($status as $key => $value) { ?>
<div class="modal modal-success fade" id="delete<?= $value['id_status'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Status Kepegawaian</h4>
              </div>
              <div class="modal-body">

              Apakah anda yakin ingin menghapus Status Kepegawaian <?= $value['status'] ?> ?


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('status/delete/'. $value['id_status']) ?>" class="btn btn-warning">Hapus</a>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>