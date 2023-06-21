<?php
require "../include/config.php";
session_start();
date_default_timezone_set('Asia/Makassar');

if (isset($_POST['booking'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $id_user = $_SESSION['id_user'];
    $id_mobil = $_GET['id_mobil'];
    $tanggal = $_GET['tanggal'];
    $jumlah = $_GET['jumlah'];
    $jumlah_tanggal = $jumlah - 1;
    $tanggal2 = date('Y-m-d', strtotime("+$jumlah_tanggal days", strtotime($tanggal)));
    $supir = $_GET['supir'];
    $tanggal_now = date("Y-m-d");
    $jenis = "mobil";
    $status = "menunggu verified";
    $ambil = $conn->query("SELECT * FROM mobil WHERE id_mobil='$id_mobil'");
    $pecah = $ambil->fetch_assoc();
    $harga = $pecah["harga"];
    $total = $pecah["harga"] * $jumlah;
    $cek = 0;

    $sql1 = "INSERT INTO transaksi (id_user, jenis_transaksi, id_mobil, supir, harga, qty, total_harga, status, tanggal, tanggal booking) VALUES  ('$id_user', '$jenis','$id_mobil', '$supir', '$harga', '$jumlah', '$total', '$status', '$tanggal', '$tanggal_now')";
    $save = mysqli_query($conn, $sql1);

    $id_transaksi_barusan = $conn->insert_id;

    if ($save) {
        for ($cek; $cek < $jumlah; $cek++) {
            $tglmulai = strtotime($tanggal);
            $jmlhari  = 86400 * $cek;
            $tgl      = $tglmulai + $jmlhari;
            $tglhasil = date("Y-m-d", $tgl);
            $sql1    = "INSERT INTO cek (id_transaksi,id_mobil,tanggal,status)VALUES('$id_transaksi_barusan','$id_mobil','$tglhasil','$status')";
            $save = mysqli_query($conn, $sql);
        }
    }
    if ($save) {
        echo "<script> alert(' Pemesanan Selesai Silahkan print invoice'); location='confirmation.php?id_transaksi=$id_transaksi_barusan';
    </script>";
    } else {
        echo "<script> alert('Pemesanan gagal'); location='car.php';
    </script>";
    }
}
