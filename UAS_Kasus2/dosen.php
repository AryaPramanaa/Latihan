<?php

    $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

    switch($aksi){
        case "list":
?>

<div class="container text-center">
        <h1 class="my-3">Tabel Dosen</h1>
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
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "koneksi.php";
    
                    $sql = "SELECT * FROM prodi INNER JOIN dosen ON prodi.prodiId = dosen.prodiId";
                    $query = mysqli_query($db, $sql);
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $no?></td>
                    <td><?= $data['nip']?></td>
                    <td><?= $data['namaDosen']?></td>
                    <td><?= $data['namaProdi']?></td>
                    <td><?= $data['email']?></td>
                    <td><?= $data['notelp']?></td>
                    <td><?= $data['alamat']?></td>
                </tr>
                <?php $no++;?>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php
        break;

        case "tambah":
?>

<div class="container-fluid">
        <h1 class="text-center p-3">Halaman Form</h1>
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
                                $sql = mysqli_query($db,$query);

                                while($data = mysqli_fetch_array($sql)){
                            ?>
                                <option value="<?= $data['prodiId']?>"><?= $data['namaProdi']?></option>
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
                                    <?php for($i = 1; $i <= 31; $i++) {?>
                                        <option value="<?= $i?>"><?= $i?></option>
                                    <?php ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select mb-3" name="bulan" aria-label="Default select example">
                                    <option selected>Pilih Bulan Lahir</option>
                                    <?php $bulan = [1=>"Januari", "Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]?>
                                    <?php foreach($bulan as $key => $value) {?>
                                        <option value="<?= $key?>"><?= $value?></option>
                                    <?php ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select name="tahun" class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Pilih Tahun Lahir</option>
                                    <?php for($i = 2024; $i >= 1800; $i--) {?>
                                        <option value="<?= $i?>"><?= $i?></option>
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

        $sql = "SELECT * FROM mahasiswa WHERE nim = '$_GET[nim]'";
        $query = mysqli_query($db, $sql);
        $dataMahasiswa = mysqli_fetch_array($query);

        $tgl = explode('-', $dataMahasiswa['tanggalLahir']);
        $hobi = explode(',', $dataMahasiswa['hobi']);
        
    ?>
    <div class="container-fluid">
        <h1 class="text-center p-3">Edit Mahasiswa</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="container" width="500px">
                        <input required type="text" name="nama" placeholder="Nama" class="form-control mb-3" value="<?= $dataMahasiswa['nama']?>">
                        <input required type="number" name="nim" placeholder="Nim" class="form-control mb-3" value="<?= $dataMahasiswa['nim']?>">
                        <div class="row mb-3">
                            <div class="col-3"><input <?php if($dataMahasiswa['jenisKelamin'] == "L") {echo "checked";}?> required type="radio" name="jenisKelamin" value="L" class="form-check-input"> Laki-Laki</div>
                            <div class="col-3"><input <?php if($dataMahasiswa['jenisKelamin'] == "P") {echo "checked";}?> required type="radio" name="jenisKelamin" value="P" class="form-check-input"> Perempuan</div>
                        </div> 
                        <select required name="prodi" class="form-select mb-3" aria-label="Default select example">
                            <option >Pilih Program Studi</option>
                            <?php 
                                include "koneksi.php";
                                $query = "SELECT * from prodi";
                                $sql = mysqli_query($db,$query);

                                while($data = mysqli_fetch_array($sql)){
                            ?>
                                <option <?php if($dataMahasiswa['prodiId'] == "$data[prodiId]") {echo "selected";}?> value="<?= $data['keterangan']?>"><?= $data['namaProdi']?></option>
                            <?php } ?>
                        </select>
                        <input name="email" type="text" placeholder="Email" class="form-control mb-3" value="<?= $dataMahasiswa['email']?>">
                        <h5 class="text-center">Hobi</h5>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <input <?php if(in_array('Menyanyi', $hobi)) {echo "checked";}?> class="form-check-input" type="checkbox" name="hobi[]" value="Menyanyi" id="menyanyi">
                                <label class="form-check-label" for="menyanyi">
                                    Menyanyi
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <input <?php if(in_array('Mengambar', $hobi)) {echo "checked";}?> class="form-check-input" type="checkbox" name="hobi[]" value="Mengambar" id="Mengambar">
                                <label class="form-check-label" for="Mengambar">
                                    Mengambar
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <input <?php if(in_array('Menari', $hobi)) {echo "checked";}?> class="form-check-input" type="checkbox" name="hobi[]" value="Menari" id="Menari">
                                <label class="form-check-label" for="Menari">
                                    Menari
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <select required class="form-select mb-3" name="tanggal" aria-label="Default select example">
                                    <option>Pilih Tanggal Lahir</option>
                                    <?php for($i = 1; $i <= 31; $i++) {?>
                                        <?php if($tgl[2] == $i) {?>
                                            <option selected value="<?= $i?>"><?= $i?></option>
                                        <?php } else {?>
                                            <option value="<?= $i?>"><?= $i?></option>
                                        <?php }?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select mb-3" name="bulan" aria-label="Default select example">
                                    <option>Pilih Bulan Lahir</option>
                                    <?php $bulan = [1=>"Januari", "Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]?>
                                    <?php foreach($bulan as $key => $value) {?>
                                        <?php if($tgl[1] == $key) {?>
                                            <option selected value="<?= $key?>"><?= $value?></option>
                                        <?php } else {?>
                                            <option value="<?= $key?>"><?= $value?></option>
                                        <?php }?>
                                    <?php ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select name="tahun" class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Pilih Tahun Lahir</option>
                                    <?php for($i = 2024; $i >= 1800; $i--) {?>
                                        <?php if($tgl[0] == $i) {?>
                                            <option selected value="<?= $i?>"><?= $i?></option>
                                        <?php } else {?>
                                            <option value="<?= $i?>"><?= $i?></option>
                                        <?php }?>
                                    <?php ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea required class="form-control" name="alamat" placeholder="Masukkan Alamat" id="floatingTextarea"><?= $dataMahasiswa['alamat']?></textarea>
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