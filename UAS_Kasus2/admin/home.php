<?php
include('koneksi.php');
$ttlDosen = count(select("SELECT null FROM dosen"));
$ttlProdi = count(select("SELECT null FROM prodi"));
$ttlMhs = count(select("SELECT null FROM mahasiswa"));
$ttlBerita = count(select("SELECT null FROM berita"));

?>



<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ttlBerita ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-mortarboard-fill fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Prodi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ttlProdi ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-mortarboard-fill fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Dosen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ttlDosen ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-video3 fa-2x text-success"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ttlMhs ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people-fill fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>