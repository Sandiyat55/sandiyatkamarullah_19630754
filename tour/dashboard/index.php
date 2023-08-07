<?php
session_start();
include '../include/config.php';

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}

$db = mysqli_query($conn, "SELECT * FROM users");
$sum = mysqli_num_rows($db);
$db2 = mysqli_query($conn, "SELECT * FROM transaksi where jenis_transaksi ='mobil'");
$sum2 = mysqli_num_rows($db2);
$db3 = mysqli_query($conn, "SELECT * FROM transaksi where jenis_transaksi ='wisata'");
$sum3 = mysqli_num_rows($db3);
$db4 = mysqli_query($conn, "SELECT SUM(total_harga) AS hargatotal from transaksi where status = 'selesai'");
$sum4 = mysqli_fetch_array($db4);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard | Travel Icha </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/charts/chartist/chartist.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/default-dashboard/style.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>

<body>
    <div id="eq-loader">
        <div class="eq-loader-div">
            <div class="eq-loading dual-loader mx-auto mb-5"></div>
        </div>
    </div>

    <?php include "../template/header.php"; ?>
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="ps-overlay"></div>
        <div class="search-overlay"></div>
        <?php include "../template/sidebar.php"; ?>
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Dashboard</h3>
                    </div>
                </div>

                <div class="row layout-spacing ">

                    <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-sales-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-location"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Wisata</p>
                                        <p class="widget-total-stats mt-2"><?= $sum3 ?> Wisata Order</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-order-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-fill-car"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Car</p>

                                        <p class="widget-total-stats mt-2"><?= $sum2 ?> Car Orders</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-customer-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-user-11"></i>
                                    </div> <?php $cust = $sum - 1; ?>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Customers</p>
                                        <p class="widget-total-stats mt-2"><?= $cust ?> Customers</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-income-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-bitcoin-logo"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Income</p>
                                        <p class="widget-total-stats mt-2">Rp.<?= number_format($sum4['hargatotal']) ?></p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area monthly-chart  br-4">
                            <div class="widget-content widget-content-area">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area monthly-chart  br-4">


                            <div class="widget-content widget-content-area">
                                <div class="c-b-s-header">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <h4><i class="flaticon-bell-3"></i> <strong>New Transaksi</strong> </h4> <br><br>
                                        </div>
                                        <div class="col-md-6 col-6 text-sm-right">
                                            <ul class="nav justify-content-end c-b-s-tab nav-pills" id="c-b-s-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="c-b-s-monthly-tab" data-toggle="pill" href="#c-b-s-monthly" role="tab" aria-controls="c-b-s-monthly" aria-selected="true">Tour</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="c-b-s-yearly-tab" data-toggle="pill" href="#c-b-s-yearly" role="tab" aria-controls="c-b-s-yearly" aria-selected="false">Mobil</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="c-b-s-monthly" role="tabpanel" aria-labelledby="c-b-s-monthly-tab">
                                        <div class="table-responsive customer-bal-summary-scroll-monthly">
                                            <table id="" class="table table-striped table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>wisata</th>
                                                        <th>Username</th>
                                                        <th>Tanggal</th>
                                                        <th>Bukti Pembayaran</th>
                                                        <th>Total Harga</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php

                                                        $sqltour = mysqli_query($conn, "SELECT transaksi.*, wisata.id_wisata, wisata.nama, users.id_user, users.username FROM transaksi INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata INNER Join users ON transaksi.id_user = users.id_user where jenis_transaksi = 'wisata' ORDER BY id_transaksi DESC limit 4;");
                                                        while ($rowtour = mysqli_fetch_assoc($sqltour)) {
                                                        ?>
                                                            <td><?php echo $rowtour['id_transaksi']; ?></td>
                                                            <td><?php echo $rowtour['nama']; ?></td>
                                                            <td><?php echo $rowtour['username']; ?></td>
                                                            <td><?php echo $rowtour['tanggal']; ?></td>
                                                            <?php if ($rowtour['gambar'] == "") { ?><td class="align-center">Belum ada pembayaran</td> <?php } else { ?>
                                                                <td class="align-center"><?php echo "<img src='../gambar/$rowtour[gambar]' width='70' height='90' />"; ?></td>
                                                            <?php } ?>
                                                            <td><?php echo $rowtour['total_harga']; ?></td>
                                                            <?php if ($rowtour['status'] == "menunggu persetujuan") {
                                                            ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-warning"><?php echo $rowtour['status']; ?></span></td>
                                                            <?php } elseif ($rowtour['status'] == "disetujui") {
                                                            ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-primary"><?php echo $rowtour['status']; ?></span></td>
                                                            <?php
                                                            } elseif ($rowtour['status'] == "selesai") { ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-success"><?php echo $rowtour['status']; ?></span></td>
                                                            <?php  } else { ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-danger"><?php echo $rowtour['status']; ?></span></td>
                                                            <?php } ?>

                                                    </tr>
                                                <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="c-b-s-yearly" role="tabpanel" aria-labelledby="c-b-s-yearly-tab">
                                        <div class="table-responsive customer-bal-summary-scroll-monthly">
                                            <table id="" class="table table-striped table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Mobil</th>
                                                        <th>Username</th>
                                                        <th>Tanggal</th>
                                                        <th>Bukti Pembayaran</th>
                                                        <th>Total Harga</th>
                                                        <th>Status</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $no = 1;
                                                        $sqlmobil = mysqli_query($conn, "SELECT transaksi.*, users.username, users.id_user , mobil.id_mobil, mobil.nama_mobil ,mobil.nomor_kendaraan, mobil.harga FROM transaksi INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil INNER JOIN users ON transaksi.id_user = users.id_user  where transaksi.jenis_transaksi = 'mobil' ORDER BY id_transaksi DESC limit 4;");
                                                        while ($rowmobil = mysqli_fetch_assoc($sqlmobil)) {
                                                        ?>
                                                            <td><?php echo $rowmobil['id_transaksi'] ?></td>
                                                            <td><?php echo $rowmobil['nama_mobil']; ?></td>
                                                            <td><?php echo $rowmobil['username']; ?></td>
                                                            <td><?php echo $rowmobil['tanggal']; ?></td>
                                                            <?php if ($rowmobil['gambar'] == "") { ?><td class="align-center">Belum ada pembayaran</td> <?php } else { ?>
                                                                <td class="align-center"><?php echo "<img src='../gambar/$rowmobil[gambar]' width='70' height='90' />"; ?></td>
                                                            <?php } ?> <td><?php echo $rowmobil['total_harga']; ?></td>
                                                            <?php if ($rowmobil['status'] == "menunggu persetujuan") {
                                                            ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-warning"><?php echo $rowmobil['status']; ?></span></td>
                                                            <?php } elseif ($rowmobil['status'] == "disetujui") {
                                                            ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-primary"><?php echo $rowmobil['status']; ?></span></td>
                                                            <?php
                                                            } elseif ($rowmobil['status'] == "selesai") { ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-success"><?php echo $rowmobil['status']; ?></span></td>
                                                            <?php  } else { ?>
                                                                <td class="align-center"><span class="shadow-none badge badge-danger"><?php echo $rowmobil['status']; ?></span></td>
                                                            <?php } ?>


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

                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->
    </div>
    <?php include "../template/footer.php"; ?>



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/loader.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../plugins/charts/chartist/chartist.js"></script>
    <script src="../plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugins/calendar/pignose/moment.latest.min.js"></script>
    <script src="../plugins/calendar/pignose/pignose.calendar.js"></script>
    <script src="../plugins/progressbar/progressbar.min.js"></script>
    <script src="../assets/js/default-dashboard/default-custom.js"></script>
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php


    $noo = 1;
    $queryy1 = mysqli_query($conn, "SELECT * from wisata where status ='Aktif' order by rating desc");
    $queryy2 = mysqli_query($conn, "SELECT * from wisata where status ='Aktif' order by rating desc");
    ?>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php while ($roww = mysqli_fetch_assoc($queryy1)) echo '"' . $roww['nama'] . '",' ?>],
                datasets: [{
                    label: 'penjualan',
                    data: [<?php while ($roww = mysqli_fetch_assoc($queryy2)) echo '"' . $roww['rating'] . '",' ?>],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }

        });
    </script>


</body>

</html>