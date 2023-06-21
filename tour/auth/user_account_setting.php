<?php
session_start();
include '../include/config.php';

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}
// mengecek apakah di url ada nilai GET id
if (isset($_GET['id_user'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_user = ($_GET["id_user"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM users WHERE id_user='$id_user'";
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
        echo "<script>alert('Data tidak ditemukan pada database');window.location='tb_user.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='tb_user.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Account Settings | Equation - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../plugins/dropify/dropify.min.css">
    <link href="../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body>
    <div id="eq-loader">
        <div class="eq-loader-div">
            <div class="eq-loading dual-loader mx-auto mb-5"></div>
        </div>
    </div>

    <?php include "../template/header.php" ?>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form action="proses_profil.php" method="POST" enctype="multipart/form-data" class="general-info">
                            <div class="info">
                                <h6 class="mt-4">General Information</h6>
                                <div class="row">

                                    <div class="col-lg-4 col-md-5">
                                        <div class="upload ml-md-5 mt-4 pr-md-4">

                                            <input type="file" id="input-file-max-fs" class="dropify" data-default-file="../gambar/<?php echo $data['gambar']; ?>" name="gambar" data-max-file-size="2M" required />
                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                        </div>
                                        <input name="id_user" value="<?php echo $data['id_user']; ?>" hidden />
                                    </div>
                                    <div class="col-lg-8 col-md-7 mt-md-0 mt-4">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="firstName"> Username</label>
                                                <input type="text" class="form-control mb-4" value="<?php echo $data['username']; ?>" name="username" id="firstName" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastName">Email</label>
                                                <input type="email" class="form-control mb-4" name="email" value="<?php echo $data['email']; ?>" id="lastName" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="profession">No.KTP</label>
                                                <input type="text" class="form-control mb-4" name="no_ktp" value="<?php echo $data['no_ktp']; ?>" id="profession" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control mb-4" value="<?php echo $data['alamat']; ?>" name="alamat" id="address" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location">Tanggal Lahir</label>
                                                    <input type="date" class="form-control mb-4" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" id="location" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control mb-4" name="no_hp" id="phone" value="<?php echo $data['no_hp']; ?>" placeholder="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="website1">Jenis Kelamin</label>
                                                    <select class="form-control-rounded form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                        <option selected="<?php echo $data['jenis_kelamin']; ?>">Pilih Jenis Kelamin</option required>
                                                        <option <?php if ($data['jenis_kelamin'] == "Laki-Laki") {
                                                                    echo 'selected';
                                                                } ?> value="Laki-Laki">Laki-Laki</option>
                                                        <option <?php if ($data['jenis_kelamin'] == "Perempuan") {
                                                                    echo 'selected';
                                                                } ?> value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="save-info">
                                <div class="row">
                                    <div class="col-md-1 mx-auto">
                                        <a href="../cust/index_u.php" class="btn btn-gradient-warning mb-4 float-right btn-rounded">Kembali</a>

                                    </div>
                                    <div class="col-md-1 mx-auto">
                                        <button type="submit" class="btn btn-gradient-primary mb-4 float-right btn-rounded">Save</button>


                                    </div>

                                </div>
                            </div>
                        </form>
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
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../plugins/dropify/dropify.min.js"></script>
    <script src="../plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Click to Upload or Drag n Drop',
                'remove': '<i class="flaticon-close-fill"></i>',
                'replace': 'Upload or Drag n Drop'
            }
        });
    </script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>

</html>