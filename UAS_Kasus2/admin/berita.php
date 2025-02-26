<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "list";

switch ($aksi) {
    case "list":
?>
        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">Berita</h1>
                        <a href="index.php?p=berita&aksi=tambah"><button class="btn btn-primary mb-3">Tambah Berita</button></a>
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Kategori</th>
                                    <th>Judul Berita</th>
                                    <th>File Upload</th>
                                    <th>Isi Berita</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";

                                $sql = "SELECT fullName, nama_kategori, judul_berita, file_upload, isi_berita, data_created, berita.id FROM user join berita on user.id = berita.user_id join kategori on kategori.id = berita.kategori_id";
                                $query = mysqli_query($db, $sql);
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data['fullName'] ?></td>
                                        <td><?= $data['nama_kategori'] ?></td>
                                        <td><?= $data['judul_berita'] ?></td>
                                        <td><img src="uploads/<?= $data['file_upload'] ?>" alt="" width="100px" height="100px" style="object-fit: cover;"></td>
                                        <td><?= $data['isi_berita'] ?></td>
                                        <td><?= $data['data_created'] ?></td>
                                        <td>
                                            <a href="index.php?p=berita&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-warning px-2">Edit</a>
                                            <a href="prosesBerita.php?proses=hapus&id=<?= $data['id'] ?>" class="btn btn-danger px-2" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        <?php
        break;

    case "tambah":
        ?>

            <div class="container-fluid">
                <h1 class="text-center p-3">Halaman Tambah Berita</h1>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="prosesBerita.php?proses=tambah" method="post" enctype="multipart/form-data">
                            <div class="container" width="500px">
                                <input required type="text" name="judul_berita" placeholder="Judul Berita" class="form-control mb-3">
                                <select required name="kategori_id" class="form-select mb-3" aria-label="Default select example">
                                    <option>Pilih Kategori</option>
                                    <?php
                                    include "koneksi.php";
                                    $query = "SELECT * from kategori";
                                    $sql = mysqli_query($db, $query);

                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                        <option value="<?= $data['id'] ?>"><?= $data['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="file" name="file_upload" class="form-control mb-3" id="file_upload" onchange="previewImage();">
                                <div id="preview-container" class="mt-3">
                                    <img id="preview-image" src="" alt="Image Preview" style="display:none; width: 100px; height: auto;">
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea required class="form-control" name="isi_berita" placeholder="Masukkan Isi Berita" value="Isi Berita" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Isi Berita</label>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 mb-3">
                                        <input required type="submit" class="btn btn-success px-4 fw-bold" name="submit" value="Kirim Formulir">
                                    </div>
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

        <div class="container-fluid">
            <h1 class="text-center p-3">Halaman Edit Berita</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        include "koneksi.php";

                        $query = "SELECT * FROM berita WHERE id = '$id'";
                        $sql = mysqli_query($db, $query);
                        $data = mysqli_fetch_array($sql);
                    }
                    ?>
                    <form action="prosesBerita.php?proses=edit&id=<?= $data['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="container" width="500px">
                            <input required type="text" name="judul_berita" placeholder="Judul Berita" class="form-control mb-3" value="<?= $data['judul_berita']; ?>">

                            <select required name="kategori_id" class="form-select mb-3" aria-label="Default select example">
                                <option>Pilih Kategori</option>
                                <?php

                                $query = "SELECT * from kategori";
                                $sql = mysqli_query($db, $query);
                                while ($kategori = mysqli_fetch_array($sql)) {
                                    $selected = ($kategori['id'] == $data['kategori_id']) ? 'selected' : '';
                                    echo "<option value='" . $kategori['id'] . "' $selected>" . $kategori['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>

                            <input type="file" name="file_upload" class="form-control mb-3" id="file_upload" onchange="previewImage();">


                            <div id="preview-container" class="mt-3">
                                <?php if (!empty($data['gambar'])) { ?>
                                    <img id="preview-image" src="path/to/images/<?= $data['gambar']; ?>" alt="Image Preview" style="width: 100px; height: auto;">
                                <?php } else { ?>
                                    <img id="preview-image" src="" alt="Image Preview" style="display:none; width: 100px; height: auto;">
                                <?php } ?>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea required class="form-control" name="isi_berita" placeholder="Masukkan Isi Berita" id="floatingTextarea"><?= $data['isi_berita']; ?></textarea>
                                <label for="floatingTextarea">Isi Berita</label>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 mb-3">
                                    <input required type="submit" class="btn btn-success px-4 fw-bold" name="submit" value="Update Berita">
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

<script>
    function previewImage() {
        var file = document.getElementById("file_upload").files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById("preview-image");
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>