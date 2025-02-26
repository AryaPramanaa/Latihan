<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>


        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Mahasiswa</h1>
                        <a href="index.php?aksi=tambah"><button class="btn btn-primary mb-3">Tambah Mahasiswa</button></a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Prodi</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Hobi</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "koneksi.php";

                                    $sql = "SELECT * FROM prodi INNER JOIN mahasiswa ON prodi.prodiId = mahasiswa.prodiId";
                                    $query = mysqli_query($db, $sql);
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nim'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['namaProdi'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['tanggalLahir'] ?></td>
                                            <td><?= $data['hobi'] ?></td>
                                            <td><?= $data['jenisKelamin'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td>
                                                <a href="index.php?p=mahasiswa&aksi=edit&nim=<?= $data['nim'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="prosesMahasiswa.php?proses=hapus&nim=<?= $data['nim'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="prosesMahasiswa.php?proses=tambah" method="post">
                        <div class="container" width="500px">
                            <input required type="text" name="nama" placeholder="Nama" class="form-control mb-3">
                            <input required type="number" name="nim" placeholder="Nim" class="form-control mb-3">
                            <div class="row mb-3">
                                <div class="col-3"><input required type="radio" name="jenisKelamin" value="L" class="form-check-input"> Laki-Laki</div>
                                <div class="col-3"><input required type="radio" name="jenisKelamin" value="P" class="form-check-input"> Perempuan</div>
                            </div>
                            <select required name="prodi" class="form-select mb-3" aria-label="Default select example">
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
                            <input name="email" type="text" placeholder="Email" class="form-control mb-3">
                            <h5 class="text-center">Hobi</h5>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Menyanyi" id="menyanyi">
                                    <label class="form-check-label" for="menyanyi">
                                        Menyanyi
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Mengambar" id="Mengambar">
                                    <label class="form-check-label" for="Mengambar">
                                        Mengambar
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Menari" id="Menari">
                                    <label class="form-check-label" for="Menari">
                                        Menari
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <select required class="form-select mb-3" name="tanggal" aria-label="Default select example">
                                        <option selected>Pilih Tanggal Lahir</option>
                                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select class="form-select mb-3" name="bulan" aria-label="Default select example">
                                        <option selected>Pilih Bulan Lahir</option>
                                        <?php $bulan = [1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] ?>
                                        <?php foreach ($bulan as $key => $value) { ?>
                                            <option value="<?= $key ?>"><?= $value ?></option>
                                            <?php ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select name="tahun" class="form-select mb-3" aria-label="Default select example">
                                        <option selected>Pilih Tahun Lahir</option>
                                        <?php for ($i = 2024; $i >= 1800; $i--) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
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

        
        $nim = isset($_GET['nim']) ? $_GET['nim'] : '';

        if ($nim) {
          
            $nim = mysqli_real_escape_string($db, $nim);

            $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
            $query = mysqli_query($db, $sql);
            $dataMahasiswa = mysqli_fetch_array($query);

            if (!$dataMahasiswa) {
                die("Data mahasiswa tidak ditemukan.");
            }

            
            $tgl = explode('-', $dataMahasiswa['tanggalLahir']);
            $hobi = explode(',', $dataMahasiswa['hobi']);
        }

        if (isset($_POST['submit'])) {
           
            $nama = mysqli_real_escape_string($db, $_POST['nama']);
            $nim = mysqli_real_escape_string($db, $_POST['nim']);
            $jenisKelamin = $_POST['jenisKelamin'];
            $prodi = $_POST['prodi'];
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $hobi = isset($_POST['hobi']) ? implode(',', $_POST['hobi']) : '';
            $tanggal = $_POST['tanggal'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $alamat = mysqli_real_escape_string($db, $_POST['alamat']);

           
            $tanggalLahir = "$tahun-$bulan-$tanggal";

            
            $updateSql = "UPDATE mahasiswa SET 
                    nama = '$nama', 
                    jenisKelamin = '$jenisKelamin', 
                    prodiId = '$prodi', 
                    email = '$email', 
                    hobi = '$hobi', 
                    tanggalLahir = '$tanggalLahir', 
                    alamat = '$alamat' 
                  WHERE nim = '$nim'";

            if (mysqli_query($db, $updateSql)) {
                echo "<script>alert('Data mahasiswa berhasil diperbarui.'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui data mahasiswa.');</script>";
            }
        }

        ?>

        <div class="container-fluid">
            <h1 class="text-center p-3">Edit Mahasiswa</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <div class="container">
                            <input required type="text" name="nama" placeholder="Nama" class="form-control mb-3" value="<?= $dataMahasiswa['nama'] ?>">
                            <input required type="number" name="nim" placeholder="Nim" class="form-control mb-3" value="<?= $dataMahasiswa['nim'] ?>" readonly>

                            <div class="row mb-3">
                                <div class="col-3">
                                    <input <?php if ($dataMahasiswa['jenisKelamin'] == "L") echo "checked"; ?> required type="radio" name="jenisKelamin" value="L" class="form-check-input"> Laki-Laki
                                </div>
                                <div class="col-3">
                                    <input <?php if ($dataMahasiswa['jenisKelamin'] == "P") echo "checked"; ?> required type="radio" name="jenisKelamin" value="P" class="form-check-input"> Perempuan
                                </div>
                            </div>

                            <select required name="prodi" class="form-select mb-3">
                                <option>Pilih Program Studi</option>
                                <?php
                                $queryProdi = "SELECT * from prodi";
                                $sqlProdi = mysqli_query($db, $queryProdi);

                                while ($dataProdi = mysqli_fetch_array($sqlProdi)) {
                                ?>
                                    <option <?php if ($dataMahasiswa['prodiId'] == $dataProdi['prodiId']) echo "selected"; ?> value="<?= $dataProdi['prodiId'] ?>"><?= $dataProdi['namaProdi'] ?></option>
                                <?php } ?>
                            </select>

                            <input name="email" type="email" placeholder="Email" class="form-control mb-3" value="<?= $dataMahasiswa['email'] ?>" required>

                            <h5 class="text-center">Hobi</h5>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <input <?php if (in_array('Menyanyi', $hobi)) echo "checked"; ?> class="form-check-input" type="checkbox" name="hobi[]" value="Menyanyi" id="menyanyi">
                                    <label class="form-check-label" for="menyanyi">Menyanyi</label>
                                </div>
                                <div class="col-lg-4">
                                    <input <?php if (in_array('Mengambar', $hobi)) echo "checked"; ?> class="form-check-input" type="checkbox" name="hobi[]" value="Mengambar" id="Mengambar">
                                    <label class="form-check-label" for="Mengambar">Mengambar</label>
                                </div>
                                <div class="col-lg-4">
                                    <input <?php if (in_array('Menari', $hobi)) echo "checked"; ?> class="form-check-input" type="checkbox" name="hobi[]" value="Menari" id="Menari">
                                    <label class="form-check-label" for="Menari">Menari</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <select required class="form-select mb-3" name="tanggal">
                                        <option>Pilih Tanggal Lahir</option>
                                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                                            <option <?php if ($tgl[2] == $i) echo "selected"; ?> value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select required class="form-select mb-3" name="bulan">
                                        <option>Pilih Bulan Lahir</option>
                                        <?php
                                        $bulan = [1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                                        foreach ($bulan as $key => $value) { ?>
                                            <option <?php if ($tgl[1] == $key) echo "selected"; ?> value="<?= $key ?>"><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select required name="tahun" class="form-select mb-3">
                                        <option>Pilih Tahun Lahir</option>
                                        <?php for ($i = 2024; $i >= 1800; $i--) { ?>
                                            <option <?php if ($tgl[0] == $i) echo "selected"; ?> value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea required class="form-control" name="alamat" placeholder="Masukkan Alamat" id="floatingTextarea"><?= $dataMahasiswa['alamat'] ?></textarea>
                                <label for="floatingTextarea">Alamat</label>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 mb-3">
                                    <input required type="submit" class="btn btn-success px-4 fw-bold" name="submit" value="Update Formulir">
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