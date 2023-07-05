<?php
session_start();
include '../include/config.php';

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id_transaksi'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_transaksi = $_GET['id_transaksi'];

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT transaksi.*, mobil.id_mobil, mobil.nama_mobil, users.id_user, users.username FROM transaksi INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil INNER Join users ON transaksi.id_user = users.id_user WHERE id_transaksi='$id_transaksi'";
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
        echo "<script>alert('Data tidak ditemukan pada database');window.location='tb_sewa.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='tb_sewa.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Form Pengembalian | Travel Icha </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
</head>

<body>
    <div id="eq-loader">
        <div class="eq-loader-div">
            <div class="eq-loading dual-loader mx-auto mb-5"></div>
        </div>
    </div>

    <!--  BEGIN NAVBAR  -->
    <?php include "../template/header.php" ?>

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="ps-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN MODERN  -->
        <?php include "../template/sidebar.php" ?>
        <!--  END MODERN  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Form Pengembalian</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Forms </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="update_pengembalian.php" method="POST" enctype="multipart/form-data">

                                    <div class="form-row mb-2">
                                        <input name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" hidden />
                                        <div class="form-group col-md-12">
                                            <label for="status">Transaksi Mobil</label>
                                            <input type="text" class="form-control-rounded form-control" name="transaksi_mobil" placeholder="<?php echo $data['id_transaksi']; ?>/mobil <?php echo $data['nama_mobil']; ?>/<?php echo $data['username']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">

                                        <div class="form-group col-md-12">
                                            <label for="gambar">Gambar Pengembalian</label>
                                            <input type="file" class="form-control-rounded form-control" name="gambar" id="gambar">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status">Kondisi Pengembalian</label>
                                            <select class="form-control-rounded form-control" id="kondisi" name="kondisi">
                                                <option selected="">Pilih Status</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Tidak Baik">Tidak Baik</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-8">
                                            <label for="ket">Deskripsi</label>
                                            <textarea class="form-control-rounded form-control" name="ket" id="ket" cols="70" rows="5"></textarea>
                                        </div>

                                    </div>
                                    <button type="reset" class="btn btn-button-8 btn-rounded mb-4 mt-3">Cancel</button>
                                    <button type="submit" class="btn btn-button-7 btn-rounded mb-4 mt-3">Simpan</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <?php include "../template/footer.php" ?>
    <!--  END FOOTER  -->

    <!--  BEGIN PROFILE SIDEBAR  -->

    <!--  BEGIN PROFILE SIDEBAR  -->

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
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="../plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="../plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="../plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-default btn-rounded btn-sm mb-4'
                    }
                ]
            },
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>