<?php
include '../include/config.php';
session_start();

error_reporting(0);
if (isset($_POST["action"])) {
    $query = mysqli_query($conn, "SELECT * FROM mobil where status ='ready' ORDER BY id_mobil DESC;");
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query = mysqli_query($conn, "SELECT * FROM mobil WHERE harga BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "' AND status ='ready' ORDER BY id_mobil DESC");
    }
    $total_row = mysqli_num_rows($query);
    $output = '';
    if ($total_row > 0) {
        while ($p = mysqli_fetch_assoc($query)) { ?>
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
<?php
        }
    } else {
        $output = '<center><h3>No Data Found</h3></center>';
    }
    echo $output;
}
