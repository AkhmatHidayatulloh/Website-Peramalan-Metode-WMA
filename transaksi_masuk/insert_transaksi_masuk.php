<?php 
include '../koneksi.php';


    $query = "SELECT max(id_transaksi_masuk) as id FROM transaksi_produk_masuk where SUBSTR(id_transaksi_masuk, 3, 8) = REPLACE(CURRENT_DATE(),'-','');";
    $result = mysqli_query($conn, $query);
    if ($result != null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $idplg = $row['id'];  
            $urutan1 = (int) substr($idplg, 11, 14);
            $urutan1++;
            $pr = "TM";
            $tgl = date('Ymd');

            $id = $pr . $tgl.   sprintf("%04s", $urutan1);
            
        }
    } else {
        echo "Data tidak masuk";
        
        
        $pr = "TM";
        $tgl = date('Ymd');
        $id = $pr . $tgl.   "0001";
    }

    if (isset($_POST['btnsavetrmsk'])) 
    {

        $tanggal = $_POST['tanggal'];
        $jumlah = $_POST['jumlah'];
        $produk =$_POST['produk'];
        $mitra = $_POST['mitra'];

       
        $stok = " SELECT STOK_PRODUK FROM `produk` WHERE ID_PRODUK = '$produk'";
        $oke = mysqli_query($conn, $stok);
        $row = mysqli_fetch_array($oke, MYSQLI_ASSOC);
        $stokawal = htmlspecialchars($row['STOK_PRODUK'], ENT_QUOTES);
        $stokakhir = $stokawal + $jumlah;


        $query = "INSERT INTO `transaksi_produk_masuk`(`ID_TRANSAKSI_MASUK`, `ID_MITRA`, `ID_PRODUK`, `TGL_MASUK`, `JUMLAH_PRODUK_MASUK`, `STOK_AWAL_MASUK`, `STOK_AKHIR_MASUK`) VALUES ('$id','$mitra','$produk','$tanggal','$jumlah','$stokawal','$stokakhir')";
            $result = mysqli_query($conn, $query);

         if ($result) {

            $update = "UPDATE `produk` SET `STOK_PRODUK`= $stokakhir where id_produk = '$produk'";
            $hasil = mysqli_query($conn, $update);
           echo "<script type='text/javascript'>alert('Data Berhasil Ditambahkan');
            window.location.replace('../transaksi_barang_masuk.php');</script>";
            
            }else{
            echo "<script> alert('Data Gagal di Tambahkan') </script>";
            }   
    }

    

 ?>


