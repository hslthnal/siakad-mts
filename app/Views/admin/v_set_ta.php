<section class="content-header">
    <h1>
          Atur <?= $title ?>
    </h1>
</section>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Atur Data <?= $title ?></h3>

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
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th width="100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($ta as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['ta'] ?></td>
                                    <td><?= $value['semester'] ?></td>
                                    <td>
                                      <?php if ($value['status']=='0') { 
                                        echo '<p class="label text-center bg-red">Tidak Aktif</p>';
                                      }else{
                                        echo '<p class="label text-center bg-green">Aktif</p>';
                                      } ?>
                                    </td>
                                    <td class="text-center">
                                      <?php if ($value['status']=='0') { ?>
                                        <a href="<?= base_url('ta/setStatusTa/' .$value['id_ta']) ?>" class="btn btn-success btn-sm btn-flat" ><i class="fa fa-check">Aktifkan</i></button>
                                      <?php } ?>
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
                <h4 class="modal-title">Tambahkan Tahun Akademik</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open('ta/add');
                ?>

                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <input name="ta" class="form-control" placeholder="Tahun Akademik" required>
                </div>

                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
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
<?php foreach ($ta as $key => $value) { ?>
<div class="modal modal-success fade" id="edit<?= $value['id_ta'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Tahun Akademik</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open('ta/edit/'. $value['id_ta']);
                ?>

                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <input name="ta" value="<?= $value['ta']?>" class="form-control" placeholder="Tahun Akademik" required>
                </div>

                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
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
<?php foreach ($ta as $key => $value) { ?>
<div class="modal modal-success fade" id="delete<?= $value['id_ta'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Tahun Akademik</h4>
              </div>
              <div class="modal-body">

              Apakah anda yakin ingin menghapus Tahun Akademik <?= $value['ta'] ?> ?


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('ta/delete/'. $value['id_ta']) ?>" class="btn btn-warning">Hapus</a>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>