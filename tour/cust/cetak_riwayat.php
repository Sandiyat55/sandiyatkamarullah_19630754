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
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Cetak Transaksi Wisata | Travel Icha </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
</head>
<?php
require '../include/config.php';
$bulan = array(
    '01' => 'JANUARI',
    '02' => 'FEBRUARI',
    '03' => 'MARET',
    '04' => 'APRIL',
    '05' => 'MEI',
    '06' => 'JUNI',
    '07' => 'JULI',
    '08' => 'AGUSTUS',
    '09' => 'SEPTEMBER',
    '10' => 'OKTOBER',
    '11' => 'NOVEMBER',
    '12' => 'DESEMBER',
);
$data = date('d') . ' ' . (strtolower($bulan[date('m')])) . ' ' . date('Y');
$tglnow = $data;
?>

<body>
    <div class="cop d-flex justify-content-center">

        <div class="text" style="margin-top:30px">
            <center>
                <h3><b>CV. Icha Jaya Mandiri</b></h3>
                <h5><b>Penyedia Layanan Jasa Travel dan Tour</b></h5>
                <h6>Alamat Kantor : Jl. Provinsi km 168 desa sinarbulan, kecamatan satui, kabupaten tanah bumbu, kalimantan selatan.</h6>


            </center>
        </div>
    </div>
    <hr>

    <center>
        <h3><b>Data Transaksi Wisata <?php echo $row['username'] ?></b></h3>

    </center>

    <br />
    <div class="widget-content widget-content-area">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>wisata</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Bukti Pembayaran</th>
                    <th>Total Harga</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT transaksi.*, wisata.id_wisata, wisata.nama, users.id_user, users.username FROM transaksi INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata INNER Join users ON transaksi.id_user = users.id_user where jenis_transaksi = 'wisata' and users.id_user ='$id_user' ORDER BY id_transaksi DESC;");
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
                        <?php if ($row['status'] == "menunggu verified") {
                        ?>
                            <td class="align-center"><?php echo $row['status']; ?></td>
                        <?php } else {
                        ?>
                            <td class="align-center"><?php echo $row['status']; ?></td>
                        <?php
                        } ?>


                </tr>
            <?php } ?>

            </tbody>
        </table>

    </div>

    <div class="ttd float-right" style="margin: 10px 100px 0 0">
        <p>
            Tanah Bumbu, <?= $tglnow ?><br>ttd,<br><br><br><br>
            Icha Travel<br>




        </p>
    </div>
    <script>
        window.print();
    </script>
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
</body>

</html>