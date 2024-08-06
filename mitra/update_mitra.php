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
	
	
		 	 	
			$query = "UPDATE mitra SET nama_mitra = '".$nama."', alamat_mitra = '".$alamat."', kota_mitra = '".$kota."', nohp_mitra = '".$nohp."', email_mitra = '".$email."' WHERE id_mitra ='". $id."'";
            $result = mysqli_query($conn, $query);

         if ($result) {
           	echo "<script type='text/javascript'>alert('Data Berhasil DiUpdate');
    		window.location.replace('../mitra.php');</script>";
            
            }else{
			echo "<script>  alert('Data Gagal di Update') </script>";
			
            };
	};

 ?>	