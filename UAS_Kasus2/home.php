<?php if (!isset($_GET['berita'])) { ?>

    <h1 class="text-center p-3">Berita Terbaru</h1>

    <?php
    include "koneksi.php";

    $query = "SELECT * from berita order by id desc limit 6";
    $sql = mysqli_query($db, $query);

    ?>

    <div class="container">
        <div class="row">
            <?php while ($data = mysqli_fetch_array($sql)) { ?>
                <div class="col-lg-4 pt-4">
                    <div class="card" style="width: 22rem;">
                        <img height="200px" width="200px" src="admin/uploads/<?= $data['file_upload'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['judul_berita'] ?></h5>
                            <p class="card-text"><?= $data['isi_berita'] ?></p>
                            <p><?= $data['data_created'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>

    <?php
    include "koneksi.php";

    $query = "SELECT * from berita where id = '$_GET[berita]'";
    $sql = mysqli_query($db, $query);
    $data = mysqli_fetch_array($sql);
    ?>

    <div class="container text-center">
        <h1 class="mb-3 mt-3">Halaman Berita</h1>
        <h3 class="mb-3">Judul Berita</h3>

        <img class="img-fluid img-thumbnail" src="admin/uploads/<?= $data['file_upload'] ?>" alt="" height="100px">

        <h3 class="mb-3">Isi Berita</h3>
    </div>

<?php } ?>