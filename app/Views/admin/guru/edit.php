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
                    echo form_open_multipart('guru/update/'. $guru['id_guru']);
                ?>

                <div class="form-group">
                    <label for="" required>NIP</label>
                    <input name="nip" value="<?= $guru['nip'] ?>" class="form-control" placeholder="NIP" required>
                </div>

                <div class="form-group">
                    <label for="" required>Password</label>
                    <input name="password" value="<?= $guru['password'] ?>" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="" required>Nama Guru</label>
                    <input name="nama_guru" value="<?= $guru['nama_guru'] ?>" class="form-control" placeholder="Nama Guru" required>
                </div>

                <div class="form-group">
                    <label for="" required>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" required>Nomor Telepon</label>
                    <input name="no_telepon" value="<?= $guru['no_telepon'] ?>" class="form-control" placeholder="No Telepon" required>
                </div>

                <div class="form-group">
                    <label for="">Status Pegawai</label>
                    <select name="id_status" class="form-control">
                        <option value="">--Pilih Status Pegawai--</option>
                        <?php foreach ($status as $key => $value) { ?>
                            <option value="<?= $value['id_status'] ?>"><?= $value['status'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Foto Guru</label>
                    <input type="file" name="foto_guru" class="form-control">
                </div>
                
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                <a href="<?= base_url('guru') ?>" class="btn btn-danger pull-left">Tutup</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.box -->
        
    </div>
</div>