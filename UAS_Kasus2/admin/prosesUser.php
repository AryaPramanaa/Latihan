<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include_once('../koneksi.php');
if ($_GET['proses'] == 'insert') {
    if (isset($_POST['submit'])) {

        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $level = $_POST['level'];



        $checkEmailQuery = mysqli_query($db, "SELECT * FROM user WHERE email='$email'");
        if (mysqli_num_rows($checkEmailQuery) > 0) {

            echo "<script>alert('Email telah terdaftar');</script>";
            exit;
        }


        $insert = mysqli_query($db, "INSERT INTO user(fullName,email,password,level) VALUES ('$fullName','$email','$pass','$level')");
        if ($insert) {
            echo ("<script>window.location='index.php?p=user'</script>");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
} else if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {
        include('koneksi.php');

        $id = $_POST['user_id'];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        $update = mysqli_query($db, "UPDATE user SET 
                fullName='$fullName',
                email='$email',
                level='$level' 
                WHERE id=$id");
        if ($update) {
            echo ("<script>window.location='index.php?p=user'</script>");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
} else if ($_GET['proses'] == 'delete') {
    $hapus = mysqli_query($db, "DELETE FROM user WHERE id = $_GET[id]");

    if ($hapus) {
        header("location:index.php?p=user");
    }
}
