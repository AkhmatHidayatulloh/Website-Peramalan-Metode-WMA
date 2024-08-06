
<canvas id="barChart" width="1000"></canvas>

 <!-- js chart 1 -->
    <script type="text/javascript">
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

                        <?php  $data = mysqli_query($koneksi,"select * from nilai_bln");
                        while($d=mysqli_fetch_array($data)){  ?>
                            <?php echo $d['nilai_aktual'].','; ?>
                        <?php  } ?>
                            ],
                   
                    borderColor: "rgba(117, 113, 249, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(117, 113, 249, 0.5)"
                },
                {
                    label: "Peramalan",
                    data: [
                        <?php  $data = mysqli_query($koneksi,"select * from nilai_bln");
                        while($d=mysqli_fetch_array($data)){  ?>
                            <?php echo $d['nilai_predik'].','; ?>
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
    </script>

<!-- tutup chart -->