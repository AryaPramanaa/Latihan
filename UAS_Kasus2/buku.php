<div class="container text-center">
    <h1 class="my-3">Tabel Buku</h1>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori Buku</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                include "koneksi.php";

                $sql = "SELECT * FROM buku";
                $query = mysqli_query($db, $sql);

                $no = 1;
                while ($prodi = mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td><?= $prodi['id'] ?></td>
                <td><?= $prodi['kode_buku'] ?></td>
                <td><?= $prodi['judul_buku'] ?></td>
                <td><?= $prodi['kategori_buku'] ?></td>
                <td><?= $prodi['penerbit'] ?></td>
                <td><?= $prodi['pengarang'] ?></td>
                <td><?= $prodi['stok'] ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
        </tbody>
    </table>
</div>