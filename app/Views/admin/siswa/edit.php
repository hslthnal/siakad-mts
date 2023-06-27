<section class="content-header">
    <h1>
          <?= $title ?>
    </h1>
</section>
<br>

<div class="row">
    <div class="col-sm-6">
        <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

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
                    echo form_open_multipart('siswa/update/'. $siswa['id_siswa']);
                ?>

                <div class="form-group">
                    <label for="" required>NISN</label>
                    <input name="nisn" value="<?= $siswa['nisn'] ?>" class="form-control" placeholder="NISN" required>
                </div>

                <div class="form-group">
                    <label for="" required>Password</label>
                    <input name="password" value="<?= $siswa['password'] ?>" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="" required>Nama Siswa</label>
                    <input name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" class="form-control" placeholder="Nama Siswa" required>
                </div>

                <div class="form-group">
                    <label for="" required>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" required>Ankatan</label>
                    <input name="angkatan" value="<?= $siswa['angkatan'] ?>" class="form-control" placeholder="Angkatan" required>
                </div>

                <div class="form-group">
                    <label for="" required>Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas']?>"><?= $value['kelas']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Foto Siswa</label>
                    <input type="file" name="foto_siswa" class="form-control">
                </div>


                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                <a href="<?= base_url('siswa') ?>" class="btn btn-danger pull-left">Tutup</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.box -->
        
    </div>
</div>