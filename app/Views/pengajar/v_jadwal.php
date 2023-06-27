<section class="content-header">
    <h1>
          <?= $title ?>
    </h1>
</section>
<br>

<div class="row">
    <table class="table table-responsive table-striped table-bordered">
        <tr class="label-success">
            <th>No</th>
            <th>Hari</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Guru</th>
        </tr>
        
        <?php $no = 1;
        foreach ($jadwal as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                <td><?= $value['mapel'] ?></td>
                <td><?= $value['kelas'] ?></td>
                <td><?= $value['nama_guru'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>