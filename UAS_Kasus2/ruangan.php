<div class="container text-center">
    <h1 class="my-3">Tabel Mahasiswa</h1>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Gedung</th>
                <th>Lantai</th>
                <th>Kapasitas</th>
                <th>Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                include "koneksi.php";

                $sql = "SELECT * FROM ruangan";
                $query = mysqli_query($db, $sql);

                $no = 1;
                while ($prodi = mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td><?= $prodi['id'] ?></td>
                <td><?= $prodi['kode_ruangan'] ?></td>
                <td><?= $prodi['nama_ruangan'] ?></td>
                <td><?= $prodi['gedung'] ?></td>
                <td><?= $prodi['lantai'] ?></td>
                <td><?= $prodi['kapasitas'] ?></td>
                <td><?= $prodi['keterangan'] ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
        </tbody>
    </table>
</div>