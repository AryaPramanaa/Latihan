<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>

<div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Ruangan</h1>
                        <a href="index.php?p=ruangan&aksi=tambah" class="btn btn-primary mb-3">Tambah Ruangan</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th>Gedung</th>
                                        <th>Lantai</th>
                                        <th>Kapasitas</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
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
                                        <td>
                                            <a href="index.php?p=ruangan&aksi=edit&id=<?= $prodi['id'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="prosesRuangan.php?&proses=hapus&id=<?= $prodi['id'] ?>" class="btn btn-danger" onclick="confirm('Apakah yakin ingin menghapus data ?')">Hapus</a>
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

        $query = "SELECT * FROM ruangan WHERE id = '$_GET[id]'";
        $sql = mysqli_query($db, $query);
        $matakuliah = mysqli_fetch_array($sql);

    ?>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="m-4">Edit ruangan</h1>
                    <form action="prosesRuangan.php?proses=edit&id=<?= $matakuliah['id'] ?>" method="post">
                     
                        <input type="text" class="form-control mb-3" disabled value="ID : <?= $matakuliah['id'] ?>">

                        <input required class="form-control mb-3" type="number" name="kode_ruangan" placeholder="kode ruangan" value="<?= $matakuliah['kode_ruangan'] ?>">

                        <input required class="form-control mb-3" type="text" name="nama_ruangan" placeholder="Nama Ruangan" value="<?= $matakuliah['nama_ruangan'] ?>">

                        <input required class="form-control mb-3" type="text" name="gedung" placeholder="gedung" value="<?= $matakuliah['gedung'] ?>">

                        <input required class="form-control mb-3" type="number" name="lantai" placeholder="lantai" value="<?= $matakuliah['lantai'] ?>">

                        <input required class="form-control mb-3" type="number" name="kapasitas" placeholder="kapasitas" value="<?= $matakuliah['kapasitas'] ?>">

                        <input required class="form-control mb-3" type="text" name="keterangan" placeholder="keterangan" value="<?= $matakuliah['keterangan'] ?>">
                      
                        
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
                    <h1 class="m-4">Tambah Ruangan</h1>
                    <form action="prosesRuangan.php?proses=tambah" method="post">
                        <input required class="form-control mb-3" type="number" name="id"  placeholder="ID" require>

                        <input required class="form-control mb-3" type="number" name="kode_ruangan" placeholder="kode ruangan" require>

                        <input required class="form-control mb-3" type="text" name="nama_ruangan" placeholder="nama ruangan" require>

                        <input required class="form-control mb-3" type="text" name="gedung" placeholder="gedung" require>

                        <input required class="form-control mb-3" type="number" name="lantai" placeholder="lantai" require>

                        <input required class="form-control mb-3" type="number" name="kapasitas" placeholder="kapasitas" require>
                        
                        <input required class="form-control mb-3" type="text" name="keterangan" placeholder="keterangan" require>
                        
                        <input type="submit" name="submit" value="Tambahkan Ruangan" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}

?>