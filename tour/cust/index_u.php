<?php
include '../include/config.php';
session_start();

error_reporting(0);


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

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
    <?php include "../template/header_u.php"; ?>
    <!-- header ends -->
    <div class="tet"></div>

    <!-- banner starts -->
    <section class="banner pt-10 pb-0 overflow-hidden" style="background-image:url(../assets_u/images/testimonial.png);">
        <div class="container">
            <div class="banner-in">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <div class="banner-content text-lg-start text-center">
                            <h4 class="theme mb-0">Explore The World</h4>
                            <h1>Start Planning Your Dream Trip Today!</h1>
                            <p class="mb-4">Kami menyediakan berbagai paket tour sesuai dengan keinginan Anda</p>

                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="banner-image">
                            <img src="../assets_u/images/travel.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="category-main-inner border-t pt-1">
                    <div class="row side-slider">
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <div class="trending-topic-content">
                                    <img src="../assets_u/images/icons/004-camping-tent.png" class="mb-1 d-inline-block" alt="">
                                    <h4 class="mb-0"><a href="tour-grid.html">Camping</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <div class="trending-topic-content text-center">
                                    <img src="../assets_u/images/icons/003-hiking.png" class="mb-1 d-inline-block" alt="">
                                    <h4 class="mb-0"><a href="tour-grid.html">Hiking</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <div class="trending-topic-content">
                                    <img src="../assets_u/images/icons/005-sunbed.png" class="mb-1 d-inline-block" alt="">
                                    <h4 class="mb-0"><a href="tour-grid.html">Beach Tours</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <div class="trending-topic-content">
                                    <img src="../assets_u/images/icons/006-surf.png" class="mb-1 d-inline-block" alt="">
                                    <h4 class="mb-0"><a href="tour-grid.html">Surfing</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <div class="trending-topic-content">
                                    <img src="../assets_u/images/icons/002-safari.png" class="mb-1 d-inline-block" alt="">
                                    <h4 class="mb-0"><a href="tour-grid.html">Safari</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <div class="trending-topic-content">
                                    <img src="../assets_u/images/icons/008-cycling.png" class="mb-1 d-inline-block" alt="">
                                    <h4 class="mb-0"><a href="tour-grid.html">Cycling</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 my-4">
                            <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                                <img src="../assets_u/images/icons/007-hiking-1.png" class="mb-1 d-inline-block" alt="">
                                <div class="trending-topic-content">
                                    <h4 class="mb-0"><a href="tour-grid.html">Trekings</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about-us starts -->
    <section class="about-us pb-6 pt-6" style="background-image:url(../assets_u/images/shape4.png); background-position:center;">
        <div class="container">

            <div class="section-title mb-6 w-50 mx-auto text-center">
                <h4 class="mb-1 theme1">3 Step of The Perfect Tour</h4>
                <h2 class="mb-1">Find <span class="theme">Travel Perfection</span></h2>

            </div>

            <!-- why us starts -->
            <div class="why-us">
                <div class="why-us-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon">
                                        <i class="icon-flag theme"></i>
                                    </div>
                                    <h4><a href="about.html">Tell Us What You want To Do</a></h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon">
                                        <i class="icon-location-pin theme"></i>
                                    </div>
                                    <h4><a href="about.html">Share Your Travel Locations</a></h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon">
                                        <i class="icon-directions theme"></i>
                                    </div>
                                    <h4><a href="about.html">Share Your Travel Preference</a></h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon">
                                        <i class="icon-compass theme"></i>
                                    </div>
                                    <h4><a href="about.html">We are 100% Trusted Tour Agency</a></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->

    <!-- top Destination starts -->
    <section class="trending pb-5 pt-0">
        <div class="container">
            <div class="section-title mb-6 w-50 mx-auto text-center">
                <h4 class="mb-1 theme1">Top Destinations</h4>
                <h2 class="mb-1">Explore <span class="theme">Top Destinations</span></h2>
                <p>Nikmati keindahan alam kotabaru.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4">
                    <div class="trend-item1">
                        <div class="trend-image position-relative rounded">
                            <img src="https://cdn2.tstatic.net/tribunnewswiki/foto/bank/images/Pulau-Samber-Gelap-di-Kabupaten-Kotabaru-Provinsi-Kalimantan-Selatan.jpg" alt="image">
                            <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                <div class="trend-content-title">
                                    <h5 class="mb-0"><a href="tour-grid.html" class="theme1">Kalimantan Selatan</a></h5>
                                    <h3 class="mb-0 white">Samber Gelap</h3>
                                </div>

                            </div>
                            <div class="color-overlay"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                            <div class="trend-item1">
                                <div class="trend-image position-relative rounded">
                                    <img src="https://www.eksotikkalimantan.com/wp-content/uploads/2023/02/teluk-tamiang-beach-3.jpg" height="250" alt="image">
                                    <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                        <div class="trend-content-title">
                                            <h5 class="mb-0"><a href="tour-grid.html" class="theme1">Kalimantan Selatan</a>
                                            </h5>
                                            <h3 class="mb-0 white">Teluk Tamiang</h3>
                                        </div>

                                    </div>
                                    <div class="color-overlay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                            <div class="trend-item1">
                                <div class="trend-image position-relative rounded">
                                    <img src="https://wartabanjar.com/wp-content/uploads/2021/12/IMG_20211214_133610.jpg" height="250" alt="image">
                                    <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                        <div class="trend-content-title">
                                            <h5 class="mb-0"><a href="tour-grid.html" class="theme1">Kalimantan Selatan</a>
                                            </h5>
                                            <h3 class="mb-0 white">Sarang Tiung</h3>
                                        </div>

                                    </div>
                                    <div class="color-overlay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                            <div class="trend-item1">
                                <div class="trend-image position-relative rounded">
                                    <img src="https://i0.wp.com/koranbanjar.net/wp-content/uploads/2022/05/IMG-20220512-WA0018.jpg?w=798&ssl=1" height="250" alt="image">
                                    <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100">
                                        <div class="trend-content-title">
                                            <h5 class="mb-0"><a href="tour-grid.html" class="theme1">Kalimantan Selatan</a>
                                            </h5>
                                            <h3 class="mb-0 white">Siring Kotabaru</h3>
                                        </div>

                                    </div>
                                    <div class="color-overlay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                            <div class="trend-item1">
                                <div class="trend-image position-relative rounded">
                                    <img src="https://wisato.id/wp-content/uploads/2020/03/57267793_2451683628176560_8148021696328002793_n.jpg" height="250" alt="image">
                                    <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                        <div class="trend-content-title">
                                            <h5 class="mb-0"><a href="tour-grid.html" class="theme1">Kalimantan Selatan</a>
                                            </h5>
                                            <h3 class="mb-0 white">Tanjung Kunyit</h3>
                                        </div>

                                    </div>
                                    <div class="color-overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- top Destination ends -->




    <!-- Discount action Ends -->

    <!-- offer Packages Starts -->

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
    <script src="../assets_u/js/plugin.js"></script>
    <script src="../assets_u/js/main.js"></script>
    <script src="../assets_u/js/custom-swiper.js"></script>
    <script src="../assets_u/js/custom-nav.js"></script>
</body>

</html>