<?php

include '../koneksi.php';


$id = $_POST['id'];

$success = mysqli_query($conn, "delete from pelanggan where id_pelanggan = '$id'") ;
if ($success) {
    echo "<script type='text/javascript'>alert('Data Berhasil Diahapus');
    window.location.replace('../pelanggan.php');</script>";
    

}
?>