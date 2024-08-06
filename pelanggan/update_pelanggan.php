<?php 

	include ('../koneksi.php');
	

	if (isset($_POST['btnupdate'])) 
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$nohp = $_POST['nohp'];
		$email = $_POST['email'];
	
	
		 	 	
			$query = "UPDATE pelanggan SET nama_pelanggan = '".$nama."', alamat_pelanggan = '".$alamat."', kota_pelanggan = '".$kota."', nohp_pelanggan = '".$nohp."', email_pelanggan = '".$email."' WHERE id_pelanggan ='". $id."'";
            $result = mysqli_query($conn, $query);

         if ($result) {
           	echo "<script type='text/javascript'>alert('Data Berhasil DiUpdate');
    		window.location.replace('../pelanggan.php');</script>";
            
            }else{
			echo "<script>  alert('Data Gagal di Update') </script>";
			
            };
	};

 ?>	