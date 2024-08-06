<?php 

	include ('../koneksi.php');
	

	if (isset($_POST['btnupdate'])) 
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$satuan = $_POST['satuan'];
		$harga = $_POST['harga'];

		 	 	
			$query = "UPDATE produk SET nama_produk = '".$nama."', satuan_produk = '".$satuan."', harga_produk = '".$harga."' WHERE id_produk ='". $id."'";
            $result = mysqli_query($conn, $query);

         if ($result) {
           	echo "<script type='text/javascript'>alert('Data Berhasil DiUpdate');
    		window.location.replace('../produk.php');</script>";
            
            }else{
			echo "<script>  alert('Data Gagal di Update') </script>";
			
            };
	};

 ?>	