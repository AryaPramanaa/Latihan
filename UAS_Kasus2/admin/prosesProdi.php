<?php 

    if($_GET['proses'] == "tambah"){
        if (isset($_POST['submit'])) { 
            include "koneksi.php";
            
            $query = "INSERT INTO prodi(namaProdi,jenjangStudi,keterangan) VALUES('$_POST[namaProdi]','$_POST[jenjangStudi]','$_POST[keterangan]')";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=prodi'</script>";
            }
        }
    }

    if($_GET['proses'] == "hapus"){
        include "koneksi.php";

        $query = "DELETE FROM prodi WHERE prodiId = '$_GET[id]'";
        $sql = mysqli_query($db, $query);

        if($sql){
            header('location:index.php?p=prodi');
        }   
    }

    if($_GET['proses'] == "edit"){
        if (isset($_POST['submit'])) { 
            include "koneksi.php";
            
            $query = "UPDATE prodi SET namaProdi = '$_POST[namaProdi]', jenjangStudi = '$_POST[jenjangStudi]', keterangan = '$_POST[keterangan]' WHERE prodiId = '$_GET[id]'";
            $sql = mysqli_query($db, $query);

            if($sql){
                echo "<script>window.location.href = 'index.php?p=prodi'</script>";
            }
        }
    }


?>