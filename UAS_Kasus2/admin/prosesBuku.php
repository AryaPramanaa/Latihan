<?php

//done
if ($_GET['proses'] == "tambah") {
    if (isset($_POST['submit'])) {
        include "koneksi.php";  

        $id = $_POST['id'];
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $kategori_buku = $_POST['kategori_buku'];
        $penerbit = $_POST['penerbit'];
        $pengarang = $_POST['pengarang'];
        $stok = $_POST['stok'];

        $query = "INSERT INTO buku (id,kode_buku,judul_buku,kategori_buku,penerbit,pengarang,stok)values('$id','$kode_buku','$judul_buku','$kategori_buku','$penerbit','$pengarang','$stok')";
        $sql = mysqli_query($db, $query);

        if ($sql) {
            echo "<script>window.location.href = 'index.php?p=buku'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }

}

//done
if ($_GET['proses'] == "hapus") {
    include "koneksi.php";

    $query = "DELETE FROM buku WHERE id = '$_GET[id]'";
    $sql = mysqli_query($db, $query);

    if ($sql) {
        header('location:index.php?p=buku');
    }
}

//done
if ($_GET['proses'] == "edit") {
    if (isset($_POST['submit'])) {
        include "koneksi.php";

        $id = $_POST['id'];
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $kategori_buku = $_POST['kategori_buku'];
        $penerbit = $_POST['penerbit'];
        $pengarang = $_POST['pengarang'];
        $stok = $_POST['stok'];

        $query = "UPDATE buku SET 
                    kode_buku = '$kode_buku', 
                    judul_buku = '$judul_buku', 
                    kategori_buku = '$kategori_buku', 
                    penerbit = '$penerbit', 
                    pengarang = '$pengarang', 
                    stok= '$stok'
                  WHERE id = '$_GET[id]'";

       
        $sql = mysqli_query($db, $query);

        if ($sql) {
          
            echo "<script>window.location.href = 'index.php?p=buku'</script>";
        } else {
            echo "Error: " . mysqli_error($db); 
        }
    }
}
