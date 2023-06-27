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
                    <?php if (session()->get('level') == 1) { ?>
                        <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus">Tambahkan</i></button>
                    <?php } ?>
                    
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
                                <th>Nama Kelas</th>
                                <th>Nama Guru</th>
                                <th>Tahun Angkatan</th>
                                <th>Jumlah Siswa</th>
                                <th width="100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db = \Config\Database::connect();
                            foreach ($romkel as $key => $value) {
                                $jml = $db->table('tbl_siswa')
                                    ->where('id_romkel', $value['id_romkel'])
                                    ->countAllResults();
                               ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['kelas'] ?></td>
                                    <td><?= $value['nama_guru'] ?></td>
                                    <td><?= $value['tahun_angkatan'] ?></td>
                                    <td class="text-center">
                                        <p class="label bg-green"><?= $jml ?></p>
                                        <br>
                                        <?php if (session()->get('level') == 1) { ?>
                                            <a href="<?= base_url('romkel/rincian_kelas/'. $value['id_romkel']) ?>">Siswa</a>
                                        <?php } ?>
                                        
                                    </td>
                                    <td class="text-center">
                                        <?php if (session()->get('level') == 1) { ?>
                                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_romkel'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambahkan Rombongan Kelas</h4>
              </div>
              <div class="modal-body">
                <?php
                    echo form_open('romkel/add');
                ?>

                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Nama Wali Kelas</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--Pilih Guru--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tahun Angkatan</label>
                    <select name="tahun_angkatan" class="form-control">
                        <option value="">--Pilih Tahun--</option>
                        <?php for ($i=date('Y'); $i>=date('Y')-10; $i--) {  ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
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

        <!-- Modal Delete -->
<?php foreach ($romkel as $key => $value) { ?>
<div class="modal modal-success fade" id="delete<?= $value['id_romkel'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Kelas</h4>
              </div>
              <div class="modal-body">

              Apakah anda yakin ingin menghapus <?= $value['kelas'] ?> ?


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('romkel/delete/'. $value['id_romkel']) ?>" class="btn btn-warning">Hapus</a>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>