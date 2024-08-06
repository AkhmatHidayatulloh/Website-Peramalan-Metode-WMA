<?php 
include '../koneksi.php';


    $query = "SELECT max(id_transaksi_keluar) as id FROM transaksi_produk_keluar where SUBSTR(id_transaksi_keluar, 3, 8) = REPLACE(CURRENT_DATE(),'-','');";
    $result = mysqli_query($conn, $query);
    if ($result != null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $idplg = $row['id'];  
            $urutan1 = (int) substr($idplg, 11, 14);
            $urutan1++;
            $pr = "TK";
            $tgl = date('Ymd');

            $id = $pr . $tgl.   sprintf("%04s", $urutan1);
            
        }
    } else {
        echo "Data tidak masuk";
        
        
        $pr = "TK";
        $tgl = date('Ymd');
        $id = $pr . $tgl.   "0001";
    }

    if (isset($_POST['btnsavetrmsk'])) 
    {

        $tanggal = $_POST['tanggal'];
        $jumlah = $_POST['jumlah'];
        $produk =$_POST['produk'];
        $pelanggan = $_POST['pelanggan'];

       
        $stok = " SELECT STOK_PRODUK FROM `produk` WHERE ID_PRODUK = '$produk'";
        $oke = mysqli_query($conn, $stok);
        $row = mysqli_fetch_array($oke, MYSQLI_ASSOC);
        $stokawal = htmlspecialchars($row['STOK_PRODUK'], ENT_QUOTES);
        $stokakhir = $stokawal - $jumlah;
        

        $query = "INSERT INTO `transaksi_produk_keluar`(`ID_TRANSAKSI_KELUAR`, `ID_PELANGGAN`, `ID_PRODUK`, `TGL_KELUAR`, `JUMLAH_PRODUK_KELUAR`, `STOK_AWAL_KELUAR`, `STOK_AKHIR_KELUAR`) VALUES ('$id','$pelanggan','$produk','$tanggal','$jumlah','$stokawal','$stokakhir')";
            $result = mysqli_query($conn, $query);

         if ($result) {

            $update = "UPDATE `produk` SET `STOK_PRODUK`= $stokakhir where id_produk = '$produk'";
            $hasil = mysqli_query($conn, $update);
           echo "<script type='text/javascript'>alert('Data Berhasil Ditambahkan');
            window.location.replace('../transaksi_barang_keluar.php');</script>";
            
            }else{
            echo "<script> alert('Data Gagal di Tambahkan') </script>";
            }   
    }

    

 ?>
