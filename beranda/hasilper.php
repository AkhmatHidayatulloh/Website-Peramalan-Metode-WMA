<?php 
session_start();

include "../menu/koneksi.php";
$hasil = $_SESSION['hasil'];
$hasilperhari = $hasil / 30 ;
$hasilperminggu = $hasil / 4;

if ($hasil == null) {
    $hasil = 0 ;
};
?>

<div class="card-body">
     <h3 class="">Hasil Perhitungan WMA</h5>
     <h4 class="mt-4">Total Peramalan produk bulan</h4>
     <h2 class="mt-4"><?php echo "$hasil"  ;?></h2>
     <div class="mt-4">
         <h6 class="m-t-10">Pengemasan yang harus tercapai setiap hari</h6>
         <h4><?php echo $hasilperhari; ?></h4>
     </div>
     <div class="mt-4">
         <h6 class="m-t-10">Pengemasan yang harus tercapai setiap minggu</span></h6>
         <h4><?php echo $hasilperminggu; ?></h4>
     </div>

 </div>
