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
                    <table class="table">
                        <tr>
                            <th width="150px">Nama Kelas</th>
                            <th width="20px">:</th>
                            <th><?= $romkel["kelas"] ?></th>
                        </tr>
                        <tr>
                            <th width="150px">Wali Kelas</th>
                            <th width="20px">:</th>
                            <th><?= $romkel["nama_guru"] ?></th>
                        </tr>
                        <tr>
                            <th width="150px">Angkatan</th>
                            <th width="20px">:</th>
                            <th><?= $romkel["tahun_angkatan"] ?></th>
                        </tr>
                        <tr>
                            <th width="150px">Jumlah</th>
                            <th width="20px">:</th>
                            <th><?= $jml ?></th>
                            <th></th>
                        </tr>


                    </table>


                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                      }
                    ?>
                     <table class="table table-bordered">
                        <tr>
                            <th width="50px" class="text-center label-success">No</th>
                            <th width="150px" class="text-center label-success">NISN</th>
                            <th class="label-success">Nama Siswa</th>
                            <th width="50px" class="text-center label-success">Action</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $value['nisn']?></td>
                                <td><?= $value['nama_siswa']?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('romkel/remove_anggota_kelas/'. $value['id_siswa'] . '/' . $romkel['id_romkel']) ?>" class="btn btn-flat btn-small btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        
                     </table> 
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Siswa</h4>
              </div>
              <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th width="20px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        foreach ($siswa_tpk as $key => $value) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $value['nisn'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('romkel/add_anggota_kelas/'. $value['id_siswa'] . '/' . $romkel['id_romkel']) ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                            
                </table>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->