<?php
session_start();
$id_mobil = $_GET['id_mobil'];
$jumlah = $_GET['jumlah'];
$supir = $_GET['supir'];
$tanggal = $_GET['tanggal'];

if (isset($_SESSION['cart'][$id_mobil])) {
    $_SESSION['cart'][$id_mobil] = $jumlah;
} else {
    $_SESSION['cart'][$id_mobil] = $jumlah;
}
echo "<pre>";
print_r($_SESSION['cart']);

echo "</pre>";
echo "<script> alert('Produk berhasil ditambahkan');</script>";
echo "<script> location='booking.php?id_mobil=$id_mobil&jumlah=$jumlah&supir=$supir&tanggal=$tanggal';</script>";
