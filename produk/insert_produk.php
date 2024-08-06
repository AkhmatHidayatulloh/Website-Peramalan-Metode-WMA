<?php 
include '../koneksi.php';


    $query = "select MAX(ID_PRODUK) as id FROM produk WHERE SUBSTR(ID_PRODUK, 3, 8) = REPLACE(CURRENT_DATE(),'-','');";
    $result = mysqli_query($conn, $query);
    if ($result != null) {
    	echo "string";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $idprod = $row['id'];  
            $urutan1 = (int) substr($idprod, 11, 14);
            $urutan1++;
            $pr = "PR";
            $tgl = date('Ymd');

            $id = $pr . $tgl.   sprintf("%04s", $urutan1);
            
        }
    } else {
        echo "Data tidak masuk";
        
        
        $pr = "PR";
        $tgl = date('Ymd');
        $id = $pr . $tgl.   "0001";
    }

    if (isset($_POST['btnsave'])) 
    {
        $namap = $_POST['nama'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $stok = 0;

        

        $query = "INSERT INTO `produk`(`ID_PRODUK`, `NAMA_PRODUK`, `SATUAN_PRODUK`, `HARGA_PRODUK`, `STOK_PRODUK`) VALUES ('$id','$namap','$satuan','$harga','$stok')";
            $result = mysqli_query($conn, $query);

         if ($result) {
           echo "<script type='text/javascript'>alert('Data Berhasil Ditambahkan');
            window.location.replace('../produk.php');</script>";
            
            }else{
            echo "<script> alert('Data Gagal di Tambahkan') </script>";
            }   
    }

    

 ?>
