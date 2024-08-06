<?php

include '../koneksi.php';


$id = $_POST['id'];

$success = mysqli_query($conn, "delete from mitra where id_mitra = '$id'") ;
if ($success) {
    echo "<script type='text/javascript'>alert('Data Berhasil Diahapus');
    window.location.replace('../mitra.php');</script>";
    

}
?>