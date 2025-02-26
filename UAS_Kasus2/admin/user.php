<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once '../koneksi.php';
if ($_SESSION['level'] != 'admin') {
    echo "<script>window.location='index.php?p=home'</script>";
    exit;
}
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="my-3 text-center">User</h1>
                        <a href="index.php?p=user&aksi=input" class="btn btn-primary mb-5"><i class="bi bi-plus-circle me-2"></i>Tambah Data</a>
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full name</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $getData = mysqli_query($db, "SELECT * FROM user");
                                $no = 1;
                                while ($user = mysqli_fetch_array($getData)) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $user['fullName'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['level'] ?></td>
                                        <td>
                                            <a href="index.php?p=user&aksi=edit&id=<?= $user['id'] ?>" class="btn btn-warning">
                                                <bi class="bi-pencil-square me-2"></bi>edit
                                            </a>
                                            <a href="prosesUser.php?proses=delete&id=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data?')"><i class="bi bi-trash-fill me-2"></i>hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
        break;
    case 'input':
    ?>
        <div class="row justify-content-center  py-5">
            <form action="prosesUser.php?proses=insert" method="post" class="col-md-4">
                <h3 class="mb-5">Form user</h3>
                <div class="mb-3 pb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" name="fullName" class="form-control" id="fullName" required autofocus>
                </div>
                <div class="mb-3 pb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required autofocus>
                </div>
                <div class="mb-3 pb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required autofocus>

                </div>
                <div class="mb-3 pb-3">
                    <label for="level" class="form-label">Level</label>
                    <select name="level" class="form-select" id="level" required>
                        <option value="" disabled selected>--- Pilih level ---</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>


        </div>
    <?php
        break;
    case 'edit':
    ?>

        <?php

        $getData = mysqli_query($db, "SELECT * FROM user WHERE id = $_GET[id]");
        $no = 1;

        $user = mysqli_fetch_array($getData);

        ?>


        <div class="row justify-content-center  py-5">
            <form action="prosesUser.php?proses=update" method="post" class="col-md-4">
                <h3 class="mb-5">Edit user</h3>
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                <div class="mb-3 pb-3">
                    <label for="fullName" class="form-label">Nama</label>
                    <input type="text" name="fullName" class="form-control" id="fullName" value="<?= $user['fullName'] ?>" required autofocus>
                </div>
                <div class="mb-3 pb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $user['email'] ?>" required autofocus>

                </div>
                <div class="mb-3 pb-3">
                    <label for="ket" class="form-label">Level</label>
                    <select name="level" class="form-select" id="level" required>
                        <option value="" disabled>--- Pilih level ---</option>
                        <option value="admin" <?= $user['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="user" <?= $user['level'] == 'user' ? 'selected' : '' ?>>User</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-warning" name="submit">Update</button>

            </form>


        </div>

<?php
        break;
}
?>