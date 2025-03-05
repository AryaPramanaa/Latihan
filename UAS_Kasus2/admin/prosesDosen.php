<?php

if ($_GET['proses'] == "tambah") {
        if(isset($_POST['submit'])){
            include "koneksi.php";


            $query = "INSERT INTO dosen(nip,namaDosen,email,prodiId,notelp,alamat) VALUES('$_POST[nip]','$_POST[namaDosen]','$_POST[email]','$_POST[prodiId]','$_POST[notelp]','$_POST[alamat]')";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=dosen'</script>";
            }
        }                     
}

if($_GET['proses'] == "hapus"){
    include "koneksi.php";

    $sql = "DELETE FROM dosen WHERE nip = '$_GET[nip]'";
    $hapus = mysqli_query($db, $sql);

    if($hapus){
        header("location:index.php?p=dosen");
    }else{
        header("location:index.php?p=dosen");
    }
}

if($_GET['proses'] == "edit"){
        if(isset($_POST['submit'])){
            include "koneksi.php";

            $query = "UPDATE dosen set
                namaDosen = '$_POST[namaDosen]',
                prodiId = '$_POST[prodiId]',
                email = '$_POST[email]',
                notelp = '$_POST[notelp]',
                alamat = '$_POST[alamat]'
                WHERE nip = '$_GET[nip]'";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=dosen'</script>";
            }
        }                     
}

?>