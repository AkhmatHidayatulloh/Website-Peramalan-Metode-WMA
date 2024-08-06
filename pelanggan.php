 <?php 
session_start();
include 'koneksi.php' ;

if ($_SESSION['login'] == null) {

echo "<script type='text/javascript'> alert('Anda Belum Login');
            window.location.replace('index.php');</script>";
}?>
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

               <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Master Pelanggan</h4>
                                <div class="basic-form">
                                    <form class="forms-sample" action="pelanggan/insert_pelanggan.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kota Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Kota" name="kota" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor HP Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Nomor HP" name="nohp" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-dark" name="btnsaveplg">Save</button>
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
                                        <h4 class="card-title">Data Table Pelanggan</h4>
                                        <div class="table-responsive">
                                            <table id="tablepelanggan" class="display">
                                                <thead>
                                                   <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Kota</th>
                                                        <th>Nomor HP</th>
                                                        <th>Email</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    include ('koneksi.php');
                                                    $query = "SELECT `ID_PELANGGAN`, `NAMA_PELANGGAN`, `ALAMAT_PELANGGAN`, `KOTA_PELANGGAN`, `NOHP_PELANGGAN`, `EMAIL_PELANGGAN` FROM `pelanggan`";
                                                    $result = mysqli_query($conn, $query);
                                                    if ($result) {
                                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    $id = htmlspecialchars($row['ID_PELANGGAN'], ENT_QUOTES);
                                                    $nama = htmlspecialchars($row['NAMA_PELANGGAN'], ENT_QUOTES);
                                                    $alamat = htmlspecialchars($row['ALAMAT_PELANGGAN'], ENT_QUOTES);
                                                    $kota = htmlspecialchars($row['KOTA_PELANGGAN'], ENT_QUOTES);
                                                    $nohp = htmlspecialchars($row['NOHP_PELANGGAN'], ENT_QUOTES);
                                                    $email = htmlspecialchars($row['EMAIL_PELANGGAN'], ENT_QUOTES);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $nama; ?></td>
                                                        <td><?php echo $alamat; ?></td>
                                                        <td><?php echo $kota; ?></td>
                                                        <td><?php echo $nohp; ?></td>
                                                        <td><?php echo $email; ?></td>
                                                        <td>
                                                            <button class=" btn btn-success" style="color: white;" id="tombolubah"  data-toggle="modal" data-target="#update" 
                                                            data-id="<?= $id; ?>" data-nama="<?= $nama; ?>" data-alamat="<?= $alamat; ?>" data-kota="<?= $kota;?>" data-nohp="<?= $nohp;?>" data-email="<?= $email;?>" >Update</button>
                                                            <button type="button" id="tombolhapus" class="btn btn-danger" data-id="<?= $id; ?>" data-toggle="modal" data-target="#hapus">Hapus</button>
                                                        </td>
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
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Kota</th>
                                                        <th>Nomor HP</th>
                                                        <th>Email</th>
                                                        <th>Aksi</th>
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

            <!-- Modal -->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Form Update pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                
                  <form action="pelanggan/update_pelanggan.php" method="post">
                  <div class="modal-body">

                    <input type="hidden" name="id" id="id">
                  
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama ">
                      </div>
                    </div>
                   <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kota</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">No HP</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No HP">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer d-flex justify-content">      
                    <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit" name="btnupdate" data-target="">Update</button>
                  </div>

                  </form>
                </div>
              </div>
            </div>


            <!-- Modal Hapus-->
            <div class="modal fade" id="hapus">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <form action="pelanggan/hapus_pelanggan.php" method="post">
                         <div class="modal-body ">
                            
                            <input type="hidden" name="id" id="idhapus" >
                            <p>Apakah Anda Yakin Menghapus Data Ini</p>
                            
                         </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-success">Hapus</button>
                         </div>
                         </form>
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


<!-- tutup chart -->

<!-- js pencarian -->
<script type="text/javascript">
    new DataTable('#tablepelanggan');
            $(document).on("click","#tombolubah", function(){

            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let alamat = $(this).data('alamat');
            let kota = $(this).data('kota');
            let nohp = $(this).data('nohp');
            let email = $(this).data('email');

            $(".modal-body #id").val(id);
            $(".modal-body #nama").val(nama);
            $(".modal-body #alamat").val(alamat);
            $(".modal-body #kota").val(kota);
            $(".modal-body #nohp").val(nohp);
            $(".modal-body #email").val(email);
         
          });   
            $(document).on("click","#tombolhapus", function(){

            let id = $(this).data('id');         

            $(".modal-body #idhapus").val(id);

            });


</script>



</body>


</html>
