<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit;
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
  <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
  <style>
    .table td img {
      width: 200px;
      height: 400px;
      border-radius: 0;
    }
  </style>

</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="d-flex align-items-center justify-content-between">
          <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i class="ti-home me-3 text-white"></i></a>
          <button id="bannerClose" class="btn border-0 p-0">
            <i class="ti-close text-white"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand brand-logo me-5" href="index.html"><img src="../assets/images/logo.svg" class="me-2" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
        <!-- <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
          </div>
        </li> -->
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="icon-bell mx-0"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="ti-info-alt mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                <p class="font-weight-light small-text mb-0 text-muted"> Just now </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="ti-settings mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Settings</h6>
                <p class="font-weight-light small-text mb-0 text-muted"> Private message </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <i class="ti-user mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                <p class="font-weight-light small-text mb-0 text-muted"> 2 days ago </p>
              </div>
            </a>
          </div>
        </li> -->
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <img src="../assets/images/faces/face28.jpg" alt="profile" />
          </a>
        </li>
        <!-- <li class="nav-item nav-settings d-none d-lg-flex">
          <a class="nav-link" href="#">
            <i class="icon-ellipsis"></i>
          </a>
        </li> -->
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->

  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item <?= $_GET['p'] == 'home' ? 'active' : '' ?>">
          <a class="nav-link <?= (!isset($_GET['p']) || $_GET['p'] == 'home') ? 'active' : '' ?>" href="index.php?p=home">
            <i class=" icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'mahasiswa' ? 'active' : '' ?>">
          <a class="nav-link " href="index.php?p=mahasiswa">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Mahasiswa</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'prodi' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?p=prodi">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Prodi</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'dosen' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?p=dosen">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Dosen</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'kategori' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?p=kategori">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Kategori</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'berita' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?p=berita">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Berita</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'ruangan' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?p=ruangan">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Ruangan</span>
          </a>
        </li>
        <li class="nav-item <?= $_GET['p'] == 'ruangan' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?p=buku">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Buku</span>
          </a>
        </li>
        <?php if ($_SESSION['level'] == 'admin') { ?>
          <li class="nav-item <?= $_GET['p'] == 'user' ? 'active' : '' ?>">
            <a class="nav-link" href="index.php?p=user">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'admin') { ?>
          <li class="nav-item <?= $_GET['p'] == 'user' ? 'active' : '' ?>">
            <a class="nav-link" href="index.php?p=matakuliah">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Matakuliah</span>
            </a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">Log out</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <main class="col-11">
      <?php
      $parameter = isset($_GET['p']) ? $_GET['p'] : "mahasiswa";
      if ($parameter == "mahasiswa") include "mahasiswa.php";
      if ($parameter == "prodi") include "prodi.php";
      if ($parameter == "dosen") include "dosen.php";
      if ($parameter == "kategori") include "kategori.php";
      if ($parameter == "berita") include "berita.php";
      if ($parameter == "user") include "user.php";
      if ($parameter == "home") include "home.php";
      if ($parameter == "matakuliah") include "matakuliah.php";
      if ($parameter == "ruangan") include "ruangan.php";
      if ($parameter == "buku") include "buku.php";


      ?>
    </main>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/chart.js/chart.umd.js"></script>
  <script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <!-- <script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <script src="../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
  <script src="../assets/js/dataTables.select.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../assets/js/dashboard.js"></script>
  <!-- <script src="../assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
  <script>
    //  const btnSide = document.querySelector('.icon-menu')
    //  const sideBar = document.querySelector('.sidebar')
    //  btnSide.addEventListener('click',() => {
    //     sideBar.style = 'width=0px;'
    //  })
  </script>
</body>

</html>