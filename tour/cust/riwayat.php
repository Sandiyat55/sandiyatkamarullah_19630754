<?php
session_start();
include '../include/config.php';

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}
// error_reporting(0);
$id_user = $_GET['id_user'];
$sqltour1 = mysqli_query($conn, "SELECT transaksi.*, users.username, users.id_user ,users.email, wisata.id_wisata, wisata.nama ,wisata.harga FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata where users.id_user='$id_user' AND transaksi.jenis_transaksi = 'wisata' ORDER BY id_transaksi DESC");
$row = mysqli_fetch_assoc($sqltour1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Riwayat Transaksi | Travel Icha </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
</head>

<body>
    <div id="eq-loader">
        <div class="eq-loader-div">
            <div class="eq-loading dual-loader mx-auto mb-5"></div>
        </div>
    </div>

    <!--  BEGIN NAVBAR  -->
    <?php include "../template/header.php" ?>

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-content">

        <div class="overlay"></div>
        <div class="ps-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN MODERN  -->

        <!--  END MODERN  -->

        <!--  BEGIN CONTENT PART  -->
        <div class="main-container">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>transaksi</h3>
                    </div>
                </div>

                <div class="row" id="cancel-row">

                    <div class="col-xl-48 col-lg-48 col-sm-48  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                                <div class="c-b-s-header">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <h4><strong>Transaksi <?php echo $_SESSION['users'] ?></strong></h4> <br><br>
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
                                            <table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>wisata</th>
                                                        <th>Tanggal</th>
                                                        <th>Bukti Pembayaran</th>
                                                        <th>Total Harga</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $sqltour = mysqli_query($conn, "SELECT transaksi.*, users.username, users.id_user ,users.email, wisata.id_wisata, wisata.nama ,wisata.harga FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata where users.id_user='$id_user' AND transaksi.jenis_transaksi = 'wisata' ORDER BY id_transaksi DESC");

                                                        while ($rowtour = mysqli_fetch_assoc($sqltour)) {
                                                        ?>
                                                            <td><?php echo $rowtour['id_transaksi']; ?></td>
                                                            <td><?php echo $rowtour['nama']; ?></td>
                                                            <td><?php echo $rowtour['tanggal']; ?></td>
                                                            <?php if ($rowtour['gambar'] == "") {
                                                            ?>
                                                                <td class="align-center">
                                                                    Belum Ada Pembayaran
                                                                </td>
                                                            <?php } else {
                                                            ?>
                                                                <td class="align-center"><a href="../gambar/<?php echo $rowtour['gambar']; ?>">Klik Sini</a></td>

                                                            <?php
                                                            } ?>
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
                                                            <td class="text-center">
                                                                <ul class="table-controls">
                                                                    <li><a href="cetak_struk_transaksi.php?id_transaksi=<?php echo  $rowtour["id_transaksi"]; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="flaticon-print  p-1 br-6 mb-1"></i></a></li>
                                                                    <li><a href="confirmation_tour.php?id_transaksi=<?php echo  $rowtour["id_transaksi"]; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="flaticon-view 2  p-1 br-6 mb-1"></i></a></li>

                                                                </ul>
                                                            </td>

                                                    </tr>
                                                <?php } ?>

                                                </tbody>
                                            </table>

                                        </div>
                                        <center>
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4> <a href="cetak_riwayat.php?id_user=<?php echo $_SESSION["id_user"]; ?>" target="_blank" class="btn btn-primary btn-rounded toggle-vis mb-8 ml-2">Cetak Data</a></h4>
                                                        <a href="../cust/index_u.php" class="btn btn-warning btn-rounded toggle-vis mb-8 ml-2">Kembali</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="tab-pane" id="c-b-s-yearly" role="tabpanel" aria-labelledby="c-b-s-yearly-tab">
                                        <div class="table-responsive customer-bal-summary-scroll-monthly">
                                            <table id="html5-extension1" class="table table-striped table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Mobil</th>
                                                        <th>Tanggal</th>
                                                        <th>Bukti Pembayaran</th>
                                                        <th>Total Harga</th>
                                                        <th>Status</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $no = 1;
                                                        $sqlmobil = mysqli_query($conn, "SELECT transaksi.*, users.username, users.id_user ,users.email, mobil.id_mobil, mobil.nama_mobil,mobil.nomor_kendaraan,mobil.harga FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil where users.id_user='$id_user' AND transaksi.jenis_transaksi = 'mobil' ORDER BY id_transaksi DESC");

                                                        while ($rowmobil = mysqli_fetch_assoc($sqlmobil)) {
                                                        ?>
                                                            <td><?php echo $rowmobil['id_transaksi'] ?></td>
                                                            <td><?php echo $rowmobil['nama_mobil']; ?></td>
                                                            <td><?php echo $rowmobil['tanggal']; ?></td>
                                                            <?php if ($rowmobil['gambar'] == "") {
                                                            ?>
                                                                <td class="align-center">
                                                                    Belum Ada Pembayaran
                                                                </td>
                                                            <?php } else {
                                                            ?>
                                                                <td class="align-center"><a href="../gambar/<?php echo $rowmobil['gambar']; ?>">Klik Sini</a></td>

                                                            <?php
                                                            } ?> <td><?php echo $rowmobil['total_harga']; ?></td>
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
                                                            <td class="text-center">
                                                                <ul class="table-controls">
                                                                    <li><a href="cetak_struk_sewa.php?id_transaksi=<?php echo  $rowmobil["id_transaksi"]; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="flaticon-print  p-1 br-6 mb-1"></i></a></li>
                                                                </ul>
                                                            </td>

                                                    </tr>
                                                <?php } ?>

                                                </tbody>
                                            </table>

                                        </div>
                                        <center>
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4> <a href="cetak_riwayat_mobil.php?id_user=<?php echo $_SESSION['id_user'] ?>" target="_blank" class="btn btn-primary btn-rounded toggle-vis mb-8 ml-2">Cetak Data</a></h4>
                                                        <a href="../cust/index_u.php" class="btn btn-warning btn-rounded toggle-vis mb-8 ml-2">Kembali</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </center>
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
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <?php include "../template/footer.php" ?>
    <!--  END FOOTER  -->

    <!--  BEGIN PROFILE SIDEBAR  -->

    <!--  BEGIN PROFILE SIDEBAR  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/loader.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="../plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="../plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="../plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="../plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    }
                ]
            },
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>
    <script>
        $('#html5-extension1').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    }
                ]
            },
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>

    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>