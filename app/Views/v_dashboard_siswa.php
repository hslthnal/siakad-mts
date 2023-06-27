<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <img src="<?= base_url('fotosiswa/'.session()->get('foto'))  ?>" class="profile-user-img img-responsive img-circle" alt="User Image" height="100px" Width="100px">

              <h3 class="profile-username text-center"><?= session()->get('nama') ?></h3>

              <p class="text-muted text-center"><?= $sw['nisn']?></p><br>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-9">
        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Siswa</h3>
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
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $sw['nisn']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $sw['nama_siswa']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $sw['jenis_kelamin']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Angkatan</td>
                        <td>:</td>
                        <td><?= $sw['angkatan']?></td>
                    </tr>

                    <tr height="30px">
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $sw['kelas']?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>

