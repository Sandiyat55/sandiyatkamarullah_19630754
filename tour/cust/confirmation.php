<?php
session_start();
error_reporting(0);
include '../include/config.php';
$id_transaksi = $_GET['id_transaksi'];
$sql = mysqli_query($conn, "SELECT transaksi.*, users.id_user, users.username, users.email, users.no_hp,users.alamat,users.no_ktp, mobil.id_mobil, mobil.nama_mobil,mobil.nomor_kendaraan,mobil.harga FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil where transaksi.id_transaksi='$id_transaksi'");
$row = mysqli_fetch_array($sql);
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

<?php include "../template/header_u.php" ?>
<!-- header ends -->

<!-- BreadCrumb Starts -->
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(../assets_u/images/bg/bg1.jpg);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(../assets_u/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Confirmation</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Confirmation</li>
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
            <div class="col-lg-8 col-xs-12 mb-4">
                <div class="payment-book">
                    <div class="booking-box">
                        <div class="booking-box-title d-md-flex align-items-center bg-title p-4 mb-4 rounded text-md-start text-center">
                            <i class="fa fa-check px-4 py-3 bg-white rounded title fs-5"></i>
                            <div class="title-content ms-md-3">
                                <h3 class="mb-1 white">Thank You. Your booking order is <?php echo $row['status']; ?> now.</h3>
                                <p class="mb-0 white">A confirmation cek your whatsapp</p>
                            </div>
                        </div>
                        <div class="travellers-info mb-4">
                            <table>
                                <thead>
                                    <th>Order Number</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Payment Method</th>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td class="theme2"><?php echo $row['id_transaksi']; ?> </td>
                                        <td class="theme2"><?php echo date('d-m-Y', strtotime($row['tanggal_booking'])); ?> </td>
                                        <td class="theme2">Rp <?php echo number_format($row['total_harga']); ?> </td>
                                        <td class="theme2">Bank Transfer</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="travellers-info mb-4">
                            <h4>Your Information</h4>
                            <table>
                                <tr>
                                    <td>Booking Name</td>
                                    <td><?php echo $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $row['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td>KTP</td>
                                    <td><?php echo $row['no_ktp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $row['alamat']; ?></td>
                                </tr>

                            </table>
                        </div>

                        <div class="booking-border mb-4">
                            <h4 class="border-b pb-2 mb-2"></h4>
                        </div>

                        <div class="booking-border d-flex">
                            <?php if ($row['gambar'] == "") { ?>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="nir-btn me-2"> <i class="fa fa-envelope-open-text"></i> Bukti Pembayaran </button>

                            <?php } else { ?>
                            <?php } ?>
                            <a href="cetak_struk_sewa.php?id_transaksi=<?php echo  $row["id_transaksi"]; ?>" target="_blank" class="nir-btn-black"><i class="fa fa-print"></i> Cetak</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-xs-12 mb-4 ps-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item bordernone bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Need Booking Help?</h4>
                            <div class="sidebar-module-inner">
                                <p class="mb-2">Paid was hill sir high 24/7. For him precaution any advantages dissimilar.</p>
                                <ul class="help-list">
                                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Hotline</span>: +62 82153579421</li>
                                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Email</span>: icha@travel.com</li>

                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Why booking with us?</h4>
                            <div class="sidebar-module-inner">
                                <ul class="featured-list-sm">
                                    <li class="border-b pb-2 mb-2">
                                        <h6 class="mb-0">No Booking Charges</h6>
                                        We don't charge you an extra fee for booking a hotel room with us
                                    </li>
                                    <li class="border-b pb-2 mb-2">
                                        <h6 class="mb-0">No Cancellation Sees</h6>
                                        We don't charge you a cancellation or modification fee in case plans change
                                    </li>
                                    <li class="border-b pb-2 mb-2">
                                        <h6 class="mb-0">Instant Confirmation</h6>
                                        Instant booking confirmation whether booking online or via the telephone
                                    </li>
                                    <li>
                                        <h6 class="mb-0">Flexible Booking</h6>
                                        You can book up to a whole year in advance or right up until the moment of your stay
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi number <?php echo $row['id_transaksi'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="upload_bukti.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kirim uang sebesar RP <?php echo number_format($row['total_harga'])  ?> ke nomor rekening a/n :</label>
                            <p></p> <label for="recipient-name" class="col-form-label">Sandiyat 7821937828373 - BRI</label>
                        </div>
                        <input type="hidden" name="id_transaksi" value="<?php echo  $row['id_transaksi']  ?>">
                        <div class="form-group col-md-12">
                            <label for="gambar">Upload Bukti Pembayaran</label>
                            <input type="file" class="form-control-rounded form-control" name="gambar" id="gambar">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="bukti" class="btn btn-primary">Send</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include '../template/footer_u.php' ?>
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
<script src="../assets_u/js/custom-swiper.js"></script>
<script src="../assets_u/js/custom-nav.js"></script>
</body>

</html>