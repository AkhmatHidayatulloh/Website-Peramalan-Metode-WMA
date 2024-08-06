 <?php 
session_start();
include 'koneksi.php' ;

if ($_SESSION['login'] == null) {

echo "<script type='text/javascript'> alert('Anda Belum Login');
            window.location.replace('index.php');</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

<?php include "./menu/head.php"; ?>
<link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
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

               <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Produk Keluar</h4>
                                <div class="basic-form">
                                    <form class="forms-sample" action="transaksi_keluar/insert_transaksi_keluar.php" method="post">
                                        
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Produk Keluar</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" placeholder="tanggal" id="mdate" name="tanggal" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Produk Keluar</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" placeholder="jumlah" name="jumlah" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Produk</label>
                                            <div class="col-sm-10">
                                               <select id="select1" placeholder="Pilih Produk" name="produk" required>
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
                                            <label class="col-sm-2 col-form-label">Pelanggan</label>
                                            <div class="col-sm-10">
                                                <select id="select2" class="form-control" placeholder="Pilih pelanggan" name="pelanggan" required>
                                                <option value="">Pilih Pelanggan.</option>
                                                  <?php  
                                                    $no = 1;
                                                    $query = "SELECT `ID_PELANGGAN`, `NAMA_PELANGGAN`, `ALAMAT_PELANGGAN`, `KOTA_PELANGGAN`, `NOHP_PELANGGAN`, `EMAIL_PELANGGAN` FROM `pelanggan`";
                                                    $result = mysqli_query($conn, $query);
                                                    if ($result) {
                                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    $idpelanggan = htmlspecialchars($row['ID_PELANGGAN'], ENT_QUOTES);
                                                    $namapelanggan = htmlspecialchars($row['NAMA_PELANGGAN'], ENT_QUOTES);
                                                    $alamatpelanggan = htmlspecialchars($row['ALAMAT_PELANGGAN'], ENT_QUOTES);
                                                    $kotapelanggan = htmlspecialchars($row['KOTA_PELANGGAN'], ENT_QUOTES);
                                                    $nohppelanggan = htmlspecialchars($row['NOHP_PELANGGAN'], ENT_QUOTES);
                                                    $emailpelanggan = htmlspecialchars($row['EMAIL_PELANGGAN'], ENT_QUOTES);
                                                    ?>
                                                      <option value="<?php echo $idpelanggan;?>"><?php echo $namapelanggan;?></option>
                                                    <?php
                                                    $no++;
                                                          }
                                                        };
                                                    ?>
                                                </select>  
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-dark" name="btnsavetrmsk">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table Produk</h4>
                                <div class="table-responsive">
                                    <table id="tableproduk" class="display" >
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Tanggal Keluar</th>
                                                    <th>Jumlah Produk Keluar</th>
                                                    <th>Stok Awal</th>
                                                    <th>Stok Akhir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                    $no = 1;
                                                    include ('koneksi.php');
                                                    $query = "SELECT `ID_TRANSAKSI_KELUAR`, tr.ID_PELANGGAN , b.NAMA_PELANGGAN ,tr.ID_PRODUK, a.NAMA_PRODUK, a.STOK_PRODUK , `TGL_KELUAR`, `JUMLAH_PRODUK_KELUAR`, `STOK_AWAL_KELUAR`, `STOK_AKHIR_KELUAR` FROM `transaksi_produk_keluar` tr JOIN produk a on tr.ID_PRODUK = a.ID_PRODUK JOIN pelanggan b ON tr.ID_PELANGGAN = b.ID_PELANGGAN ORDER BY ID_TRANSAKSI_keluar DESC;";
                                                    $result = mysqli_query($conn, $query);
                                                    if ($result) {
                                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    $id = htmlspecialchars($row['ID_TRANSAKSI_KELUAR'], ENT_QUOTES);
                                                    $idpel = htmlspecialchars($row['ID_PELANGGAN'], ENT_QUOTES);
                                                    $namapel = htmlspecialchars($row['NAMA_PELANGGAN'], ENT_QUOTES);
                                                    $idproduk = htmlspecialchars($row['ID_PRODUK'], ENT_QUOTES);
                                                    $namaproduk = htmlspecialchars($row['NAMA_PRODUK'], ENT_QUOTES);
                                                    $stokawal = htmlspecialchars($row['STOK_AWAL_KELUAR'], ENT_QUOTES);
                                                    $stokakhir = htmlspecialchars($row['STOK_AKHIR_KELUAR'], ENT_QUOTES);
                                                    $jumlahkeluar = htmlspecialchars($row['JUMLAH_PRODUK_KELUAR'], ENT_QUOTES);
                                                    $tanggalkeluar = htmlspecialchars($row['TGL_KELUAR'], ENT_QUOTES);
                                                    $stokproduk = htmlspecialchars($row['STOK_PRODUK'], ENT_QUOTES);
                                                    
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $namaproduk; ?></td>
                                                    <td><?php echo $namapel; ?></td>
                                                    <td><?php echo $tanggalkeluar; ?></td>
                                                    <td><?php echo $jumlahkeluar; ?></td>
                                                    <td><?php echo $stokawal; ?></td>
                                                    <td><?php echo $stokakhir; ?></td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                          }
                                                        };
                                                    ?>
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>    
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Tanggal Keluar</th>
                                                    <th>Jumlah Produk Keluar</th>
                                                    <th>Stok Awal</th>
                                                    <th>Stok Akhir</th>
                                                    </tr>
                                                </tfoot>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


<!-- tutup chart -->

<!-- js pencarian -->



<script type="text/javascript">
    new DataTable('#tableproduk');

    $(document).ready(function () {
      $('#select1').selectize({
          sortField: 'text'
      });
  });
        $(document).ready(function () {
      $('#select2').selectize({
          sortField: 'text'
      });
  });
</script>


</body>


</html>
