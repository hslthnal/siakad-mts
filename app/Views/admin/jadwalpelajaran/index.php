<section class="content-header">
    <h1>
          <?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?> 
    </h1>
</section>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

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

                    <table  id="example1" class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Mapel</th>
                                <th class="text-center">Nama Mapel</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Nama Guru</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Action</th>
                            </tr>               
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($japel as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['mapel'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['hari'] ?></td>
                                <td><?= $value['waktu'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambahkan Jadwal</h4>
              </div>
              <div class="modal-body">


                <?php
                    echo form_open('jadwalpelajaran/add');
                ?>

                <div class="form-group">
                    <label for="">Pelajaran</label>
                    <select name="id_mapel" class="form-control">
                        <option value="">--Pilih Pelajaran--</option>
                        <?php foreach ($mapel as $key => $value) { ?>
                            <option value="<?= $value['id_mapel'] ?>"><?= $value['mapel'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Guru</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--Pilih Guru--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Hari</label>
                    <select name="hari" class="form-control">
                        <option value="">--Pilih Hari--</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" required>Waktu</label>
                    <input name="waktu" class="form-control" placeholder="Waktu" required>
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

<!-- Modal Delete -->
<?php foreach ($japel as $key => $value) { ?>
<div class="modal modal-success fade" id="delete<?= $value['id_jadwal'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Jadwal Pelajaran</h4>
              </div>
              <div class="modal-body">

              Apakah anda yakin ingin menghapus <?= $value['mapel'] ?> ?


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('jadwalpelajaran/delete/'. $value['id_jadwal']) ?>" class="btn btn-warning">Hapus</a>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>