<?php
include '../include/config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}

$sql  = "SELECT * from wisata WHERE id_wisata = '" . $_GET['id_wisata'] . "' ";
$wisata = mysqli_query($conn, $sql);
$p = mysqli_fetch_object($wisata);
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

<!-- banner starts -->
<div class="banner trending overflow-hidden">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(../assets_u/images/shape8.png);"></div>
    <div class="banner-slide">
        <div class="row shop-slider">
            <div class="col-lg-4 p-0">
                <div class="trend-item1 box-shadow bg-white text-center">
                    <div class="trend-image position-relative">
                        <img src="https://cdn2.tstatic.net/tribunnewswiki/foto/bank/images/Pulau-Samber-Gelap-di-Kabupaten-Kotabaru-Provinsi-Kalimantan-Selatan.jpg" height="700" alt="image" class="">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="trend-item1 box-shadow bg-white text-center">
                    <div class="trend-image position-relative">
                        <img src="https://www.eksotikkalimantan.com/wp-content/uploads/2023/02/teluk-tamiang-beach-3.jpg" height="700" alt="image" class="">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="trend-item1 box-shadow bg-white text-center">
                    <div class="trend-image position-relative">
                        <img src="https://wartabanjar.com/wp-content/uploads/2021/12/IMG_20211214_133610.jpg" height="700" alt="image" class="">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="trend-item1 box-shadow bg-white text-center">
                    <div class="trend-image position-relative">
                        <img src="https://i0.wp.com/koranbanjar.net/wp-content/uploads/2022/05/IMG-20220512-WA0018.jpg?w=798&ssl=1" height="700" alt="image" class="">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="trend-item1 box-shadow bg-white text-center">
                    <div class="trend-image position-relative">
                        <img src="https://wisato.id/wp-content/uploads/2020/03/57267793_2451683628176560_8148021696328002793_n.jpg" height="700" alt="image" class="">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-breadcrum position-absolute top-50 mx-auto w-50 start-50 text-center translate-middle">
        <div class="breadcrumb-content text-center">
            <h1 class="mb-0 white">Tour Detail</h1>
            <nav aria-label="breadcrumb" class="d-block">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tour Detail</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- banner ends -->

