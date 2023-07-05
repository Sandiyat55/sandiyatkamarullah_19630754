<?php
session_start();
include '../include/config.php';

if (!isset($_SESSION['users'])) {
    header("Location: auth/user_login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Tabel Transaksi Wisata | Travel Icha </title>
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
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="ps-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN MODERN  -->
        <?php include "../template/sidebar.php" ?>
        <!--  END MODERN  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Tabel Transaksi Wisata</h3>
                    </div>
                </div>

                <div class="row" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4> <a href="cetak_transaksi.php" target="_blank" class="btn btn-primary btn-rounded toggle-vis mb-8 ml-2">Cetak Data</a></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>wisata</th>
                                                <th>Nama</th>
                                                <th>Tanggal Pemberangkatan</th>
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
                                                $query = mysqli_query($conn, "SELECT transaksi.*, wisata.id_wisata,wisata.tanggal, wisata.nama, users.id_user, users.username FROM transaksi INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata INNER Join users ON transaksi.id_user = users.id_user where jenis_transaksi = 'wisata' ORDER BY id_transaksi DESC;");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['tanggal']; ?></td>

                                                    <?php if ($row['gambar'] == "") {
                                                    ?>
                                                        <td class="align-center">
                                                            Belum Ada Pembayaran
                                                        </td>
                                                    <?php } else {
                                                    ?>
                                                        <td class="align-center"><?php echo "<img src='../gambar/$row[gambar]' width='70' height='90' />"; ?></td>

                                                    <?php
                                                    } ?>
                                                    <td><?php echo $row['total_harga']; ?></td>
                                                    <?php if ($row['status'] == "menunggu persetujuan") {
                                                    ?>
                                                        <td class="align-center"><span class="shadow-none badge badge-warning"><?php echo $row['status']; ?></span></td>
                                                    <?php } elseif ($row['status'] == "disetujui") {
                                                    ?>
                                                        <td class="align-center"><span class="shadow-none badge badge-primary"><?php echo $row['status']; ?></span></td>
                                                    <?php
                                                    } elseif ($row['status'] == "selesai") { ?>
                                                        <td class="align-center"><span class="shadow-none badge badge-success"><?php echo $row['status']; ?></span></td>
                                                    <?php  } else { ?>
                                                        <td class="align-center"><span class="shadow-none badge badge-danger"><?php echo $row['status']; ?></span></td>
                                                    <?php } ?>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="cetak_detail_transaksi.php?id_transaksi=<?php echo $row["id_transaksi"]; ?>" class="bs-tooltip" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="flaticon-print p-1 br-6 mb-1"></i></a></li>
                                                        </ul>
                                                    </td>

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

    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>