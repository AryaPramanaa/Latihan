<?php

if ($_GET['proses'] == "tambah") {
        if(isset($_POST['submit'])){
            include "koneksi.php";

            $query = "INSERT INTO kategori VALUES('', '$_POST[nama_kategori]')";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=kategori'</script>";
            }
        }                     
}

if($_GET['proses'] == "hapus"){
    include "koneksi.php";

    $sql = "DELETE FROM kategori WHERE id = '$_GET[id]'";
    $hapus = mysqli_query($db, $sql);

    if($hapus){
        header("location:index.php?p=kategori");
    }else{
        header("location:index.php?p=kategori");
    }
}

if($_GET['proses'] == "edit"){
        if(isset($_POST['submit'])){
            include "koneksi.php";

            $query = "UPDATE kategori set
                nama_kategori = '$_POST[nama_kategori]'
                WHERE id = '$_GET[id]'";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=kategori'</script>";
            }
        }                     
}

?>