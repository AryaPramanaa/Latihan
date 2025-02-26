<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $fullName = $_POST['fullName'];
    $level = $_POST['level'];
   
    $checkEmailQuery = mysqli_query($db, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($checkEmailQuery) > 0) {
        echo "<script>alert('Email telah terdaftar');</script>";
        exit;
    }

    $query = mysqli_query($db, "INSERT INTO user (fullName, password, email, level) values ('$fullName', '$password', '$email', '$level')");

    if ($query) {
        header('Location: login.php');
    } else {
        echo "<script>alert('Gagal mendaftar, coba lagi nanti');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APP TRPL</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="assets/images/logo.svg" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form action="" method="post" class="pt-3">
                                <h3 class="text-center">REGISTER</h3><br>
                                <div class="input-group mb-3">
                                    <div class="input-group flex-nowrap">

                                        <input type="text" class="form-control" placeholder="email" aria-label="email" aria-describedby="addon-wrapping" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group flex-nowrap">

                                        <input type="text" class="form-control" placeholder="Fullname" aria-label="fullName" aria-describedby="addon-wrapping" name="fullName" id="fullName" required>
                                    </div>
                                </div>
                                <!-- <div class="input-group mb-3">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" placeholder="Id" aria-label="Id" aria-describedby="addon-wrapping" name="id" id="id">
                                    </div>
                                </div> -->
                                <div class="input-group mb-3">
                                    <select name="level" class="form-select" id="level" required>
                                        <option value="" disabled selected>--- Pilih level ---</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group flex-nowrap">

                                        <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">REGISTER</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>