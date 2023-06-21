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
$db4 = mysqli_query($conn, "SELECT SUM(total_harga) AS hargatotal from transaksi where status = 'Done'");
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
                                        <i class="flaticon-line-chart"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Sales</p>
                                        <p class="widget-total-stats mt-2"><?= $sum3 ?> New Sales</p>
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
                                        <i class="flaticon-cart-bag"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Orders</p>
                                        <p class="widget-total-stats mt-2"><?= $sum2 ?> New Orders</p>
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
                                        <i class="flaticon-money"></i>
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

                    <div class="col-xl-8 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area monthly-chart  br-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-2 col-12  align-self-center">
                                    <h3>Statistics</h3>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-10 col-12 mt-sm-0 mt-3">
                                    <ul class="nav justify-content-sm-end justify-content-center monthly-chart-tab nav-pills" id="monthly-chart" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="monthly-chart-weekly-tab" data-toggle="pill" href="#monthly-chart-weekly" role="tab" aria-controls="monthly-chart-weekly" aria-selected="true">Weekly</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="monthly-chart-monthly-tab" data-toggle="pill" href="#monthly-chart-monthly" role="tab" aria-controls="monthly-chart-monthly" aria-selected="true">Monthly</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="monthly-chart-yearly-tab" data-toggle="pill" href="#monthly-chart-yearly" role="tab" aria-controls="monthly-chart-yearly" aria-selected="false">Yearly</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 mt-3">
                                    <div class="tab-content" id="monthly-chartContent">
                                        <div class="tab-pane fade show active" id="monthly-chart-weekly" role="tabpanel" aria-labelledby="monthly-chart-weekly-tab">
                                            <div class="v-pv-weekly" style="height: 300px; width: 100%; margin-top: 30px;"></div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row mt-3">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-sm-right text-center mb-3 mr-sm-3 px-xl-0">
                                                        <div class="d-flex justify-content-sm-end  justify-content-center">
                                                            <div class="d-m-visitors data-marker align-self-center"></div>
                                                            <span class="visitors">Visitors : 9,823</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-sm-left text-center mb-3 ml-sm-3 px-xl-0">
                                                        <div class="d-flex justify-content-sm-start  justify-content-center">
                                                            <div class="d-m-page-view data-marker align-self-center"></div>
                                                            <span class="page-view">Pageviews : 21,655</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="monthly-chart-monthly" role="tabpanel" aria-labelledby="monthly-chart-monthly-tab">
                                            <div class="v-pv-monthly" style="height: 300px; width: 100%; margin-top: 30px;"></div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row mt-3">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-sm-right text-center mb-3 mr-sm-3 px-xl-0">
                                                        <div class="d-flex justify-content-sm-end  justify-content-center">
                                                            <div class="d-m-visitors data-marker data-marker-success align-self-center"></div>
                                                            <span class="visitors">Visitors : 19,823</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-sm-left text-center mb-3 ml-sm-3 px-xl-0">
                                                        <div class="d-flex justify-content-sm-start  justify-content-center">
                                                            <div class="d-m-page-view data-marker data-marker-secondary align-self-center"></div>
                                                            <span class="page-view">Pageviews : 61,655</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="monthly-chart-yearly" role="tabpanel" aria-labelledby="monthly-chart-yearly-tab">
                                            <div class="v-pv-yearly" style="height: 300px; width: 100%; margin-top: 30px;"></div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row mt-3">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-sm-right text-center mb-3 mr-sm-3 px-xl-0">
                                                        <div class="d-flex justify-content-sm-end  justify-content-center">
                                                            <div class="d-m-visitors data-marker data-marker-success align-self-center"></div>
                                                            <span class="visitors">Visitors : 80,823</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-sm-left text-center mb-3 ml-sm-3 px-xl-0">
                                                        <div class="d-flex justify-content-sm-start  justify-content-center">
                                                            <div class="d-m-page-view data-marker data-marker-secondary align-self-center"></div>
                                                            <span class="page-view">Pageviews : 1,21,655</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-content-area page-views p-0 br-4">
                            <ul class="nav nav-pills py-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Daily</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Weekly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Monthly</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 text-center">
                                            <div class="daily">
                                                <p class="d-count mb-0">5,067</p>
                                                <p>Total Page Views</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div id="daily"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 text-center">
                                            <div class="weekly">
                                                <p class="w-count mb-0">25,067</p>
                                                <p>Total Page Views</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div id="weekly"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 text-center">
                                            <div class="month">
                                                <p class="m-count mb-0">276,097</p>
                                                <p>Total Page Views</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div id="month"></div>
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

</body>

</html>