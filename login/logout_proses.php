<?php 

session_start();
unset($_SESSION['login']);

echo "<script type='text/javascript'> alert('Berhasil Logout');
            window.location.replace('../index.php');</script>";
session_destroy();
 ?>