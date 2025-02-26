<?php

//done
if ($_GET['proses'] == "tambah") {
    if (isset($_POST['submit'])) {
        include "koneksi.php";  

        $id = $_POST['id'];
        $kode_ruangan = $_POST['kode_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $gedung = $_POST['gedung'];
        $lantai = $_POST['lantai'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];

        $query = "INSERT INTO ruangan (id,kode_ruangan,nama_ruangan,gedung,lantai,kapasitas,keterangan)values('$id','$kode_ruangan','$nama_ruangan','$gedung','$lantai','$kapasitas','$keterangan')";
        $sql = mysqli_query($db, $query);

        if ($sql) {
            echo "<script>window.location.href = 'index.php?p=ruangan'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }

}

//done
if ($_GET['proses'] == "hapus") {
    include "koneksi.php";

    $query = "DELETE FROM ruangan WHERE id = '$_GET[id]'";
    $sql = mysqli_query($db, $query);

    if ($sql) {
        header('location:index.php?p=ruangan');
    }
}

//done
if ($_GET['proses'] == "edit") {
    if (isset($_POST['submit'])) {
        include "koneksi.php";

        $id = $_POST['id'];
        $kode_ruangan = $_POST['kode_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $gedung = $_POST['gedung'];
        $lantai = $_POST['lantai'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];

        $query = "UPDATE ruangan SET 
                    kode_ruangan = '$kode_ruangan', 
                    nama_ruangan = '$nama_ruangan', 
                    gedung = '$gedung', 
                    lantai = '$lantai', 
                    kapasitas = '$kapasitas', 
                    keterangan= '$keterangan'
                  WHERE id = '$_GET[id]'";

       
        $sql = mysqli_query($db, $query);

        if ($sql) {
          
            echo "<script>window.location.href = 'index.php?p=ruangan'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }
}
