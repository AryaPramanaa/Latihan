<?php

//done
if ($_GET['proses'] == "tambah") {
    if (isset($_POST['submit'])) {
        include "koneksi.php";  

        $kode_mk = $_POST['kode_mk'];
        $nama_mk = $_POST['nama_mk'];
        $sks = $_POST['sks'];
        $prodiId = $_POST['prodiId'];
        $semester = $_POST['semester'];

        $query = "INSERT INTO matakuliah (kode_mk,nama_mk,sks,prodiId,semester)values('$kode_mk','$nama_mk','$sks','$prodiId','$semester')";

       
        $sql = mysqli_query($db, $query);


        if ($sql) {
          
            echo "<script>window.location.href = 'index.php?p=matakuliah'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }
}

//done
if ($_GET['proses'] == "hapus") {
    include "koneksi.php";

    $query = "DELETE FROM matakuliah WHERE kode_mk = '$_GET[id]'";
    $sql = mysqli_query($db, $query);

    if ($sql) {
        header('location:index.php?p=matakuliah');
    }
}

//done
if ($_GET['proses'] == "edit") {
    if (isset($_POST['submit'])) {
        include "koneksi.php";

        
        $kode_mk = $_POST['kode_mk'];
        $nama_mk = $_POST['nama_mk'];
        $sks = $_POST['sks'];
        $prodiId = $_POST['prodiId'];
        $semester = $_POST['semester'];

        $query = "UPDATE matakuliah SET 
                    nama_mk = '$nama_mk', 
                    sks = '$sks', 
                    prodiId = '$prodiId', 
                    semester = '$semester' 
                  WHERE kode_mk = '$_GET[id]'";

       
        $sql = mysqli_query($db, $query);


        if ($sql) {
          
            echo "<script>window.location.href = 'index.php?p=matakuliah'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }
}
