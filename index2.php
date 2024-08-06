 <?php 
session_start();
include 'koneksi.php' ?>
<!DOCTYPE html>
<html lang="en">

<?php include "./menu/head.php"; ?>

<body>
    <!--*******************
        Loading start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Loading end
    ********************-->

        <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
             header start
        ***********************************-->

        <?php include "./menu/header.php"; ?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <?php include "./menu/slidebar.php"; ?>

        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Products Sold</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Net Profit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">$ 8541</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">New Customers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Customer Satisfaction</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">99%</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body pb-0 d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-1"> Data penjualan aktual dan data penjualan peramalan</h4>
                                            
                                        </div>
                                        <div>
                                            <ul>
                                                <li class="d-inline-block mr-3"><a class="text-dark" href="#">Tahun 2023</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <canvas id="barChart" width="1000"></canvas>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="row">

                        <div class="col-lg-6 col-md-12">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Perhitungan WMA</h4>
                                    <div class="form-group">

                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-8">
                                                <label>Pilih bulan</label>
                                                <input type="text"  class="form-control" placeholder="Masukkan Bulan" id="mdate" name="nbln">
                                            </div>
                                            
                                            <div class="col-4">
                                                <button type="submit" name="btncari" class="btn mb-1 btn-rounded btn-secondary btn-large form-control" >Pilih bulan</button>
                                            </div>
                                        </div>
                                        </form>
                                             
                                        <?php

                                        if (isset($_POST['btncari']))  {
                                            

                                                $no = 0;
                                                

                                                $nbln = $_POST['nbln'];
                                                $explode = explode("-", $nbln);
                                                $bulan = $explode[1];
                                                $tahun = $explode[0];
                                                $databln = array();

                                                $queryid = "SELECT no, EXTRACT(YEAR FROM tanggal) AS tahun, EXTRACT(MONTH FROM tanggal) AS bulan FROM nilai_bln where EXTRACT(YEAR FROM tanggal) = ". $tahun ." AND EXTRACT(MONTH FROM tanggal) ='". $bulan ."'";
                                                $resultid = mysqli_query($conn, $queryid);
                                                while ($row = mysqli_fetch_array($resultid, MYSQLI_ASSOC)) {
                                                    $idperhitungan = htmlspecialchars($row['no'], ENT_QUOTES);
                                                }
   

                                                $query = mysqli_query($conn,"SELECT no, nilai_aktual, nilai_predik, EXTRACT(YEAR FROM tanggal) AS tahun, EXTRACT(MONTH FROM tanggal) AS bulan FROM nilai_bln where EXTRACT(YEAR FROM tanggal) = ". $tahun ." AND EXTRACT(MONTH FROM tanggal) <'". $bulan . "' order by tanggal DESC limit 4");
                                                $hitung_data = mysqli_num_rows($query);
                                                if ($hitung_data > 0) {
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    
                                                    $databln[$no] = $data['nilai_aktual'];
                                                    
                                                    $no++;
                                                    } 

                                                 } else { ?> 
                                                        

                                                <?php } }?> 
                                       

                                    </div>

                                        <div class="hasil">
                                            <form action="" id="formperhitungan" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <input hidden type="text" name="idbln" value="<?php echo $idperhitungan; ?>">
                                                        <input readonly placeholder="" class="form-control input-rounded" type="text" name="nilai1" value="<?php echo $databln[0] ;?>">
                                                    </div>
                                                    <label>*</label>
                                                    <div class="col-md-4">
                                                        <input readonly placeholder="Nilai kali1" class="form-control input-rounded" type="text" name="kali1" value="0.4">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <input readonly placeholder="" class="form-control input-rounded" type="text" name="nilai2" value="<?php echo $databln[1] ;?>">
                                                    </div>
                                                    <label>*</label>
                                                    <div class="col-md-4">
                                                        <input readonly placeholder="Nilai kali1" class="form-control input-rounded" type="text" name="kali2" value="0.3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <input readonly placeholder="Nilai 1" class="form-control input-rounded" type="text" name="nilai3" value="<?php echo $databln[2] ;?>">
                                                    </div>
                                                    <label>*</label>
                                                    <div class="col-md-4">
                                                        <input readonly placeholder="Nilai kali1" class="form-control input-rounded" type="text" name="kali3" value="0.2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <input readonly placeholder="Nilai 1" class="form-control input-rounded" type="text" name="nilai4" value="<?php echo $databln[3] ;?>">
                                                    </div>
                                                    <label>*</label>
                                                    <div class="col-md-4">
                                                        <input readonly placeholder="Nilai kali1" class="form-control input-rounded" type="text" name="kali4" value="0.1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <button type="button" id="submit" name="btnhitung" class="btn mb-1 btn-rounded btn-primary btn-large form-control">Hitung</button>
                                                
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-lg-3 col-md-6">
                            
                            <?php $query1 = "where " ?>

                            <div class="card card-widget">
                                <div id="hasilper">
                                    
                                </div>
                            </div>

                            

                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-0">
                                    <h4 class="card-title px-4 mb-3">Todo</h4>
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul id="todo_list">
                                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                                    <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                    <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                                </ul>
                                            </div>
                                            <div class="px-4">
                                                <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                        <div>
                                            <center><h4 class="mb-1"> Perhitungan MAPE</h4></center>
                                            
                                        </div>
                                    </div>
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0">
                                            <thead>
                                               <?php 
                                               $nobagi = 0;
                                               $hasilmape = 0;
                                               $hasilmad = 0;
                                               $hasilmse = 0;
                                               $query = "SELECT `nilai_aktual`, `nilai_predik`, `tanggal` FROM `nilai_bln` ";
                                                $result = mysqli_query($conn, $query);
                                                if ($result) {
                                                ?>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Data Aktual</th>
                                                    <th>Data Prediksi</th>
                                                    <th>MAPE</th>
                                                    <th>MAD</th>
                                                    <th>MSE</th>
                                                </tr>
                                            </thead>
                    
                                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $nilaiaktual = htmlspecialchars($row['nilai_aktual'], ENT_QUOTES);
                                                $nilaipredik = htmlspecialchars($row['nilai_predik'], ENT_QUOTES);
                                                $tanggal = htmlspecialchars($row['tanggal'], ENT_QUOTES);
                                                if ($nilaipredik != 0) {
                                                    $mape = abs( ($nilaiaktual - $nilaipredik) / $nilaiaktual);
                                                    $mad = abs($nilaiaktual - $nilaipredik);
                                                    $mse = abs(($nilaiaktual - $nilaipredik) * ($nilaiaktual - $nilaipredik));
                                                    $nobagi++;
                                                    $hasilmape+= $mape ;
                                                    $hasilmad+= $mad ;
                                                    $hasilmse+= $mse ;
                                                }else{
                                                    $mape = 0;
                                                    $mad = 0;
                                                    $mse = 0;
                                                }

                                                
            
                                                ?>
                                            <tbody>
                                            <tr>
                                              <td ><?php echo $tanggal; ?></td>
                                              <td><?php echo $nilaiaktual; ?></td>
                                              <td><?php echo $nilaipredik; ?></td>
                                              <td><?php echo $mape; ?></td>
                                              <td><?php echo $mad; ?></td>
                                              <td><?php echo $mse; ?></td>
                                              
                                            </tr> 

                                             <?php } ?>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td><b>Total : </b></td>
                                                <td><?php echo $hasilmape; ?></td>
                                                <td><?php echo $hasilmad; ?></td>
                                                <td><?php echo $hasilmse; ?></td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td><b>Jumlah Data : </b></td>
                                                <td><?php echo $nobagi; ?></td>
                                                <td><?php echo $nobagi; ?></td>
                                                <td><?php echo $nobagi; ?></td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td><b>Jumlah Data : </b></td>
                                                <td><?php echo ($hasilmape*100)/$nobagi; ?></td>
                                                <td><?php echo $hasilmad/$nobagi; ?></td>
                                                <td><?php echo $hasilmse/$nobagi; ?></td>
                                            </tr>

                                              <?php } ?>  
                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>


            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p> Template By Quixlab || Developed by Akhmat Hidayatulloh 2023 </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php include "./menu/script.php"; ?>

    <!-- js chart 1 -->
    <script type="text/javascript">

    $(document).ready(function () {
      $('#select1').selectize({
          sortField: 'text'
      });
  });

    var ctx = document.getElementById("barChart");
    ctx.height = 150;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "February", "Maret", "April", "Mei", "Juni", "Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [
                {
                    label: "Aktual",
                    data:   [

                        <?php  $data = mysqli_query($conn,"select * from nilai_bln");
                        while($d1=mysqli_fetch_array($data)){  ?>
                            <?php echo $d1['nilai_aktual'].','; ?>
                        <?php  } ?>
                            ],
                   
                    borderColor: "rgba(117, 113, 249, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(117, 113, 249, 0.5)"
                },
                {
                    label: "Peramalan",
                    data: [
                        <?php  $data = mysqli_query($conn,"select * from nilai_bln");
                        while($d2=mysqli_fetch_array($data)){  ?>
                            <?php echo $d2['nilai_predik'].','; ?>
                        <?php  } ?>
                        ],
                    borderColor: "rgba(144, 104,    190,0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(144, 104,    190,0.7)"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    // Change here
                    barPercentage: 0.2
                }]
            }
        }
    });


   $(document).ready(function(){

                    $('#hasilper').load("beranda/hasilper.php");

                        $("#submit").click(function(){
                        var data = $('#formperhitungan').serialize();
                        $.ajax({
                        type    : 'POST',
                        url : "beranda/updatepredik.php",
                        data: data,
                        cache   : false,
                        success : function(data){
                        $('#hasilper').load("beranda/hasilper.php");
                    }
                });
            });
        });

      $(document).ready(function(){

                    $('#hasilper').load("beranda/hasilper.php");

                        $("#Submit").click(function(){
                        var data = $('#formperhitungan').serialize();
                        $.ajax({
                        type    : 'POST',
                        url : "beranda/updatepredik.php",
                        data: data,
                        cache   : false,
                        success : function(data){
                        $('#hasilper').load("beranda/hasilper.php");
                    }
                });
            });
        });

      
  </script>


</body>


</html>
