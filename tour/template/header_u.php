<?php
include '../include/config.php';
session_start();
error_reporting(0);

?>
<header class="main_header_area">
    <!-- Navigation Bar -->
    <div class="header_menu" id="header_menu">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <img src="../assets_u/images/logo.png" alt="image">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li class="dropdown submenu">
                                <a href="index_u.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home </a>
                            </li>
                            <li class="submenu dropdown">
                                <a href="tour.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tours</a>
                            </li>
                            <li class="submenu dropdown">
                                <a href="car.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cars </a>
                            </li>
                            <li class="submenu dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <i class="icon-arrow-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="submenu dropdown">
                                        <a href="https://www.gotravelly.com/blog/7-tempat-wisata-di-kotabaru/" target="_blank" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kotabaru</a>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="https://ksmtour.com/informasi/tempat-wisata/kalimantan-selatan/pulau-samber-gelap-surga-para-penyu-kalimantan-selatan.html" target="_blank" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Samber Gelap</a>

                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="https://www.indozone.id/travel/qEsbJPp/pantai-teluk-tamiang-surga-tersembunyi-dari-kalimantan-selatan-keindahannya-alami/read-all" target="_blank" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teluk Tamiang</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div><!-- /.navbar-collapse -->

                    <div class="register-login d-flex align-items-center">
                        <?php if (isset($_SESSION['users'])) : ?>
                            <a href="../auth/logout.php" class="me-3">Logout</a>
                        <?php else : ?>
                            <a href="../auth/user_login.php" class="me-3">
                                Login/Register
                            </a>
                        <?php endif ?>

                        <?php if (isset($_SESSION['users'])) : ?>
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="submenu dropdown">
                                    <i class="icon-user me-3"> </i>
                                    <ul class="dropdown-menu">
                                        <li class="submenu dropdown">
                                            <a href="../auth/user_account_setting.php?id_user=<?= $_SESSION['id_user'] ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting</a>
                                        </li>
                                        <li class="submenu dropdown">
                                            <a href="../cust/riwayat.php?id_user=<?= $_SESSION['id_user'] ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pesanan Saya</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#" class="nir-btn white" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $_SESSION['users'] ?></a>
                        <?php else : ?> <a href="#" class="nir-btn white"> Guest </a>
                        <?php endif ?>

                    </div>

                    <div id="slicknav-mobile"></div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <!-- Navigation Bar Ends -->
</header>