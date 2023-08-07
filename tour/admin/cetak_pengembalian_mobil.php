<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Cetak pengembalian mobil | Travel Icha </title>
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
        <h3><b>Data Pengembalian Mobil</b></h3>
    </center>

    <br />
    <div class="widget-content widget-content-area">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id Transaksi</th>
                    <th>Nama Penyewa </th>
                    <th>Nomor Kendaraan</th>
                    <th>Nama Mobil</th>

                    <th>Keadaan Mobil</th>
                    <th>Gambar Mobil</th>
                    <th>Deskripsi</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT transaksi.*, mobil.id_mobil, mobil.nama_mobil,mobil.nomor_kendaraan, users.id_user, users.username FROM transaksi INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil INNER Join users ON transaksi.id_user = users.id_user where jenis_transaksi = 'mobil' ORDER BY id_transaksi DESC;");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>

                        <td><?php echo $row['id_transaksi']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['nomor_kendaraan']; ?></td>
                        <td><?php echo $row['nama_mobil']; ?></td>
                        <?php if ($row['ket'] == "") {
                        ?>
                            <td class="align-center">
                                Belum dikembalikan
                            </td>
                        <?php } else {
                        ?>
                            <td><?php echo $row['kondisi']; ?></td>
                        <?php
                        } ?>

                        <?php if ($row['gambar_pengembalian'] == "") {
                        ?>
                            <td class="align-center">
                                Belum dikembalikan
                            </td>
                        <?php } else {
                        ?>
                            <td class="align-center"><?php echo "<img src='../gambar/$row[gambar_pengembalian]' width='70' height='90' />"; ?></td>

                        <?php
                        } ?>
                        <?php if ($row['ket'] == "") {
                        ?>
                            <td class="align-center">
                                Belum dikembalikan
                            </td>
                        <?php } else {
                        ?>
                            <td><?php echo $row['ket']; ?></td>
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