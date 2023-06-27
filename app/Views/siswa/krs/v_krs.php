<section class="content-header">
    <h1>
          <?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?> 
    </h1>
</section>
<br>

<div class="row">
    <div class="col-sm-12">
        <table class="table-striped table-responsive">
                <tr>
                    <td rowspan="5"><img src="<?= base_url('fotosiswa/'. $murid['foto_siswa']) ?>" height="150px"></td>
                    <td width="150px">Tahun Akademik</td>
                    <td width="20px">:</td>
                    <td><?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?> </td>
                    <td rowspan="5"></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?= $murid['nisn'] ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?= $murid['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $murid['kelas'] ?></td>
                </tr>
                <tr>
                    <td>Guru</td>
                    <td>:</td>
                    <td><?= $murid['nama_guru'] ?></td>
                </tr>
        </table><br>
    </div>

    <div class="col-sm-12">
        <table class="table table-striped table-bordered table-responsive">
           
                <tr class="label-success">
                    <th>No</th>
                    <th>Kode Mapel</th>
                    <th>Kode Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                </tr>
            
                <?php
                $no = 1;
                foreach ($japel as $key => $value) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $value['kode_mapel'] ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td><?= $value['kelas'] ?></td>
                        <td><?= $value['nama_guru'] ?></td>
                        <td><?= $value['hari'] ?></td>
                        <td><?= $value['waktu'] ?></td>
                    </tr>  
                <?php } ?>
                
            
        </table>
    </div>

</div>