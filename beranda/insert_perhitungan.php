<?php
include "../koneksi.php";

// Mengambil nilai input dari POST request
$idaks = $_POST['id'];
$bln1 = $_POST['bln1'];
$bln2 = $_POST['bln2'];
$bln3 = $_POST['bln3'];
$bln4 = $_POST['bln4'];
$idpro = $_POST['idpro'];
$tglper = $_POST['tgl'];
$hasil = $_POST['hasil'];


$query = "SELECT max(ID_PERHITUNGAN) as id FROM perhitungan_wma ";
    $result = mysqli_query($conn, $query);
    if ($result != null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $idwma = $row['id'];  
            $urutan1 = (int) substr($idwma, 4, 8);
            $urutan1++;
            $pr = "WMA";
            

            $id = $pr .   sprintf("%04s", $urutan1);
            
        }
    } else {
        echo "Data tidak masuk";
        
        
        $pr = "WMA";
        
        $id = $pr .   "0001";
    }

$checkQuery = "SELECT `ID_PERHITUNGAN`, `ID_PRODUK`, `ID_AKSES`, `NILAI_PERHITUNGAN`, DATE_FORMAT(TANGGAL_PERHITUNGAN,'%Y-%m') as tgl, TANGGAL_PERHITUNGAN, `Nilai_Bulan_1`, `Nilai_Bulan_2`, `Nilai_Bulan_3`, `Nilai_Bulan_4` FROM `perhitungan_wma`WHERE DATE_FORMAT(TANGGAL_PERHITUNGAN,'%Y-%m') like DATE_FORMAT('$tglper','%Y-%m');";

 $checkResult = $conn->query($checkQuery);



if ($checkResult->num_rows > 0 ) {

echo 'Error Data Sudah Ada: ' . mysqli_error($conn);
    

}else{

// Masukkan data ke dalam database MySQL
$sql = "INSERT INTO `perhitungan_wma`(`ID_PERHITUNGAN`, `ID_PRODUK`, `ID_AKSES`, `NILAI_PERHITUNGAN`, `TANGGAL_PERHITUNGAN`, `Nilai_Bulan_1`, `Nilai_Bulan_2`, `Nilai_Bulan_3`, `Nilai_Bulan_4`) VALUES ('$id','$idpro','$idaks' ,'$hasil','$tglper','$bln1','$bln2','$bln3','$bln4')";
// Tambahkan lebih banyak bidang sesuai kebutuhan

if (mysqli_query($conn, $sql)) {
    echo 'Data berhasil dimasukkan';
} else {
    echo 'Error saat memasukkan data: ' . mysqli_error($conn);
}    

}


// Tutup koneksi database
mysqli_close($conn);

?>