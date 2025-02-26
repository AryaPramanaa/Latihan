<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>

        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Matakuliah</h1>
                        <a href="index.php?p=matakuliah&aksi=tambah" class="btn btn-primary mb-3">Tambah Matakuliah</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode MataKuliah</th>
                                        <th>Nama MataKuliah</th>
                                        <th>sks</th>
                                        <th>prodi id</th>
                                        <th>Semester</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        include "koneksi.php";

                                        $sql = "SELECT * FROM matakuliah";
                                        $query = mysqli_query($db, $sql);

                                        $no = 1;
                                        while ($prodi = mysqli_fetch_array($query)) {
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $prodi['kode_mk'] ?></td>
                                        <td><?= $prodi['nama_mk'] ?></td>
                                        <td><?= $prodi['sks'] ?></td>
                                        <td><?= $prodi['prodiId'] ?></td>
                                        <td><?= $prodi['semester'] ?></td>
                                        <td>
                                            <a href="index.php?p=matakuliah&aksi=edit&id=<?= $prodi['kode_mk'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="prosesMatakuliah.php?&proses=hapus&id=<?= $prodi['kode_mk'] ?>" class="btn btn-danger" onclick="confirm('Apakah yakin ingin menghapus data ?')">Hapus</a>
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

        $query = "SELECT * FROM matakuliah WHERE kode_mk = '$_GET[id]'";
        $sql = mysqli_query($db, $query);
        $matakuliah = mysqli_fetch_array($sql);

    ?>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="m-4">Edit Mata Kuliah</h1>
                    <form action="prosesMatakuliah.php?proses=edit&id=<?= $matakuliah['kode_mk'] ?>" method="post">
                     
                        <input type="text" class="form-control mb-3" disabled value="Kode MK : <?= $matakuliah['kode_mk'] ?>">

                     
                        <input required class="form-control mb-3" type="text" name="nama_mk" placeholder="Nama Mata Kuliah" value="<?= $matakuliah['nama_mk'] ?>">

                      
                        <input required class="form-control mb-3" type="number" name="sks" placeholder="SKS" value="<?= $matakuliah['sks'] ?>">

                      
                        <select required name="prodiId" class="form-select mb-3">
                            <option>Pilih Program Studi</option>
                            <?php
                          
                            $queryProdi = "SELECT * FROM prodi";
                            $sqlProdi = mysqli_query($db, $queryProdi);
                            while ($dataProdi = mysqli_fetch_array($sqlProdi)) {
                                $selected = ($matakuliah['prodiId'] == $dataProdi['prodiId']) ? 'selected' : '';
                                echo "<option value='" . $dataProdi['prodiId'] . "' $selected>" . $dataProdi['namaProdi'] . "</option>";
                            }
                            ?>
                        </select>

                        <input required type="number" name="semester" class="form-control mb-3" value="<?php echo $matakuliah['semester']; ?>" />

                        
                        <input type="submit" name="submit" value="Edit Mata Kuliah" class="btn btn-success">
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
                    <h1 class="m-4">Tambah Mata Kuliah</h1>
                    <form action="prosesMatakuliah.php?proses=tambah" method="post">
                        <input required class="form-control mb-3" type="text" name="kode_mk"  placeholder="Kode MataKuliah" require>
                        <input required class="form-control mb-3" type="text" name="nama_mk" placeholder="Nama MataKuliah" require>
                        <input required class="form-control mb-3" type="number" name="sks" placeholder="sks" require>
                        <input required class="form-control mb-3" type="number" name="prodiId" placeholder="prodi_Id" require>
                        <input required class="form-control mb-3" type="number" name="semester" placeholder="semester" require>
                        <input type="submit" name="submit" value="Tambahkan Mata Kuliah" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>

<?php
        break;
}

?>