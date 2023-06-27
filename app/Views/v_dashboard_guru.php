<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <img src="<?= base_url('fotoguru/'.session()->get('foto'))  ?>" class="profile-user-img img-responsive" alt="User Image" height="100px" Width="100px">

              <h3 class="profile-username text-center"><?= session()->get('nama') ?></h3>

              <p class="text-muted text-center"><?= $guru['nip']?></p><br>
            </div>
            <!-- /.box-body -->
        </div>
        </div>

        <div class="col-md-9">
            <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Guru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table-responsive">
                    <tr height="30px">
                        <td width="250px">Tahun Akademik</td>
                        <td width="20px">:</td>
                        <td><?= $ta['ta']?> <?= $ta['semester']?></td>
                    </tr>

                    <tr height="30px">
                        <td>NIP</td>
                        <td>:</td>
                        <td><?= $guru['nip']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $guru['nama_guru']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Status Pegawai</td>
                        <td>:</td>
                        <td><?= $guru['status']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $guru['jenis_kelamin']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><?= $guru['no_telepon']?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </div>