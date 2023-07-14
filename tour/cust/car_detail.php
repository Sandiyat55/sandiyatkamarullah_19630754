<?php
include '../include/config.php';
session_start();

error_reporting(0);
$id_mobil = $_GET['id_mobil'];
$tglnow   = date('Y-m-d');
$tglmulai = strtotime($tglnow);
$jmlhari  = 86400 * 1;
$tglplus      = $tglmulai + $jmlhari;
$now = date("Y-m-d", $tglplus);
$sql  = "SELECT * from mobil WHERE id_mobil = '" . $_GET['id_mobil'] . "' ";
$mobil = mysqli_query($conn, $sql);
$p = mysqli_fetch_object($mobil);

$sql2  = "SELECT * from users WHERE id_user = '" . $_SESSION['id_user'] . "' ";
$user2 = mysqli_query($conn, $sql2);
$p2 = mysqli_fetch_assoc($user2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Icha - Car Booking </title>
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

<?php include "../template/header_u.php" ?>

<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(../assets_u/images/bg/bg1.jpg);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(../assets_u/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Car Detail</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car Detail</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>

<section class="trending pt-6 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-full-title border-b mb-2 pb-2">
                    <div class="single-title">
                        <h2 class="mb-0"> <?php echo $p->nama_mobil ?> </h2>
                        <div class="rating-main d-lg-flex align-items-center text-lg-start text-center justify-content-between">
                            <small class="mb-0 me-2"> <?php echo $p->merek ?> - <?php echo $p->seat ?> orang </small>
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
            </div>
            <div class="col-lg-8">
                <div class="single-content">
                    <div class="description-images mb-4 overflow-hidden">
                        <div class="thumbnail-images position-relative">
                            <div class="slider-store rounded overflow-hidden">
                                <div class="description-images mb-4">
                                    <img src="../gambar/<?php echo $p->gambar ?>" alt="" class="w-100 rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="book-form w-80 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-lg-12">
                                <h3>Booking Cars</h3>
                            </div>
                            <form action="#" method="POST" name="sewa" id="myform" onSubmit="return valid();">
                                <div class=" col-lg-12 mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" placeholder="Enter Your Keyword">
                                            <input type="hidden" name="now" value="<?php echo $now; ?>" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Berapa Lama</label>
                                            <input type="number" name="jumlah" value="1" min="1" max="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Supir</label>
                                            <select class="niceSelect" name="supir">
                                                <option value="tidak">Tidak</option>
                                                <option value="iya">Iya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($_SESSION['id_user'] == "") { ?>
                                    <div class="nir-btn w-100">Login terlebih dahulu <a href="../auth/user_account_setting.php?id_user=<?= $_SESSION['id_user'] ?>">(Klik Sini)</a></div>

                                <?php } else if ($p2['no_ktp'] == "") { ?>
                                    <div class="nir-btn w-100">Harap melengkapi data profil terlebih dahulu <a href="../auth/user_account_setting.php?id_user=<?= $_SESSION['id_user'] ?>">(Klik Sini)</a></div>

                                <?php } else { ?>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-0 text-center">
                                            <button type="submit" name="submit" value="cek" class="nir-btn w-100"> booking now </button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>

                    <?php

                    if (isset($_POST['submit'])) {
                        $jumlah = $_POST['jumlah'];
                        $supir = $_POST['supir'];
                        $tanggal = $_POST['tanggal'];
                        $jumlah_tanggal = $jumlah - 1;
                        $tanggal2 = date('Y-m-d', strtotime("+$jumlah_tanggal days", strtotime($tanggal)));
                        $sql     = "SELECT id_transaksi FROM cek WHERE tanggal between '$tanggal' AND '$tanggal2' AND id_mobil='$id_mobil' AND status!='batal'";
                        $query     = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            echo " <script> alert ('Mobil tidak tersedia di tanggal yang anda pilih, silahkan pilih tanggal lain!'); 
                                </script> ";
                        } else {
                            echo "<script>window.location.href = 'input_booking.php?id_mobil=$p->id_mobil&jumlah=$jumlah&supir=$supir&tanggal=$tanggal'</script>";
                        }
                    } ?>
                    <script type="text/javascript">
                        function valid() {

                            if (document.sewa.tanggal.value < document.sewa.now.value) {
                                alert("Tanggal sewa minimal H-1!");
                                return false;
                            }

                            return true;
                        }
                    </script>

                    <br>
                    <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                        <div class="row d-flex align-items-center justify-content-between">
                            <center>
                                <div class="col-lg-12">
                                    <h3>Syarat & Ketentuan</h3>
                                </div>
                                <div class="description mb-4">
                                    <ul>
                                        <li>
                                            Sebelum Anda pesan!!!! pastikan untuk membaca syarat rental.
                                        </li>
                                    </ul>
                                    <p class="mb-0"><b> lepas kunci:</b> Bawa KTP, SIM A, dan dokumen-dokumen lain yang dibutuhkan oleh penyedia rental.
                                        Saat Anda bertemu dengan staf rental, cek kondisi mobil dengan staf.
                                        Setelah itu, baca dan tanda tangan perjanjian rental.
                                        <br>
                                        <b>dengan driver: </b> Biaya tercantum belum termasuk makan harian supir, akomodasi penginapan supir, tip(optional) dan bbm. Harap langsung dibayar ke supir.
                                    </p>
                                </div>
                            </center>
                        </div>
                    </div>


                    <br>
                    <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="single-map mb-4">
                                <h4>Map</h4>
                                <div class="map rounded overflow-hidden">

                                    <div style="width: 100%">
                                        <iframe class=" rounded overflow-hidden" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63730.13218028475!2d114.5530127115958!3d-3.317220594302367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4209aa1eec961%3A0x26030bfcc09204d2!2sBanjarmasin%2C%20Kota%20Banjarmasin%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1686480133109!5m2!1sid!2sid"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ps-lg-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4">
                            <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                                <div class="description mb-2">
                                    <table class="table rounded bg-white">
                                        <tbody>
                                            <tr>
                                                <td>Merek</td>
                                                <td><?php echo $p->merek ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Kendaraan</td>
                                                <td><?php echo $p->nomor_kendaraan ?></td>
                                            </tr>
                                            <tr>
                                                <td>Warna</td>
                                                <td><?php echo $p->warna ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kapasitas</td>
                                                <td><?php echo $p->seat ?> orang</td>
                                            </tr>
                                            <tr>
                                                <td>Transmission</td>
                                                <td><?php echo $p->transmision ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bensin</td>
                                                <td><?php echo $p->bensin ?></td>
                                            </tr>
                                            <tr>
                                                <td>Condition</td>
                                                <td>Used</td>
                                            </tr>
                                            <tr>
                                                <td>Year</td>
                                                <td><?php echo $p->tahun ?></td>
                                            </tr>
                                            <tr>
                                                <td>Harga Sewa</td>
                                                <td>Rp. <?php echo number_format($p->harga)  ?> /hari</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="description mb-2">
                                    <h4 class="title">Features cars</h4>
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="des-features bg-white p-3 border-all rounded">
                                                <h5 class="subtitle">Convenience</h5>
                                                <ul>
                                                    <li class="d-block">self belt</li>
                                                    <li class="d-block">Navigation System</li>
                                                    <li class="d-block">Power charge</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="des-features bg-white p-3 border-all rounded">
                                                <h5 class="subtitle">Safety</h5>
                                                <ul>
                                                    <li class="d-block">Camera Parking</li>
                                                    <li class="d-block">LED Headlights</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="des-features bg-white p-3 border-all rounded">
                                                <h5 class="subtitle">Entertainment</h5>
                                                <ul>
                                                    <li class="d-block">Head Unit</li>
                                                    <li class="d-block">Bluetooth</li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="des-features bg-white p-3 border-all rounded">
                                                <h5 class="subtitle">free</h5>
                                                <ul>
                                                    <li class="d-block">Mineral Water</li>
                                                </ul>
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
    </div>
</section>

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


        </div>
    </div>
</div>
<?php include "../template/footer_u.php" ?>
<script src="../assets_u/js/jquery-3.5.1.min.js">
</script>
<script src="../assets_u/js/bootstrap.min.js">
</script>

<script src="../assets_u/js/particles.js">
</script>
<script src="../assets_u/js/particlerun.js"></script>

<script src="../assets_u/js/main.js"></script>
<script src="../assets_u/js/custom-accordian.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>
</body>

</html>