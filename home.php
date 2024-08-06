<?php 
session_start();
include 'koneksi.php' ;

if ($_SESSION['login'] == null) {

echo "<script type='text/javascript'> alert('Anda Belum Login');
            window.location.replace('index.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "./menu/head.php"; ?>

<body>

    <!--*******************
        Loading start
    ********************-->
<!--     <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
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
                        <div class="card gradient-7">
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
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Perhitungan WMA</h4> 
                                        <form>
                                        <div class="form-group row">
                                            <label for="inputProduk" class="col-sm-2 col-form-label">Pilih Produk</label>
                                            <div class="col-sm-10">
                                               <select id="inputProduk" placeholder="Pilih Produk" name="produk" required>
                                                <option value="">Pilih Produk.</option>
                                                <?php  
                                                    $no = 1;
                                                    $query = "SELECT `ID_PRODUK`, `NAMA_PRODUK`, `SATUAN_PRODUK`, `HARGA_PRODUK`, `STOK_PRODUK` FROM `produk`";
                                                    $result = mysqli_query($conn, $query);
                                                    if ($result) {
                                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    $idproduk = htmlspecialchars($row['ID_PRODUK'], ENT_QUOTES);
                                                    $namaproduk = htmlspecialchars($row['NAMA_PRODUK'], ENT_QUOTES);
                                                    $satuanproduk = htmlspecialchars($row['SATUAN_PRODUK'], ENT_QUOTES);
                                                    $hargaproduk = htmlspecialchars($row['HARGA_PRODUK'], ENT_QUOTES);
                                                    $stokproduk = htmlspecialchars($row['STOK_PRODUK'], ENT_QUOTES);
                                                    ?>
                                                    <option value="<?php echo $idproduk;?>"><?php echo $namaproduk;?></option>
                                                    <?php
                                                    $no++;
                                                          }
                                                        };
                                                    ?>
                                                </select>  
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dateInput" class="col-sm-2 col-form-label">Pilih Bulan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" placeholder="tanggal" id="dateInput" name="tanggal" required>
                                            </div>
                                        </div>

                                        <hr>

                                        <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" id="label1">Bulan 1</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="input1" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" value="0.4" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" id="label2">Bulan 2</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="input2" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="0.3" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" id="label3">Bulan 3</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="input3" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="0.2" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" id="label4">Bulan 4</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="input4" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="0.1" readonly>
                                            </div>
                                        </div>

                                        <input type="hidden" id="idakses" value="<?php echo $_SESSION['id_akses']; ?>">

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <button type="button" onclick="submitForm()" class="btn btn-dark float-right" name="btnhitung">Hitung</button>
                                            </div>
                                        </div>

                                    </form>  
                                </div>
                            </div>
                            
                        </div>    
                        <div class="col-lg-3 col-md-6">

                            <div class="card card-widget">

                                <div class="card-body">
                                    <div class="card gradient-8" >
                                    <div class="card-body">
                                    <center>
                                    <h5 id="katahas" style="color: black;">Hasil Perhitungan</h5>
                                    <h2  id="hasil" class="mt-4" style="color: black;">0</h2>
                                    
                                    </center>
                                    </div>
                                    </div>
                                    <center><h4>Dengan Perhitungan Seperti Dibawah</h4>
                                    <div class="mt-4">
                                        <h5 id="bulanh1">Bulan 1</h5>
                                        <div class="row">
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="nbln1">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="kali1">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="hasper1">0</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h5 id="bulanh2">Bulan 2</h5>
                                        <div class="row">
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="nbln2">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="kali2">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="hasper2">0</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h5 id="bulanh3">Bulan 3</h5>
                                        <div class="row">
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="nbln3">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="kali3">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="hasper3">0</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h5 id="bulanh4">Bulan 4</h5>
                                        <div class="row">
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="nbln4">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="kali4">0</span>
                                        </div>
                                        <div class="col" style="border-style: solid; border-width: 1px;">
                                          <span id="hasper4">0</span>
                                        </div>
                                        </div>
                                    </div>
                                    </center>
                                    
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

            <div id="tampilannilai"></div>
          
              </div>
            </div>
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
    
    <script type="text/javascript">
    new DataTable('#tableproduk');
    $('#tampilannilai').load("nilaiperhitungan.php");

    $(document).ready(function () {
      $('#inputProduk').selectize({
          sortField: 'text'
      });
    });
    
    var bulanh1 = '';
    var bulanh2 = '';
    var bulanh3 = '';
    var bulanh4 = '';

        $(document).ready(function() {
      // Menangkap event saat nilai pada elemen input atau dropdown berubah
      $('#inputProduk, #dateInput').on('input change', function() {
        // Mengambil nilai input dan dropdown
        var inputtgl = $('#dateInput').val();
        var selectProduk = $('#inputProduk').val();

        // Mengirim permintaan AJAX ke server PHP dengan data input
        $.ajax({
          url: './beranda/getData.php', // Ganti dengan path ke file PHP Anda
          method: 'POST',
          data: {
            id: selectProduk,
            tgl: inputtgl
          },
          dataType: 'json',
          success: function(data) {
            // Menangani data yang diterima dari server
            displayData(data);
          },
          error: function(error) {
            console.error('Error fetching data:', error);
          }
        });
      });

      // Fungsi untuk menampilkan data di dalam elemen dengan ID "dataResult1", "dataResult2", dll.
      function displayData(data) {
        // Memproses data dan menampilkannya pada masing-masing elemen input
        if (data.length >= 4) {
          $('#input1').val(data[0].nilai);
          $('#input2').val(data[1].nilai);
          $('#input3').val(data[2].nilai);
          $('#input4').val(data[3].nilai);

          $('#label1').text('Bulan ' + data[0].bulan);
          $('#label2').text('Bulan ' + data[1].bulan);
          $('#label3').text('Bulan ' + data[2].bulan);
          $('#label4').text('Bulan ' + data[3].bulan);

             bulanh1 = data[0].bulan;
             bulanh2 = data[1].bulan;
             bulanh3 = data[2].bulan;
             bulanh4 = data[3].bulan;
          toastr.success('Data Ditemukan');
        }else{
            toastr.warning('Data Tidak Ditemukan');
        }
      }

    });


    function submitForm() {
      // Tangani peristiwa klik tombol
      
        // Dapatkan data formulir
        var id = $('#idakses').val();
        var bulan1 = $('#input1').val();
        var bulan2 = $('#input2').val();
        var bulan3 = $('#input3').val();
        var bulan4 = $('#input4').val();
        var inputtgl = $('#dateInput').val();
        var selectProduk = $('#inputProduk').val();

        var kali1 = 0.4;
        var kali2 = 0.3;
        var kali3 = 0.2;
        var kali4 = 0.1;

        var hasper1 = Math.round(bulan1 * kali1);
        var hasper2 = Math.round(bulan2 * kali2);
        var hasper3 = Math.round(bulan3 * kali3);
        var hasper4 = Math.round(bulan4 * kali4);

        var hasil = Math.round( (bulan1 * 0.4) + (bulan2 * 0.3) + (bulan3 * 0.2) + (bulan4 * 0.1));

         $('#hasil').text(hasil);

         $('#bulanh1').text('Bulan 1 ' + bulanh1);
          $('#bulanh2').text('Bulan 2 ' + bulanh2);
          $('#bulanh3').text('Bulan 3 ' + bulanh3);
          $('#bulanh4').text('Bulan 4 ' + bulanh4);

          $('#nbln1').text( bulan1);
          $('#nbln2').text( bulan2);
          $('#nbln3').text( bulan3);
          $('#nbln4').text( bulan4);

          $('#kali1').text( kali1);
          $('#kali2').text( kali2);
          $('#kali3').text( kali3);
          $('#kali4').text( kali4);

          $('#hasper1').text( hasper1);
          $('#hasper2').text( hasper2);
          $('#hasper3').text( hasper3);
          $('#hasper4').text( hasper4);

          $('#katahas').text( 'Hasil Perhitungan ' + inputtgl);
        // Kirim data ke server menggunakan AJAX
        $.ajax({
          type: "POST",
          url: "./beranda/insert_perhitungan.php",  // Tentukan skrip PHP yang menangani interaksi dengan database
          data: {id : id, bln1 : bulan1 ,  bln2 : bulan2,  bln3 : bulan3,  bln4 : bulan4 ,idpro: selectProduk, tgl: inputtgl, hasil:hasil},

          success: function(response) {
            console.log(response);
            $('#tampilannilai').load("nilaiperhitungan.php");
            
          },
          error: function(err) {
            console.error(err);

            
          }
        });
      
    };



                                     
    </script>
    </body>
    </html>