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
                    echo form_open('ruangan/insert');
                ?>

                <div class="form-group">
                    <label for="">Gedung</label>
                    <select name="id_gedung" class="form-control">
                        <option value="">--Pilih Gedung--</option>
                        <?php foreach ($gedung as $key => $value) { ?>
                            <option value="<?= $value['id_gedung'] ?>"><?= $value['gedung'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" required>Ruangan</label>
                    <input name="ruangan" class="form-control" placeholder="Ruangan" required>
                </div>

                


                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                <a href="<?= base_url('ruangan') ?>" class="btn btn-danger pull-left">Tutup</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.box -->
        
    </div>
</div>