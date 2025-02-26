<?php

if ($_GET['proses'] == "tambah") {
        if(isset($_POST['submit'])){
            include "koneksi.php";

            $tgl = $_POST['tahun'] . "-" . $_POST['bulan'] . "-" . $_POST['tanggal'];
            $hobi = implode(',', $_POST['hobi']);

            $query = "INSERT INTO mahasiswa VALUES('$_POST[nim]','$_POST[nama]','$_POST[jenisKelamin]','$_POST[prodi]','$_POST[email]','$hobi','$tgl','$_POST[alamat]')";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=mahasiswa'</script>";
            }
        }                     
}

if($_GET['proses'] == "hapus"){
    include "koneksi.php";

    $sql = "DELETE FROM mahasiswa WHERE nim = '$_GET[nim]'";
    $hapus = mysqli_query($db, $sql);

    if($hapus){
        header("location:index.php?p=mahasiswa");
    }else{
        header("location:index.php?p=mahasiswa");
    }
}

if($_GET['proses'] == "edit"){
        if(isset($_POST['submit'])){
            include "koneksi.php";

            $tgl = $_POST['tahun'] . "-" . $_POST['bulan'] . "-" . $_POST['tanggal'];
            $hobi = implode(',', $_POST['hobi']);

            $query = "UPDATE mahasiswa set
                nama = '$_POST[nama]',
                jenisKelamin = '$_POST[jenisKelamin]',
                prodiId = '$_POST[prodi]',
                email = '$_POST[email]',
                hobi = '$hobi',
                tanggalLahir = '$tgl',
                alamat = '$_POST[alamat]'
                WHERE nim = '$_GET[nim]'
            ";

            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=mahasiswa'</script>";
            }
        }                     
}

?>