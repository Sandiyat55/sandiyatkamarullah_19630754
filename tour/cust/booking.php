<?php
include '../include/config.php';
session_start();

error_reporting(0);
$id_mobil = $_GET['id_mobil'];
$jumlah = $_GET['jumlah'];
$jumlah_tanggal = $jumlah - 1;
$supir = $_GET['supir'];
$tanggal = $_GET['tanggal'];

$subtotal = 0;
$tanggal2 = date('Y-m-d', strtotime("+$jumlah_tanggal days", strtotime($tanggal)));


$ambil = $conn->query("SELECT * FROM mobil WHERE id_mobil='$id_mobil'");
$pecah = $ambil->fetch_assoc();
$total = $pecah["harga"] * $jumlah;
$sub_total = $subtotal += $total;
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Icha - Travel Tour Booking </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets_u/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="../assets_u/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="../assets_u/css/style.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="../assets_u/css/plugin.css" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="../assets_u/fonts/line-icons.css" type="text/css">
</head>

<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>
<!-- Preloader Ends -->

<!-- header starts -->
<?php include "../template/header_u.php" ?>
<!-- header ends -->

<!-- BreadCrumb Starts -->
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(../assets_u/images/bg/bg1.jpg);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(../assets_u/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Booking</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- top Destination starts -->
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="payment-book">
                    <div class="booking-box">
                        <div class="customer-information mb-4">
                            <h3 class="border-b pb-2 mb-2">Traveller Information</h3>
                            <form method="POST" class="mb-2">
                                <div class="row">
                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                                    <input type="hidden" name="id_mobil" value="<?php echo $id_mobil ?>">
                                    <input type="hidden" name="jumlah" value="<?php echo $jumlah ?>">
                                    <input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">
                                    <input type="hidden" name="supir" value="<?php echo $supir ?>">


                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="<?php echo $_SESSION['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group mb-2">
                                            <label>Username</label>
                                            <input type="text" name="username" value="<?php echo $_SESSION['users']; ?>" placeholder="<?php echo $_SESSION['users']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Nomor HP</label>
                                            <input type="text" name="no_hp" value="<?php echo $_SESSION['no_hp']; ?>" placeholder="<?php echo $_SESSION['no_hp']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Nomor KTP</label>
                                            <input type="text" name="no_ktp" value="<?php echo $_SESSION['no_ktp']; ?>" placeholder="<?php echo $_SESSION['no_ktp']; ?>" readonly>
                                        </div>
                                    </div>

                                </div>

                        </div>
                        <div class="customer-information card-information">
                            <h3 class="border-b pb-2 mb-2">How do you want to pay?</h3>
                            <div class="trending-topic-main">
                                <!-- tab navs -->
                                <ul class="nav nav-tabs nav-pills nav-fill w-50" id="postsTab1" role="tablist">
                                    <li class="nav-item m-0" role="presentation">
                                        <button aria-controls="paypal" aria-selected="true" class="nav-link" data-bs-target="#paypal" data-bs-toggle="tab" id="paypal-tab" role="tab" type="button">Transfer Bank Payment</button>

                                    </li>
                                </ul>
                                <!-- tab contents -->
                                <div class="tab-content" id="postsTabContent1">
                                    <!-- paypal posts -->
                                    <div aria-labelledby="paypal-tab" class="tab-pane fade" id="paypal" role="tabpanel">
                                        <div class="paypal-card">
                                            <h5 class="mb-2 border-b pb-2"><i class="fab fa-paypal"></i> Transfer Bank</h5>
                                            <ul class="">
                                                <li class="d-block">To make the payment process secure and complete you will be redirected to Paypal Website.</li>
                                                <li class="d-block">
                                                    <a href="" class="theme">Checkout via Paypal <i class="fa fa-long-arrow-alt-right"></i></a>
                                                </li>
                                                <li class="d-block">The total Amount you will be charged is: <span class="fw-bold theme">$ 245.50</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-terms border-t pt-3 mt-3">
                                <div class="booking-border d-flex">
                                    <button type="submit" name="booking" class="nir-btn me-2">CONFIRM BOOKING</button>
                                    <a href="car.php" class="nir-btn-black"> CANCEL </a>
                                </div>
                            </div>


                        </div>
                        </form>
                        <?php

                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4 ps-ld-4">
                <div class="sidebar-sticky">

                    <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                        <h4>Your Booking Details</h4>

                        <div class="trend-full border-b pb-2 mb-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="trend-item2 rounded">
                                        <img src="../gambar/<?php echo $pecah["gambar"]; ?>" height="100">
                                        <div class="color-overlay"></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 ps-0">
                                    <div class="trend-content position-relative">
                                        <div class="rating mb-1">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>

                                        </div>
                                        <h5 class="mb-1"><a href="grid-leftfilter.html"><?php echo $pecah["nama_mobil"]; ?></a></h5>
                                        <h6 class="theme mb-0"><i class="icon-location-pin"></i> Kalimantan selatan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trend-check border-b pb-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="trend-check-item bg-grey rounded p-3 mb-2">
                                        <p class="mb-0">Check In</p>
                                        <h6 class="mb-0"><?php echo $tanggal ?></h6>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="trend-check-item bg-grey rounded p-3 mb-2">
                                        <p class="mb-0">Check Out</p>
                                        <h6 class="mb-0"><?php echo $tanggal2 ?></h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trend-check border-b pb-2 mb-2">
                            <p class="mb-0">Supir ?</p>
                            <h6 class="mb-0"><?php echo $supir; ?> </h6>

                        </div>

                    </div>

                    <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                        <h4>Your Price Summary</h4>
                        <table>
                            <tbody>
                                <tr>
                                    <td> Mobil</td>
                                    <td class="theme2">Rp. <?php echo number_format($pecah["harga"]);  ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah hari</td>
                                    <td class="theme2"><?php echo $jumlah; ?></td>
                                </tr>
                                <tr>
                                    <td>driver fee</td>
                                    <td class="theme2">free</td>
                                </tr>
                                <tr>
                                    <td>Booking Fee</td>
                                    <td class="theme2">Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="theme2">Rp. <?php echo number_format($total);  ?></td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-title">
                                <tr>
                                    <th class="font-weight-bold white">Amount</th>
                                    <th class="font-weight-bold white">Rp. <?php echo number_format($sub_total);  ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php
                        if (isset($_POST['booking'])) {
                            $id_transaksi = $_POST['id_transaksi'];
                            $id_user = $_SESSION['id_user'];
                            $id_mobil = $_GET['id_mobil'];
                            $tanggal = $_GET['tanggal'];
                            $jumlah = $_GET['jumlah'];
                            $jumlah_tanggal = $jumlah - 1;
                            $tanggal2 = date('Y-m-d', strtotime("+$jumlah_tanggal days", strtotime($tanggal)));
                            $supir = $_GET['supir'];
                            $tanggal_now = date("Y-m-d");
                            $jenis = "mobil";
                            $status = "menunggu persetujuan";
                            $ambil = $conn->query("SELECT * FROM mobil WHERE id_mobil='$id_mobil'");
                            $pecah = $ambil->fetch_assoc();
                            $harga = $pecah["harga"];
                            $total = $pecah["harga"] * $jumlah;

                            $cek = 0;


                            $sql1 = "INSERT INTO transaksi (id_user, jenis_transaksi, id_mobil, supir, harga, qty, total_harga, status, tanggal, tanggal_booking) VALUES ('$id_user', '$jenis','$id_mobil', '$supir', '$harga', '$jumlah', '$total', '$status', '$tanggal', '$tanggal_now')";
                            $save = mysqli_query($conn, $sql1);

                            $id_transaksi_barusan = $conn->insert_id;

                            if ($save) {
                                for ($cek; $cek < $jumlah; $cek++) {
                                    $tglmulai = strtotime($tanggal);
                                    $jmlhari  = 86400 * $cek;
                                    $id_mobil = $_GET['id_mobil'];
                                    $status = "menunggu verified";
                                    $tgl      = $tglmulai + $jmlhari;
                                    $tglhasil = date("Y-m-d", $tgl);
                                    $sql1    = "INSERT INTO cek (`id_transaksi`, `id_mobil`, `tanggal`, `status`) VALUES ('$id_transaksi_barusan','$id_mobil','$tglhasil','$status')";
                                    $save = mysqli_query($conn, $sql1);
                                }
                            }
                            if ($save) {
                                echo "<script> alert(' Pemesanan Selesai Silahkan print invoice'); location='confirmation.php?id_transaksi=$id_transaksi_barusan ';
                                 </script>";
                            } else {
                                echo "<script> alert('Pemesanan gagal'); location='car.php';
                               </script>";
                            }
                        } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- top Destination ends -->

<!-- Discount action starts -->

<!-- Discount action Ends -->

<!-- partner starts -->

<!-- partner ends -->

<!-- footer starts -->
<?php include "../template/footer_u.php" ?>
<!-- footer ends -->

<!-- Back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>


<!-- *Scripts* -->
<script src="../assets_u/js/jquery-3.5.1.min.js"></script>
<script src="../assets_u/js/bootstrap.min.js"></script>
<script src="../assets_u/js/particles.js"></script>
<script src="../assets_u/js/particlerun.js"></script>
<!-- <script src="../assets_u/js/plugin.js"></script> -->
<script src="../assets_u/js/main.js"></script>
<script src="../assets_u/js/custom-swiper.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>
</body>

</html>