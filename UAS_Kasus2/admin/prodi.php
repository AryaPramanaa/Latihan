<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>

        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Prodi</h1>
                        <a href="index.php?p=prodi&aksi=tambah" class="btn btn-primary mb-3">Tambah Prodi</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Prodi ID</th>
                                        <th>Nama Prodi</th>
                                        <th>Jenjang Studi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        include "koneksi.php";

                                        $sql = "SELECT * FROM prodi";
                                        $query = mysqli_query($db, $sql);

                                        $no = 1;
                                        while ($prodi = mysqli_fetch_array($query)) {
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $prodi['prodiId'] ?></td>
                                        <td><?= $prodi['namaProdi'] ?></td>
                                        <td><?= $prodi['jenjangStudi'] ?></td>
                                        <td><?= $prodi['keterangan'] ?></td>
                                        <td>
                                            <a href="index.php?p=prodi&aksi=edit&id=<?= $prodi['prodiId'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="prosesProdi.php?&proses=hapus&id=<?= $prodi['prodiId'] ?>" class="btn btn-danger" onclick="confirm('Apakah yakin ingin menghapus data ?')">Hapus</a>
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

        $query = "SELECT * FROM prodi WHERE prodiId = '$_GET[id]'";
        $sql = mysqli_query($db, $query);
        $dataProdi = mysqli_fetch_array($sql);

    ?>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="m-4">Edit Prodi</h1>
                    <form action="prosesProdi.php?proses=edit&id=<?= $dataProdi['prodiId'] ?>" method="post">
                        <input type="text" class="form-control mb-3" disabled value="ID : <?= $dataProdi['prodiId'] ?>">
                        <input required class="form-control mb-3" type="text" name="namaProdi" placeholder="Nama Prodi" value="<?= $dataProdi['namaProdi'] ?>">
                        <select required name="jenjangStudi" class="form-select mb-3">
                            <option>Pilih Jenjang Studi</option>
                            <option <?php if ($dataProdi['jenjangStudi'] == "D2") {
                                        echo "selected";
                                    } ?> value="D2">D-2</option>
                            <option <?php if ($dataProdi['jenjangStudi'] == "D3") {
                                        echo "selected";
                                    } ?> value="D3">D-3</option>
                            <option <?php if ($dataProdi['jenjangStudi'] == "D4") {
                                        echo "selected";
                                    } ?> value="D4">D-4</option>
                            <option <?php if ($dataProdi['jenjangStudi'] == "S1") {
                                        echo "selected";
                                    } ?> value="S1">S-1</option>
                            <option <?php if ($dataProdi['jenjangStudi'] == "S2") {
                                        echo "selected";
                                    } ?> value="S2">S-2</option>
                            <option <?php if ($dataProdi['jenjangStudi'] == "S3") {
                                        echo "selected";
                                    } ?> value="S3">S-3</option>
                        </select>
                        <textarea required name="keterangan" placeholder="Masukkan Keterangan" class="form-control mb-3"><?= $dataProdi['keterangan'] ?></textarea>
                        <input type="submit" name="submit" value="Edit Program Studi" class="btn btn-success">
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
                    <h1 class="m-4">Tambah Prodi</h1>
                    <form action="prosesProdi.php?proses=tambah" method="post">
                        <input required class="form-control mb-3" type="text" name="namaProdi" placeholder="Nama Prodi">
                        <select required name="jenjangStudi" class="form-select mb-3">
                            <option Selected>Pilih Jenjang Studi</option>
                            <option value="D2">D-2</option>
                            <option value="D3">D-3</option>
                            <option value="D4">D-4</option>
                            <option value="S1">S-1</option>
                            <option value="S2">S-2</option>
                            <option value="S3">S-3</option>
                        </select>
                        <textarea required name="keterangan" placeholder="Masukkan Keterangan" class="form-control mb-3"></textarea>
                        <input type="submit" name="submit" value="Tambahkan Program Studi" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}

?>