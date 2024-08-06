<?php
include "../koneksi.php";

// Mengambil nilai input dari POST request
$id = $_POST['id'];
$tgl = $_POST['tgl'];

// Query ke database
// $sql = "SELECT sum(JUMLAH_PRODUK_KELUAR) as nilai, TGL_KELUAR, DATE_FORMAT(TGL_KELUAR, '%m %Y') FROM transaksi_produk_keluar WHERE TGL_KELUAR < DATE_SUB(LAST_DAY('$tgl'), INTERVAL 1 MONTH) AND ID_PRODUK = '$id' GROUP BY DATE_FORMAT(TGL_KELUAR, '%m %Y') ORDER BY TGL_KELUAR DESC LIMIT 4;"

$sql = "SELECT sum(JUMLAH_PRODUK_KELUAR) as nilai, TGL_KELUAR, DATE_FORMAT(TGL_KELUAR, '%M') as bulan FROM transaksi_produk_keluar WHERE TGL_KELUAR <= DATE_SUB(LAST_DAY('$tgl'), INTERVAL 1 MONTH) AND ID_PRODUK = '$id' GROUP BY DATE_FORMAT(TGL_KELUAR, '%m %Y') ORDER BY TGL_KELUAR DESC LIMIT 4;";

$result = $conn->query($sql);

// Menghasilkan hasil query dalam format JSON
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Menutup koneksi ke database
$conn->close();

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>