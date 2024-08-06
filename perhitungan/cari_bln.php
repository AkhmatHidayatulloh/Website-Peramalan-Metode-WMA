<?php

if (isset($_POST['btncari']))  {
    

        $no = 0;
        $koneksi = mysqli_connect("localhost", "root", "", "perhitungan_wma");

        $nbln = $_POST['nbln'];
        
        $databln = array();
        $databln1 = "";

        $query = mysqli_query($koneksi,"SELECT * FROM nilai_bln WHERE tanggal <= '". $nbln . "' limit 4");
        $hitung_data = mysqli_num_rows($query);
        if ($hitung_data > 0) {
            while ($data = mysqli_fetch_array($query)) {
            
            $databln[$no] = $data['nilai'];
            
            $no++;
            } 
        } else { ?> 
                

        <?php } }?>


        