<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>
        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Dosen</h1>
                        <a href="index.php?p=dosen&aksi=tambah"><button class="btn btn-primary mb-3">Tambah Dosen</button></a>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Dosen</th>
                                        <th>Prodi</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "koneksi.php";

                                    $sql = "SELECT * FROM prodi INNER JOIN dosen ON prodi.prodiId = dosen.prodiId";
                                    $query = mysqli_query($db, $sql);
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nip'] ?></td>
                                            <td><?= $data['namaDosen'] ?></td>
                                            <td><?= $data['namaProdi'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['notelp'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td>
                                                <a href="index.php?p=dosen&aksi=edit&nip=<?= $data['nip'] ?>" class="btn btn-warning p-1">Edit</a>
                                                <a href="prosesDosen.php?proses=hapus&nip=<?= $data['nip'] ?>" class="btn btn-danger p-1" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
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
        </div>

    <?php
        break;

    case "tambah":
    ?>

        <div class="container-fluid">
            <h1 class="text-center p-3">Halaman Tambah Dosen</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="prosesDosen.php?proses=tambah" method="post">
                        <div class="container" width="500px">
                            <input required type="text" name="nip" placeholder="Nip" class="form-control mb-3">
                            <input required type="text" name="namaDosen" placeholder="Nama Dosen" class="form-control mb-3">
                            <input required type="email" name="email" placeholder="Email" class="form-control mb-3">
                            <select required name="prodiId" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Pilih Program Studi</option>
                                <?php
                                include "koneksi.php";
                                $query = "SELECT * from prodi";
                                $sql = mysqli_query($db, $query);

                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $data['prodiId'] ?>"><?= $data['namaProdi'] ?></option>
                                <?php } ?>
                            </select>
                            <input required type="number" name="notelp" placeholder="Nomor Telepon" class="form-control mb-3">
                            <div class="form-floating mb-3">
                                <textarea required class="form-control" name="alamat" placeholder="Masukkan Alamat" value="alamat" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Alamat</label>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-4 mb-3">
                                    <input required type="submit" class="btn btn-success px-4 fw-bold" name="submit" value="Kirim Formulir">
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
        $query = "SELECT * from dosen where nip = '$_GET[nip]'";
        $sql = mysqli_query($db, $query);

        $data = mysqli_fetch_array($sql);
        ?>


        <div class="container-fluid">
            <h1 class="text-center p-3">Halaman Edit Data Dosen</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="prosesDosen.php?proses=edit&nip=<?= $data['nip'] ?>" method="post">
                        <div class="container" width="500px">
                            <input required type="text" name="nip" value="<?= $data['nip'] ?>" placeholder="Nip" class="form-control mb-3">
                            <input required type="text" name="namaDosen" value="<?= $data['namaDosen'] ?>" placeholder="Nama Dosen" class="form-control mb-3">
                            <input required type="email" name="email" placeholder="Email" value="<?= $data['email'] ?>" class="form-control mb-3">
                            <select required name="prodiId" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Pilih Program Studi</option>
                                <?php
                                include "koneksi.php";
                                $query2 = "SELECT * from prodi";
                                $sql2 = mysqli_query($db, $query2);

                                while ($data2 = mysqli_fetch_array($sql2)) {
                                ?>
                                    <option <?php if ($data['prodiId'] == $data2['prodiId']) {
                                                echo "selected";
                                            } ?> value="<?= $data2['prodiId'] ?>"><?= $data2['namaProdi'] ?></option>
                                <?php } ?>
                            </select>
                            <input required type="number" name="notelp" placeholder="Nomor Telepon" value="<?= $data['notelp'] ?>" class="form-control mb-3">
                            <div class="form-floating mb-3">
                                <textarea required class="form-control" name="alamat" placeholder="Masukkan Alamat" value="alamat" id="floatingTextarea"><?= $data['alamat'] ?></textarea>
                                <label for="floatingTextarea">Alamat</label>
                            </div>
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