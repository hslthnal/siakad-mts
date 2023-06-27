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
                    echo form_open('kelas/update/'. $kelas['id_kelas']);
                ?>

                <div class="form-group">
                    <label for="">Ruangan</label>
                    <select name="id_ruangan" class="form-control">
                        <option value="">--Pilih Ruangan--</option>
                        <?php foreach ($ruangan as $key => $value) { ?>
                            <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" required>Kelas</label>
                    <input name="kelas" value="<?= $kelas['kelas'] ?>" class="form-control" placeholder="Kelas" required>
                </div>

                <div class="form-group">
                    <label for="">Nama Wali Kelas</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--Pilih Wali Kelas--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>


                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                <a href="<?= base_url('kelas') ?>" class="btn btn-danger pull-left">Tutup</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.box -->
        
    </div>
</div>