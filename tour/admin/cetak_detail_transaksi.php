<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Cetak Detail | Travel Icha </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/ecommerce/invoice.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

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
    <?php
    session_start();
    include '../include/config.php';

    if (!isset($_SESSION['users'])) {
        header("Location: ../auth/user_login.php");
    }
    // mengecek apakah di url ada nilai GET id
    if (isset($_GET['id_transaksi'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id_transaksi = ($_GET["id_transaksi"]);

        // menampilkan data dari database yang mempunyai id=$id
        $query = "SELECT transaksi.*, wisata.id_wisata, wisata.nama, wisata.berapa_hari, users.id_user, users.username,users.email, users.no_hp,users.alamat,users.no_ktp FROM transaksi INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata INNER Join users ON transaksi.id_user = users.id_user WHERE id_transaksi='$id_transaksi' and jenis_transaksi = 'wisata' ORDER BY id_transaksi DESC";
        $result = mysqli_query($conn, $query);

        // jika data gagal diambil maka akan tampil error berikut
        if (!$result) {
            die("Query Error: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        }
        // mengambil data dari database
        $data = mysqli_fetch_assoc($result);
        // apabila data tidak ada pada database maka akan dijalankan perintah ini
        if (!count($data)) {
            echo "<script>alert('Data tidak ditemukan pada database');window.location='tb_transaksi.php';</script>";
        }
    } else {
        // apabila tidak ada data GET id pada akan di redirect ke index.php
        echo "<script>alert('Masukkan data id.');window.location='tb_transaksi.php';</script>";
    }
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


    <br />


    <div class="widget-content-area content-section">
        <div class="row invoice-top-section">
            <div class="col-sm-6 mb-4">
                <h5 class="invoice-info-title">Detail Info</h5>
                <p class="invoice-serial-number"># <?php echo $data['id_transaksi'] ?></p>
            </div>
            <div class="col-sm-6 mb-4 text-sm-right">
                <p class="invoice-order-status">Order Status: <?php echo $data['status'] ?></p>
                <p class="invoice-order-date">Order Date: <?php echo $data['tanggal_booking'] ?></p>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-md-6 col-sm-6 invoice-from">
                <h5 class="invoice-from-title mb-4">Data Pemesan</h5>
                <div class="row">
                    <div class="col-12 mb-2">
                        <p>Name : <?php echo $data['username']; ?></p>

                    </div>
                    <div class="col-12 mb-2">
                        <p>Email : <?php echo $data['email']; ?></p>


                    </div>
                    <div class="col-12 mb-2">

                        <p>Phone : <?php echo $data['no_hp'] ?></p>
                    </div>
                    <div class="col-12 mb-2">

                        <p>KTP : <?php echo $data['no_ktp'] ?></p>
                    </div>
                    <div class="col-12 mb-2">

                        <p>Address : <?php echo $data['alamat'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 invoice-to text-sm-right">
                <h5 class="invoice-to-title mb-3">Data Wisata</h5>
                <div class="row mb-5">
                    <div class="col-12 mb-2">
                        <p>Paket Wisata : <?php echo $data['nama'] ?></p>

                    </div>
                    <div class="col-12 mb-2">
                        <p>Berapa Hari : <?php echo $data['berapa_hari'] ?></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Item</th>
                                <th class="text-right" scope="col">Price</th>
                                <th class="text-right" scope="col">Qty</th>
                                <th class="text-right" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($conn, "SELECT transaksi.*, wisata.id_wisata, wisata.nama, users.id_user, users.username FROM transaksi INNER JOIN wisata ON transaksi.id_wisata = wisata.id_wisata INNER Join users ON transaksi.id_user = users.id_user where jenis_transaksi = 'wisata' and id_transaksi='$id_transaksi'   ORDER BY id_transaksi DESC;");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td class="text-right"><?php echo number_format($row['harga']); ?></td>
                                    <td class="text-right"><?php echo $row['qty']; ?></td>
                                    <td class="text-right"><?php echo number_format($row['total_harga']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="invoice-total-amounts text-right">
                    <div class="row">
                        <div class="col-sm-10 col-7 text-right">
                            <p class="mb-3">Subtotal: </p>
                        </div>
                        <div class="col-sm-2 col-5">
                            <p class="mb-3">Rp <?php echo number_format($data['total_harga']); ?></p>
                        </div>
                        <div class="col-sm-10 col-7 text-right">
                            <p class="mb-3">Tax.Admin: </p>
                        </div>
                        <div class="col-sm-2 col-5">
                            <p class="mb-3">Free</p>
                        </div>
                        <div class="col-sm-10 col-7 text-right">
                            <h4 class="mb-3">Grand Total: </h4>
                        </div>
                        <div class="col-sm-2 col-5">
                            <h4 class="mb-3">Rp <?php echo number_format($data['total_harga']); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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