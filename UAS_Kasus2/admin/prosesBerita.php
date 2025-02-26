<?php

session_start();

if ($_GET['proses'] == "tambah") {
    if (isset($_POST['submit'])) {

        include "koneksi.php";
        $nama_file = $_FILES['file_upload']['name'];
        $nama_file_tmp = $_FILES['file_upload']['tmp_name'];


        $query = "INSERT INTO berita(user_id, kategori_id, judul_berita, file_upload, isi_berita) 
                  VALUES($_SESSION[id], $_POST[kategori_id], '$_POST[judul_berita]', '$nama_file', '$_POST[isi_berita]')";
        $sql = mysqli_query($db, $query);

        $target_file = "uploads/" . basename($_FILES["file_upload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>window.location = 'index.php?p=berita'</script>";
            return false;
        }


        if ($sql) {
            move_uploaded_file($nama_file_tmp, $target_file);
            echo "<script>window.location = 'index.php?p=berita'</script>";
        }
    }
}

if ($_GET['proses'] == "hapus") {
    include "koneksi.php";

    $sql = "DELETE FROM berita WHERE id = '$_GET[id]'";
    $hapus = mysqli_query($db, $sql);

    if ($hapus) {
        header("location:index.php?p=berita");
    } else {
        header("location:index.php?p=berita");
    }
}

if ($_GET['proses'] == "edit") {
    if (isset($_POST['submit'])) {

        include "koneksi.php";
        
        $id = $_GET['id'];
     
        $nama_file = $_FILES['file_upload']['name'];
        $nama_file_tmp = $_FILES['file_upload']['tmp_name'];
       
        if ($nama_file != '') {
           
            $target_file = "uploads/" . basename($_FILES["file_upload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

          
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "<script>alert('Only JPG, PNG, JPEG, and GIF files are allowed.'); window.location = 'index.php?p=editBerita&id=$id'</script>";
                return false;
            }
        } else {
           
            $nama_file = $_POST['existing_file']; 
        }
        
        $query = "UPDATE berita SET 
                    kategori_id = '$_POST[kategori_id]',
                    judul_berita = '$_POST[judul_berita]',
                    file_upload = '$nama_file',
                    isi_berita = '$_POST[isi_berita]'
                  WHERE id = '$id'";

        $sql = mysqli_query($db, $query);

        if ($sql) {
            if ($nama_file != '') {
                move_uploaded_file($nama_file_tmp, $target_file);
            }
            echo "<script>window.location = 'index.php?p=berita'</script>";
        } else {
            echo "<script>alert('Failed to update berita.'); window.location = 'index.php?p=editBerita&id=$id'</script>";
        }
    }
}