<!-- top Destination starts -->
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-content">
                    <div id="highlight">
                        <div class="single-full-title border-b mb-2 pb-2">
                            <div class="single-title">
                                <h2 class="mb-1"> <?php echo $p->nama ?> </h2>
                                <div class="rating-main d-md-flex align-items-center">
                                    <p class="mb-0 me-2"><i class="icon-location-pin"></i> Kotabaru, Indonesia</p>
                                    <div class="rating me-2">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="description-images mb-4">
                            <img src="../gambar/<?php echo $p->gambar ?>" alt="" class="w-100 rounded">
                        </div>

                        <div class="description mb-2">
                            <h4>Description</h4>
                            <p><?php echo $p->deskripsi ?>
                                <!-- <p class="mb-0">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p> -->
                        </div>

                        <div class="tour-includes mb-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-clock-o pink mr-1" aria-hidden="true"></i> <?php echo $p->berapa_hari ?> Days</td>
                                        <td><i class="fa fa-group pink mr-1" aria-hidden="true"></i> Max People : <?php echo $p->kuota ?></td>
                                        <td><i class="fa fa-calendar pink mr-1" aria-hidden="true"></i> <?php echo date('d F Y', strtotime($p->tanggal)); ?></td>
                                    </tr>
                                    <tr>

                                        <td><i class="fa fa-map-signs pink mr-1" aria-hidden="true"></i> Pickup : Landasan Ulin</td>
                                        <td><i class="fa fa-file-alt pink mr-1" aria-hidden="true"></i> Language - Indonesia, Banjar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="description mb-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="desc-box bg-grey p-4 rounded">
                                        <h5 class="mb-2">Departure & Return Location</h5>
                                        <p class="mb-0">Landasan Ulin(Google Map)</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="desc-box bg-grey p-4 rounded">
                                        <h5 class="mb-2">Departure Time</h5>
                                        <p class="mb-0">08:00 Wita</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="desc-box bg-grey p-4 rounded">
                                        <h5 class="mb-2">Price Includes</h5>
                                        <ul>
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Air Mineral</li>
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Akomodasi Penginapan</li>
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Supir (Tour Gride)</li>
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Makan </li>
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Transportasi Darat + BBM </li>
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Transportasi Laut (PP) </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="desc-box bg-grey p-4 rounded">
                                        <h5 class="mb-2">Price Not Includes</h5>
                                        <ul>
                                            <li class="d-block pb-1"><i class="fa fa-close pink mr-1"></i> Tip Pemandu</li>

                                            <li class="d-block pb-1"><i class="fa fa-close pink mr-1"></i> Keperluan Pribadi</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="description mb-4">
                            <h4>Syarat & Ketentuan</h4>
                            <p>
                            <ul>
                                <li>- Harga Untuk Anak-Anak Dibawah 3 tahun gratis</li>
                                <p></p>
                                <li>- Transportasi mobil menyesuaikan, mobil yang digunakan full ac </li>
                                <p></p>

                                <li>- Driver merangkap menjadi tour guide</li>
                                <p></p>
                                <li>- Untuk keberangkatan dimulai pada pukul 08:00 dari landasan ulin, harap peserta kumpul 1 jam sebelum keberangkatan</li>
                            </ul>
                            </p>
                        </div>
                    </div>


                    <div id="single-map" class="single-map mb-4">
                        <h4>Map</h4>
                        <div class="map rounded overflow-hidden">
                            <div style="width: 100%">
                                <iframe class=" rounded overflow-hidden" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52739.94078131903!2d116.00509716125588!3d-3.476003222805854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de8b80d5947cf2b%3A0xb38304e5bf4399fe!2sKab.%20Kotabaru%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1686469987828!5m2!1sid!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

            <div class="col-lg-4 ps-lg-4">
                <div class="sidebar-sticky sticky1">
                    <div class="tabs-navbar bg-lgrey mb-4 bordernone rounded overflow-hidden">
                        <div class="row">
                            <div class="col-md-12">
                                <ul id="tabs" class="nav nav-tabs bordernone mb-0">
                                    <li>
                                        <a data-toggle="tab" href="#highlight" class="rounded box-shadow mb-2 border-all">Highlight</a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#single-map" class="rounded box-shadow mb-2 border-all">Map</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4">
                            <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-12">
                                        <h3>Pesan</h3>
                                    </div>
                                    <form method="post" method="POST" id="myform">
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <div class="input-box">
                                                    <label>Paket Wisata</label>
                                                    <input type="text" name="paket_wisata" value="<?php echo $p->nama ?> " placeholder="<?php echo $p->nama ?> " readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($p->kuota == 0) { ?>
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <label>Kuota : <?php echo $p->kuota ?></label>

                                                    </div>

                                                </div>
                                            </div>

                                        <?php  } else { ?>
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <label>qty</label>
                                                        <input type="number" name="jumlah" value="1" min="1" max="<?php echo $p->kuota ?>">
                                                    </div>

                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($p->kuota == 0) { ?>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-0 text-center">
                                                    <button type="disable" href="" class="nir-btn w-100">Kuota terpenuhi</button>
                                                </div>
                                            </div>
                                        <?php } else { ?>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-0 text-center">
                                                    <button type="submit" name="submit" value="cek" class="nir-btn w-100">Pesan
                                                        Sekarang</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </form>
                                    <?php

                                    if (isset($_POST['submit'])) {
                                        $jumlah = $_POST['jumlah'];
                                        echo "<script>window.location.href = 'input_tour.php?id_wisata=$p->id_wisata&jumlah=$jumlah'</script>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top Destination ends -->

<!-- Discount action starts -->
<section class="discount-action pt-0" style="background-image:url(../assets_u/images/section-bg1.png); background-position:center;">
    <div class="container">
        <div class="call-banner rounded pt-8 pb-6">
            <div class="call-banner-inner w-60 mx-auto text-center px-5">
                <div class="trend-content-main">
                    <div class="trend-content mb-5 pb-2 px-5">
                        <h5 class="mb-1 theme">Love Where Your're Going</h5>
                        <h2><a href="detail-fullwidth.html">Explore Your Life, <span class="theme1"> Travel Where You Want!</span></a></h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Discount action Ends -->

<!-- footer starts -->
<?php include "../template/footer_u.php" ?>
<!-- footer ends -->

<!-- Back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>
<!-- Back to top ends -->

<!-- search popup -->
<div id="search1">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>



<!-- *Scripts* -->
<script src="../assets_u/js/jquery-3.5.1.min.js"></script>
<script src="../assets_u/js/bootstrap.min.js"></script>
<script src="../assets_u/js/particles.js"></script>
<script src="../assets_u/js/particlerun.js"></script>
<!-- <script src="../assets_u/js/plugin.js"></script> -->
<script src="../assets_u/js/main.js"></script>
<script src="../assets_u/js/custom-accordian.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>
</body>

</html>