<?php 
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "perhitungan_wma";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$id = $_POST['idbln'];
$nilai1=$_POST["nilai1"];
$nilai2=$_POST["nilai2"];
$nilai3=$_POST["nilai3"];
$nilai4=$_POST["nilai4"];

$kali1=$_POST["kali1"];
$kali2=$_POST["kali2"];
$kali3=$_POST["kali3"];
$kali4=$_POST["kali4"];


$a = $nilai1 * $kali1;
$b = $nilai2 * $kali2;
$c = $nilai3 * $kali3;
$d = $nilai4 * $kali4;

$hasil = $a + $b + $c + $d;

if ($nilai1 === null || $nilai2 === null || $nilai3 === null || $nilai4 === null) {
	$_SESSION['hasil'] = 0;
}else{
	$_SESSION['hasil'] = $hasil;
	$query = "UPDATE `nilai_bln` SET nilai_predik = '". $hasil ."' WHERE no = '". $id ."';";
	$result = mysqli_query($koneksi, $query);
};


 




?>