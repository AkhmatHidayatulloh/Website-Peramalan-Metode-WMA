<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$user = $_POST['username'];
$pass = $_POST['password'];

if (isset($_POST['btnlogin'])) {
	

$query = "SELECT `ID_AKSES`, `USERNAME`, `PASSWORD` FROM `akses` WHERE USERNAME = '$user' AND PASSWORD = '$pass'";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $id = htmlspecialchars($row['ID_AKSES'], ENT_QUOTES);

 if ($result != null) {
 	echo "<script type='text/javascript'> alert('Berhasil Login');
            window.location.replace('../home.php');</script>";

    $_SESSION['id_akses'] = $id;
    $_SESSION['login'] = $user ;
 }else{
 	echo "<script> alert('Login Gagal') </script>";
 }
}

?>