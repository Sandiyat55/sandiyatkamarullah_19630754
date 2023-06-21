<?php
include '../include/config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}
if (isset($_POST['insertdata'])) {
    $nama_mobil = $_POST['nama_mobil'];
    $nomor_kendaraan = $_POST['nomor_kendaraan'];
    $harga  = $_POST['harga'];
    $merek = $_POST['merek'];
    $seat = $_POST['seat'];
    $tahun  = $_POST['tahun'];
    $status = $_POST['status'];
    $bensin = $_POST['bensin'];
    $transmision = $_POST['transmision'];
    $warna = $_POST['warna'];
    $gambar = $_FILES['gambar']['name'];

    if ($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar;

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru);
            $sql = "INSERT INTO mobil (nomor_kendaraan, nama_mobil, tahun, harga, merek, bensin, transmision, warna, seat, status, gambar)
					VALUES ('$nomor_kendaraan','$nama_mobil', '$tahun', '$harga',  '$merek', '$bensin','$transmision','$warna', '$seat', '$status','$nama_gambar_baru')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Query Error :" . mysqli_errno($conn) . " - " . mysqli_error($conn));
            } else {
                echo "<script>alert('Data Berhasil disimpan...');
                document.location.href = 'tb_mobil.php';</script>";
            }
        } else {
            echo "<script>alert('ekstensi gambar hanya bisa jpg dan png');
            document.location.href = 'tb_mobil.php';
                </script>";
        }
    } else {
        $sql = "INSERT INTO mobil (nomor_kendaraan, nama_mobil, tahun, harga, merek, bensin, transmision, warna, seat, status)
					VALUES ('$nomor_kendaraan','$nama_mobil', '$tahun', '$harga', '$merek', '$bensin', '$transmision','$warna', '$seat', '$status')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
        alert('Data Berhasil disimpan...');
        document.location.href = 'tb_mobil.php';
    </script>";
        } else {
            echo '<script>
        alert("Data Not Saved");
    </script>';
        }
    }
}
