<?php 
include '../koneksi.php';


    $query = "SELECT max(id_pelanggan) as id FROM pelanggan where SUBSTR(id_pelanggan, 3, 8) = REPLACE(CURRENT_DATE(),'-','');";
    $result = mysqli_query($conn, $query);
    if ($result != null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $idplg = $row['id'];  
            $urutan1 = (int) substr($idplg, 11, 14);
            $urutan1++;
            $pr = "PL";
            $tgl = date('Ymd');

            $id = $pr . $tgl.   sprintf("%04s", $urutan1);
            
        }
    } else {
        echo "Data tidak masuk";
        
        
        $pr = "PL";
        $tgl = date('Ymd');
        $id = $pr . $tgl.   "0001";
    }

    if (isset($_POST['btnsaveplg'])) 
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $nohp = $_POST['nohp'];
        $email = $_POST['email'];
        

        

        $query = "INSERT INTO `pelanggan`(`ID_PELANGGAN`, `NAMA_PELANGGAN`, `ALAMAT_PELANGGAN`, `KOTA_PELANGGAN`, `NOHP_PELANGGAN`, `EMAIL_PELANGGAN`) VALUES ('$id','$nama','$alamat','$kota','$nohp','$email')";
            $result = mysqli_query($conn, $query);

         if ($result) {
           echo "<script type='text/javascript'>alert('Data Berhasil Ditambahkan');
            window.location.replace('../pelanggan.php');</script>";
            
            }else{
            echo "<script> alert('Data Gagal di Tambahkan') </script>";
            }   
    }

    

 ?>
