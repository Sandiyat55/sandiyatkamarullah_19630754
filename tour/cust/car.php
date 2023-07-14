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

    <title>Travel Icha - Car Booking</title>
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
                <h1 class="mb-3">Car List</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car List</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- top Destination starts -->
<section class="trending pt-6 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if (isset($_GET['cari']) == "") { ?>
                    <div class="row filter_data">
                    </div>
                <?php } else {
                    $sql = "SELECT * FROM mobil where nama_mobil like '%" . $_GET['cari'] . "%' AND status='ready' ORDER BY id_mobil DESC";
                    $mobil = mysqli_query($conn, $sql);
                ?>
                    <div class="car-list">
                        <div class="car-full">
                            <div class="trend-full bg-white rounded box-shadow overflow-hidden p-4 mb-4">
                                <div class="row">

                                    <?php

                                    if (mysqli_num_rows($mobil) > 0) {
                                        while ($p = mysqli_fetch_array($mobil)) {

                                    ?>
                                            <div class="col-lg-4 col-md-3">
                                                <div class="trend-item2 rounded">
                                                    <a href="car_detail.php?id_mobil=<?php echo $p['id_mobil'] ?>">
                                                        <img src="../gambar/<?php echo $p['gambar'] ?>" height="250" width="250" class="primary-image">
                                                    </a>
                                                    <div class="color-overlay"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6">
                                                <div class="trend-content position-relative text-md-start text-center">
                                                    <small><?php echo substr($p['merek'], 0, 30) ?></small>
                                                    <h3 class="mb-2"><a href="car-detail.html" class=""><?php echo substr($p['nama_mobil'], 0, 30) ?> - <?php echo substr($p['nomor_kendaraan'], 0, 30) ?></a></h3>
                                                    <ul class="featured-meta d-flex align-items-center justify-content-between">
                                                        <li><i class="fa fa-user"></i> <?php echo substr($p['seat'], 0, 30) ?></li>
                                                        <li><i class="fa fa-briefcase"></i> 2</li>
                                                        <li><i class="fa fa-indent"></i> <?php echo substr($p['transmision'], 0, 30) ?></li>
                                                        <li><i class="fa fa-tachometer-alt"></i> <?php echo substr($p['bensin'], 0, 30) ?></li>
                                                    </ul>
                                                    <p class="mt-4 mb-0">Taking Safety Measures <br><span class="theme"> Free Mineral Water In Car</span></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="trend-content text-md-end text-center">
                                                    <div class="rating">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                    </div>

                                                    <div class="trend-price my-2">
                                                        <h3 class="mb-0">Rp. <?php echo number_format($p['harga']) ?></h3>
                                                        <small>Total</small>
                                                    </div>
                                                    <a href="car_detail.php?id_mobil=<?php echo $p['id_mobil'] ?>" class="nir-btn">View </a>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <center>
                                            <h3>Mobil Tidak tersedia</h3>
                                        </center>
                                    <?php

                                    }  ?>

                                </div>
                            </div>

                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="col-lg-4 ps-lg-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4">
                            <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-12">
                                        <h3>Search Cars</h3>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <form method="get" action="" class="ms-auto position-relative">
                                                <div class="input-box">
                                                    <label>Enter Keyword</label>
                                                    <input type="text" class="form-control ps-3" name="cari" placeholder="Nama Mobil">
                                                    <br>
                                                    <a href="car.php" class="nir-btn w-100"><i class="fa fa-close mr-2"></i> Reset Pencarian</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item mb-4">
                            <h3 class="">Price Range</h3>
                            <div class="range-slider mt-0">
                                <div class="price_filter">
                                    <input type="hidden" id="hidden_minimum_price" value="0" />
                                    <input type="hidden" id="hidden_maximum_price" value="800000" />
                                    <div id="price_range"></div>
                                </div>

                                <P></P>
                                <p id="price_show">70000 - 1000000</p>


                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top Destination ends -->

<!-- featured counter Starts -->

<!-- featured counter ends -->

<!-- partner starts -->
<div class="category-main-inner pt-5">
    <div class="container">
        <div class="row side-slider">
            <div class="col-lg-3 col-md-6 my-4">
                <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                    <div class="trending-topic-content">
                        <img src="../assets_u/images/cars/dai.png" height="100" width="80" class="mb-1 d-inline-block" alt="">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-4">
                <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                    <div class="trending-topic-content text-center">
                        <img src="../assets_u/images/cars/honda.png" height="100" width="80" class="mb-1 d-inline-block" alt="">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-4">
                <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                    <div class="trending-topic-content">
                        <img src="../assets_u/images/cars/mitsubi.png" height="100" width="80" class="mb-1 d-inline-block" alt="">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-4">
                <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                    <div class="trending-topic-content">
                        <img src="../assets_u/images/cars/toyo.png" height="100" width="80" class="mb-1 d-inline-block" alt="">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-4">
                <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                    <div class="trending-topic-content">
                        <img src="../assets_u/images/cars/cars.png" height="100" width="80" class="mb-1 d-inline-block" alt="">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-4">
                <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                    <div class="trending-topic-content">
                        <img src="../assets_u/images/cars/hyun.png" height="100" width="80" class="mb-1 d-inline-block" alt="">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- partner ends -->

<!-- footer starts -->
<?php include "../template/footer_u.php" ?>
<!-- footer ends -->

<!-- Back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>
<!-- Back to top ends -->



<!-- *Scripts* -->
<script src="../assets_u/js/jquery-3.5.1.min.js"></script>
<script src="../assets_u/js/bootstrap.min.js"></script>
<script src="../assets_u/js/particles.js"></script>
<script src="../assets_u/js/particlerun.js"></script>
<script src="../assets_u/plugins.js"></script>
<script src="../assets_u/js/main.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>
<script>
    $(document).ready(function() {
        filter_data();

        function filter_data() {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            $.ajax({
                url: "filter_mobil.php",
                method: "POST",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price
                },
                success: function(data) {
                    $('.filter_data').html(data);
                }
            });
        }
        $('#price_range').slider({
            range: true,
            min: 70000,
            max: 1000000,
            values: [70000, 1000000],
            step: 20000,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });
    });
</script>
</body>

</html>