<?php
session_start();
$id_wisata = $_GET['id_wisata'];
$jumlah = $_GET['jumlah'];
if (isset($_SESSION['cart'][$id_wisata])) {
    $_SESSION['cart'][$id_wisata] += $jumlah;
} else {
    $_SESSION['cart'][$id_wisata] = $jumlah;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
echo "<script> alert('Produk berhasil ditambahkan');</script>";
echo "<script> location='booking_wisata.php';</script>";
