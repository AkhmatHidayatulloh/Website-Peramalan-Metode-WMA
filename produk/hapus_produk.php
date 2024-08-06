<?php

include '../koneksi.php';


$id = $_POST['id'];

$success = mysqli_query($conn, "delete from produk where ID_PRODUK = '$id'") ;
if ($success) {
    echo "<script type='text/javascript'>alert('Data Berhasil Diahapus');
    window.location.replace('../produk.php');</script>";
    

}
?>