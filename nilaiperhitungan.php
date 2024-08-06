
<style type="text/css">
    /*** vesitable Start ***/
.vesitable .vesitable-item {
    height: 100%;
    transition: 0.5s;
}

.vesitable .vesitable-item:hover {
    box-shadow: 0 0 55px rgba(0, 0, 0, 0.4);
}

.vesitable .vesitable-item .vesitable-img {
    overflow: hidden;
    transition: 0.5s;
    border-radius: 10px 10px 0 0;
}

.vesitable .vesitable-item .vesitable-img img {
    transition: 0.5s;
}

.vesitable .vesitable-item .vesitable-img img:hover {
    transform: scale(1.2);
}

.vesitable .owl-stage {
    margin: 50px 0;
    position: relative;
}

.vesitable .owl-nav .owl-prev {
    position: absolute;
    top: -8px;
    right: 0;
    color: #f59038;
    padding: 5px 25px;
    border: 1px solid #f5a338;
    border-radius: 20px;
    transition: 0.5s;

}

.vesitable .owl-nav .owl-prev:hover {
    background: #f5a338;
    color: white;
}

.vesitable .owl-nav .owl-next {
    position: absolute;
    top: -8px;
    right: 88px;
    color: #f59038;
    padding: 5px 25px;
    border: 1px solid #f5a338;
    border-radius: 20px;
    transition: 0.5s;
}

.vesitable .owl-nav .owl-next:hover {
    background: #f5a338;
    color: white;
}
/*** vesitable End ***/
    
</style>
<!-- Vesitable Shop Start-->
        <div class="row">
        <div class="container-fluid vesitable py-5">
            <div class="container ">
                <h1 class="mb-0">Hasil Perhitungan</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <?php
                          $no = 1;
                          include ('koneksi.php');
                          $query = "SELECT `ID_PERHITUNGAN`, b.ID_PRODUK, NAMA_PRODUK , `ID_AKSES`, `NILAI_PERHITUNGAN`, `TANGGAL_PERHITUNGAN`, DATE_FORMAT(DATE_SUB(TANGGAL_PERHITUNGAN, INTERVAL 1 MONTH), '%M') AS nama_bulan1 , DATE_FORMAT(DATE_SUB(TANGGAL_PERHITUNGAN, INTERVAL 2 MONTH), '%M') AS nama_bulan2 , DATE_FORMAT(DATE_SUB(TANGGAL_PERHITUNGAN, INTERVAL 3 MONTH), '%M') AS nama_bulan3, DATE_FORMAT(DATE_SUB(TANGGAL_PERHITUNGAN, INTERVAL 4 MONTH), '%M') AS nama_bulan4 , `Nilai_Bulan_1`, `Nilai_Bulan_2`, `Nilai_Bulan_3`, `Nilai_Bulan_4` FROM `perhitungan_wma` a join produk b ON a.ID_PRODUK = b.ID_PRODUK ORDER BY ID_PERHITUNGAN DESC;";
                          $result = mysqli_query($conn, $query);
                          if ($result) {
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          $id = htmlspecialchars($row['ID_PRODUK'], ENT_QUOTES);
                          $tp = htmlspecialchars($row['TANGGAL_PERHITUNGAN'], ENT_QUOTES);
                          $np = htmlspecialchars($row['NAMA_PRODUK'], ENT_QUOTES);
                          $nilaiper = htmlspecialchars($row['NILAI_PERHITUNGAN'], ENT_QUOTES);
                          $namabln1 = htmlspecialchars($row['nama_bulan1'], ENT_QUOTES);
                          $namabln2 = htmlspecialchars($row['nama_bulan2'], ENT_QUOTES);
                          $namabln3 = htmlspecialchars($row['nama_bulan3'], ENT_QUOTES);
                          $namabln4 = htmlspecialchars($row['nama_bulan4'], ENT_QUOTES);
                          $nilaibln1 = htmlspecialchars($row['Nilai_Bulan_1'], ENT_QUOTES);
                          $nilaibln2 = htmlspecialchars($row['Nilai_Bulan_2'], ENT_QUOTES);
                          $nilaibln3 = htmlspecialchars($row['Nilai_Bulan_3'], ENT_QUOTES);
                          $nilaibln4 = htmlspecialchars($row['Nilai_Bulan_4'], ENT_QUOTES);
                          $kali1 = 0.4 ;
                          $kali2 = 0.3 ; 
                          $kali3 = 0.2 ; 
                          $kali4 = 0.1 ;                     
                          $hasilper1 = $nilaibln1 * $kali1 ;
                          $hasilper2 = $nilaibln2 * $kali2 ;
                          $hasilper3 = $nilaibln3 * $kali3 ;
                          $hasilper4 = $nilaibln4 * $kali4 ;
                          $hasilsemper = $hasilper1 + $hasilper2 + $hasilper3 + $hasilper4;


                          ?>
                    <div class="border border-secondary rounded position-relative vesitable-item">
                     <div class="card card-widget">
                        
                      <div class="card-body">
                         <div class="card gradient-<?php echo $no; ?>" >
                         <div class="card-body">
                         <center>
                         <h6  style="color: black;">Produk <?php echo $np; ?></h6>
                         <h5  style="color: black;">Hasil Perhitungan</h5>
                         <h5  style="color: black;"><?php echo $tp; ?></h5>
                         <h2  class="mt-4" style="color: black;"><?php echo $nilaiper; ?></h2>
                         </center>
                         </div>
                         </div>
                         <center><h4>Dengan Perhitungan Seperti Dibawah</h4>
                         <div class="mt-4">
                             <h5 >Bulan 1 <?php echo $namabln1; ?></h5>
                             <div class="row">
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $nilaibln1; ?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $kali1; ?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $hasilper1; ?></span>
                             </div>
                             </div>
                         </div>
                         <div class="mt-4">
                             <h5 id="bulanh2">Bulan 2 <?php echo $namabln2; ?></h5>
                             <div class="row">
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $nilaibln2 ;?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $kali2; ?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $hasilper2; ?></span>
                             </div>
                             </div>
                         </div>
                         <div class="mt-4">
                             <h5 id="bulanh3">Bulan 3 <?php echo $namabln3; ?></h5>
                             <div class="row">
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $nilaibln3 ;?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span><?php echo $kali3; ?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span><?php echo $hasilper3; ?></span>
                             </div>
                             </div>
                         </div>
                         <div class="mt-4">
                             <h5 id="bulanh4">Bulan 4 <?php echo $namabln4; ?></h5>
                             <div class="row">
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $nilaibln1 ;?></span>
                             </div>
                             <div class="col" style="border-style: solid; border-width: 1px;">
                               <span ><?php echo $kali4; ?></span>
                             </div>
                            <div class="col" style="border-style: solid; border-width: 1px;">
                              <span ><?php echo $hasilper4; ?></span>
                            </div>
                            </div>
                        </div>
                        </center>           
                      </div> 
                     </div>     
                    </div>

                    <?php
                        $no++;

                        
                           }
                         };
                        ?>
                </div>
            </div>
        </div>
     </div> 
        <!-- Vesitable Shop End -->
        <script src="./slidecss/lib/easing/easing.min.js"></script>
    <script src="./slidecss/lib/waypoints/waypoints.min.js"></script>
    <script src="./slidecss/lib/lightbox/js/lightbox.min.js"></script>
    <script src="./slidecss/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="./slidecss/js/main.js"></script>