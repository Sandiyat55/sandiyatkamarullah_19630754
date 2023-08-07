<?php
include '../include/config.php';
session_start();
error_reporting(0);

$sql2  = "SELECT * from users WHERE id_user = '" . $_SESSION['id_user'] . "' ";
$user2 = mysqli_query($conn, $sql2);
$p2 = mysqli_fetch_assoc($user2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Icha - Travel Tour Booking</title>
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
                <h1 class="mb-3">Tour Packages</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tour</li>
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
            <div class="col-lg-8">
                <?php if (!isset($_GET['cari']) == "") { ?>

                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM wisata where nama like '%" . $_GET['cari'] . "%' and status='aktif' ORDER BY id_wisata DESC";
                        $wisata = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($wisata) > 0) {
                            while ($p = mysqli_fetch_array($wisata)) {
                        ?>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="trend-item rounded box-shadow">
                                        <div class="trend-image position-relative">
                                            <a href="tour_detail.php?id_wisata=<?php echo $p['id_wisata'] ?>">
                                                <img src="../gambar/<?php echo $p['gambar'] ?>" height="250" width="150" class="primary-image">
                                            </a>
                                            <div class="color-overlay"></div>
                                        </div>
                                        <div class="trend-content p-4 pt-5 position-relative">
                                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                                <div class="entry-author">
                                                    <i class="icon-calendar"></i>
                                                    <span class="fw-bold"> <?php echo substr($p['berapa_hari'], 0, 30) ?> Days Tours</span>
                                                </div>
                                            </div>
                                            <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Indonesia</h5>
                                            <a href="tour_detail.php?id_wisata=<?php echo $p['id_wisata'] ?>">
                                                <h2 class="mb-1 nir-btn w-100 text-white"><?php echo substr($p['nama'], 0, 30) ?> </h2>
                                            </a>
                                            <div class="rating-main d-flex align-items-center pb-2">
                                                <div class="rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </div>
                                                <span class="ms-2"></span>
                                            </div>
                                            <p class=" border-b pb-2 mb-2"><?php echo substr($p['deskripsi'], 0, 30) ?></p>
                                            <div class="entry-meta">
                                                <div class="entry-author d-flex align-items-center">
                                                    <p class="mb-0"><span class="theme fw-bold fs-5">Rp. <?php echo number_format($p['harga']) ?></span> | <?php echo substr($p['kuota'], 0, 30) ?> orang </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <center>
                                <h3>Paket Wisata Tidak tersedia</h3>
                            </center>
                        <?php
                        }  ?>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM wisata where status='aktif' ORDER BY id_wisata DESC";
                        $wisata = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($wisata) > 0) {
                            while ($p = mysqli_fetch_array($wisata)) {
                        ?>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="trend-item rounded box-shadow">
                                        <div class="trend-image position-relative">
                                            <a href="tour_detail.php?id_wisata=<?php echo $p['id_wisata'] ?>">
                                                <img src="../gambar/<?php echo $p['gambar'] ?>" height="250" width="150" class="primary-image">
                                            </a>
                                            <div class="color-overlay"></div>
                                        </div>
                                        <div class="trend-content p-4 pt-5 position-relative">
                                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                                <div class="entry-author">
                                                    <i class="icon-calendar"></i>
                                                    <span class="fw-bold"> <?php echo substr($p['berapa_hari'], 0, 30) ?> Days Tours</span>
                                                </div>
                                            </div>
                                            <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Indonesia</h5>
                                            <a href="tour_detail.php?id_wisata=<?php echo $p['id_wisata'] ?>">
                                                <h2 class="mb-1 nir-btn w-100 text-white"><?php echo substr($p['nama'], 0, 40) ?> </h2>
                                            </a>

                                            <div class="rating-main d-flex align-items-center pb-2">
                                                <div class="rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </div>
                                                <span class="ms-2"></span>
                                            </div>
                                            <p class=" border-b pb-2 mb-2"><?php echo substr($p['deskripsi'], 0, 30) ?></p>
                                            <div class="entry-meta">
                                                <div class="entry-author d-flex align-items-center">
                                                    <p class="mb-0"><span class="theme fw-bold fs-5">Rp. <?php echo number_format($p['harga']) ?></span> | <?php echo substr($p['kuota'], 0, 30) ?> orang</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <center>
                                <h3>Paket Wisata Tidak tersedia</h3>
                            </center>
                        <?php
                        }  ?>
                    </div>
                <?php
                } ?>
            </div>
            <div class="col-lg-4 ps-lg-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4">
                            <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-12">
                                        <h3>Search Tours</h3>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <form method="get" action="" class="ms-auto position-relative">
                                                <div class="input-box">
                                                    <label>Enter Keyword</label>
                                                    <input type="text" class="form-control ps-3" name="cari" placeholder="Nama Paket Wisata">
                                                    <br>
                                                    <a href="tour.php" class="nir-btn w-100"><i class="fa fa-close mr-2"></i> Reset Pencarian</a>


                                                </div>
                                            </form>
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
</section>


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

<script src="../assets_u/js/main.js"></script>
<script src="../assets_u/js/custom-swiper.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>
</body>

</html>