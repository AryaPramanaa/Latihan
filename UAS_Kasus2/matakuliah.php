<div class="container text-center">
    <h1 class="my-3">Tabel Mahasiswa</h1>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MataKuliah</th>
                <th>Nama MataKuliah</th>
                <th>sks</th>
                <th>prodi id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";

            $sql = "SELECT * FROM matakuliah";
            $query = mysqli_query($db, $sql);

            $no = 1;
            while ($prodi = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $prodi['kode_mk'] ?></td>
                    <td><?= $prodi['nama_mk'] ?></td>
                    <td><?= $prodi['sks'] ?></td>
                    <td><?= $prodi['prodiId'] ?></td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </tbody>
    </table>
</div>