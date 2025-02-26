<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>
   <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Kategori</h1>
                        <a href="index.php?p=kategori&aksi=tambah"><button class="btn btn-primary mb-3">Tambah Kategori</button></a>
                        <table id="example" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";

                                $sql = "SELECT * FROM kategori";
                                $query = mysqli_query($db, $sql);
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data['nama_kategori'] ?></td>
                                        <td>
                                            <a href="index.php?p=kategori&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-warning px-3">Edit</a>
                                            <a href="prosesKategori.php?proses=hapus&id=<?= $data['id'] ?>" class="btn btn-danger px-3" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php
        break;

    case "tambah":
    ?>

        <div class="container-fluid">
            <h1 class="text-center p-3">Halaman Kategori</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="prosesKategori.php?proses=tambah" method="post">
                        <div class="container" width="500px">
                            <input required type="text" name="nama_kategori" placeholder="Nama Kategori" class="form-control mb-3">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 mb-3">
                                    <input required type="submit" class="btn btn-success px-4 fw-bold" name="submit" value="Tambah Kategori">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
        break;

    case "edit":

    ?>
        <?php

        include "koneksi.php";
        $query = "SELECT * from kategori where id = '$_GET[id]'";
        $sql = mysqli_query($db, $query);

        $data = mysqli_fetch_array($sql);
        ?>


        <div class="container-fluid">
            <h1 class="text-center p-3">Halaman Edit Kategori</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="prosesKategori.php?proses=edit&id=<?= $data['id'] ?>" method="post">
                        <div class="container" width="500px">
                            <input required type="text" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" placeholder="Nama Kategori" class="form-control mb-3">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 mb-3">
                                    <input required type="submit" class="btn btn-success px-4 fw-bold" name="submit" value="Edit Formulir">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php

        break;

    case "hapus":
        break;
}
?>