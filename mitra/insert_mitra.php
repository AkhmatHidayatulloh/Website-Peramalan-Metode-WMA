<?php 
include '../koneksi.php';
session_start();


    $query = "SELECT max(id_mitra) as id FROM mitra where SUBSTR(id_mitra, 3, 8) = REPLACE(CURRENT_DATE(),'-','');";
    $result = mysqli_query($conn, $query);
    if ($result != null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $idplg = $row['id'];  
            $urutan1 = (int) substr($idplg, 11, 14);
            $urutan1++;
            $pr = "MT";
            $tgl = date('Ymd');

            $id = $pr . $tgl.   sprintf("%04s", $urutan1);
            
        }
    } else {
        echo "Data tidak masuk";
        
        
        $pr = "MT";
        $tgl = date('Ymd');
        $id = $pr . $tgl.   "0001";
    }

    if (isset($_POST['btnsavemitra'])) 
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $nohp = $_POST['nohp'];
        $email = $_POST['email'];
        

        

        $query = "INSERT INTO `mitra`(`ID_MITRA`, `NAMA_MITRA`, `ALAMAT_MITRA`, `KOTA_MITRA`, `NOHP_MITRA`, `EMAIL_MITRA`) VALUES ('$id','$nama','$alamat','$kota','$nohp','$email')";
            $result = mysqli_query($conn, $query);

         if ($result) {
            
           echo "<script type='text/javascript'> alert('Data Berhasil Ditambahkan');
            window.location.replace('../mitra.php');</script>";
            
            }else{
            echo "<script> alert('Data Gagal di Tambahkan') </script>";
            }   
    }

    

 ?>
