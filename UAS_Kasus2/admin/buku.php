<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>

<div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Buku</h1>
                        <a href="index.php?p=buku&aksi=tambah" class="btn btn-primary mb-3">Tambah Buku</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                        <td>
                                            <a href="index.php?p=buku&aksi=edit&id=<?= $prodi['id'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="prosesBuku.php?&proses=hapus&id=<?= $prodi['id'] ?>" class="btn btn-danger" onclick="confirm('Apakah yakin ingin menghapus data ?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        break;
    case "edit":

        include "koneksi.php";

        $query = "SELECT * FROM buku WHERE id = '$_GET[id]'";
        $sql = mysqli_query($db, $query);
        $matakuliah = mysqli_fetch_array($sql);

    ?>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="m-4">Edit Buku</h1>
                    <form action="prosesBuku.php?proses=edit&id=<?= $matakuliah['id'] ?>" method="post">
                     
                        <input type="text" class="form-control mb-3" disabled value="ID : <?= $matakuliah['id'] ?>">

                        <input required class="form-control mb-3" type="number" name="kode_buku" placeholder="Kode buku" value="<?= $matakuliah['kode_buku'] ?>">

                        <input required class="form-control mb-3" type="text" name="judul_buku" placeholder="Judul Buku" value="<?= $matakuliah['judul_buku'] ?>">

                        <input required class="form-control mb-3" type="text" name="kategori_buku" placeholder="kategori Buku" value="<?= $matakuliah['kategori_buku'] ?>">

                        <input required class="form-control mb-3" type="text" name="penerbit" placeholder="Penerbit" value="<?= $matakuliah['penerbit'] ?>">

                        <input required class="form-control mb-3" type="text" name="pengarang" placeholder="Pengarang" value="<?= $matakuliah['pengarang'] ?>">

                        <input required class="form-control mb-3" type="number" name="stok" placeholder="stok" value="<?= $matakuliah['stok'] ?>">
                      
                        
                        <input type="submit" name="submit" value="Edit Ruangan" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>

    <?php
        break;

    case "tambah":
    ?>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="m-4">Tambah Buku</h1>
                    <form action="prosesBuku.php?proses=tambah" method="post">
                        <input required class="form-control mb-3" type="number" name="id"  placeholder="ID" require>

                        <input required class="form-control mb-3" type="number" name="kode_buku" placeholder="kode Buku" require>

                        <input required class="form-control mb-3" type="text" name="judul_buku" placeholder="judul buku" require>

                        <input required class="form-control mb-3" type="text" name="kategori_buku" placeholder="kategori_buku" require>

                        <input required class="form-control mb-3" type="text" name="penerbit" placeholder="penerbit" require>

                        <input required class="form-control mb-3" type="text" name="pengarang" placeholder="pengarang" require>
                        
                        <input required class="form-control mb-3" type="number" name="stok" placeholder="stok" require>
                        
                        <input type="submit" name="submit" value="Tambahkan Ruangan" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}

?>