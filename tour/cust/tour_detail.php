<?php
include '../include/config.php';
session_start();
error_reporting(0);
$sql2  = "SELECT * from users WHERE id_user = '" . $_SESSION['id_user'] . "' ";
$user2 = mysqli_query($conn, $sql2);
$p2 = mysqli_fetch_assoc($user2);

$que  = "SELECT * from wisata WHERE id_wisata = '" . $_GET['id_wisata'] . "' ";
$wisata = mysqli_query($conn, $que);
$sql  =   mysqli_query($conn, "SELECT * FROM
gambar where  id_wisata = '" . $_GET['id_wisata'] . "'");


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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style type="text/css">
        * {
            font-family: 'Lato', sans-serif;
        }

        .dp-wrap {
            margin: 0 auto;
            position: relative;
            perspective: 1000px;
            height: 100%;
        }

        .dp-slider {
            height: 100%;
            width: 100%;
            position: absolute;
            transform-style: preserve-3d;
        }

        .dp-slider div {
            transform-style: preserve-3d;
        }

        .dp_item {

            position: absolute;
            text-align: center;
            height: 100%;
            width: 100%;
        }


        #dp-next,
        #dp-prev {
            position: absolute;
            top: 50%;
            right: 10%;
            height: 35px;
            width: 35px;
            z-index: 10;
            cursor: pointer;
        }

        #dp-prev {
            left: 80px;
            transform: rotate(180deg);
        }

        #dp-dots {
            position: absolute;
            bottom: 25px;
            z-index: 12;
            left: 38%;
            cursor: default;
        }

        #dp-dots li {
            display: inline-block;
            width: 13px;
            height: 13px;
            background: #ffff;
            border-radius: 50%;
        }

        #dp-dots li:hover {
            cursor: pointer;
            background: #FA8C8C;
            transition: background .3s;
        }



        .dp_item {
            width: 100%;
            height: 500px;
        }

        .dp-content,
        .dp-img {
            height: 400px;
            width: 100%;
            text-align: center;
        }

        .dp_item {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;

        }

        .dp-content {

            display: inline-block;
            width: 100%;
        }

        .dp-content h2 {
            color: #41414B;
            font-family: Circular Std Bold;
            font-size: 48px;
            max-width: 460px;
            margin-top: 8px;
            margin-bottom: 0px;
        }

        .dp-content p {
            color: #74747F;
            max-width: 490px;
            margin-top: 15px;
            font-size: 24px;
        }

        .dp-content .site-btn {
            margin-top: 15px;
            font-size: 13px;
            padding: 19px 40px;
        }



        .dp-img img {
            object-fit: cover;
            object-position: center;
        }

        #dp-slider,
        .dp-img img {
            height: 500px;
        }

        #dp-slider .dp_item:hover:not(:first-child) {
            cursor: pointer;
        }

        .site-btn {
            color: #fff;
            font-size: 18px;
            font-family: "Circular Std Medium";
            background: #FA8282;
            padding: 14px 43px;
            display: inline-block;
            border-radius: 2px;
            position: relative;
            top: -12px;
            text-decoration: none;
        }

        .site-btn:hover {
            text-decoration: none;
            color: #fff;
        }

        h1 {
            margin: 150px auto 30px auto;
            text-align: center;
        }
    </style>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
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


                        <div class="description-images mb-4 overflow-hidden">
                            <div class="thumbnail-images position-relative">
                                <div class="slider-store rounded overflow-hidden">
                                    <div>
                                        <img src="../gambar/<?php echo $p->gambar ?>" alt="" class="w-100 rounded">
                                    </div>
                                </div>

                            </div>
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

                    <div class="description-images mb-4 overflow-hidden">
                        <div class="thumbnail-images position-relative">


                            <h4>Gambar Deksripsi</h4>
                            <div id="slider">
                                <div class="dp-wrap">
                                    <div id="dp-slider">
                                        <?php
                                        if (mysqli_num_rows($sql) > 0) {
                                            while ($fetch = mysqli_fetch_assoc($sql)) {
                                        ?>
                                                <div class="dp_item" data-position="1">

                                                    <div class="dp-img">
                                                        <img src="../gambar/<?php echo $fetch['gambar'] ?>" class="w-100 rounded">
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                    <span id="dp-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.401 51.401">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: none;
                                                        stroke: #fa8c8c;
                                                        stroke-miterlimit: 10;
                                                        stroke-width: 7px;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Rectangle_4_Copy" data-name="Rectangle 4 Copy" class="cls-1" d="M32.246,0V33.178L0,31.953" transform="translate(0.094 25.276) rotate(-45)" />
                                        </svg>
                                    </span>

                                    <span id="dp-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.401 51.401">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: none;
                                                        stroke: #fa8c8c;
                                                        stroke-miterlimit: 10;
                                                        stroke-width: 7px;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Rectangle_4_Copy" data-name="Rectangle 4 Copy" class="cls-1" d="M32.246,0V33.178L0,31.953" transform="translate(0.094 25.276) rotate(-45)" />
                                        </svg>
                                    </span>
                                </div>

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
                                        <?php } else if ($_SESSION['id_user'] == "") { ?>
                                            <div class="nir-btn w-100">Login terlebih dahulu <a href="../auth/user_account_setting.php?id_user=<?= $_SESSION['id_user'] ?>">(Klik Sini)</a></div>

                                        <?php } else if ($p2['no_ktp'] == "") { ?>
                                            <div class="nir-btn w-100">Harap melengkapi data profil terlebih dahulu <a href="../auth/user_account_setting.php?id_user=<?= $_SESSION['id_user'] ?>">(Klik Sini)</a></div>

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

<script src="../assets_u/plugins.js"></script>
<script src="../assets_u/js/main.js"></script>
<script src="../assets_u/js/custom-accordian.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        function detect_active() {
            // get active
            var get_active = $("#dp-slider .dp_item:first-child").data("class");
            $("#dp-dots li").removeClass("active");
            $("#dp-dots li[data-class=" + get_active + "]").addClass("active");
        }
        $("#dp-next").click(function() {
            var total = $(".dp_item").length;
            $("#dp-slider .dp_item:first-child").hide().appendTo("#dp-slider").fadeIn();
            $.each($('.dp_item'), function(index, dp_item) {
                $(dp_item).attr('data-position', index + 1);
            });
            detect_active();

        });

        $("#dp-prev").click(function() {
            var total = $(".dp_item").length;
            $("#dp-slider .dp_item:last-child").hide().prependTo("#dp-slider").fadeIn();
            $.each($('.dp_item'), function(index, dp_item) {
                $(dp_item).attr('data-position', index + 1);
            });

            detect_active();
        });

        $("#dp-dots li").click(function() {
            $("#dp-dots li").removeClass("active");
            $(this).addClass("active");
            var get_slide = $(this).attr('data-class');
            console.log(get_slide);
            $("#dp-slider .dp_item[data-class=" + get_slide + "]").hide().prependTo("#dp-slider").fadeIn();
            $.each($('.dp_item'), function(index, dp_item) {
                $(dp_item).attr('data-position', index + 1);
            });
        });


        $("body").on("click", "#dp-slider .dp_item:not(:first-child)", function() {
            var get_slide = $(this).attr('data-class');
            console.log(get_slide);
            $("#dp-slider .dp_item[data-class=" + get_slide + "]").hide().prependTo("#dp-slider").fadeIn();
            $.each($('.dp_item'), function(index, dp_item) {
                $(dp_item).attr('data-position', index + 1);
            });

            detect_active();
        });
    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
</body>

</html>