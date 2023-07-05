<?php
include '../include/config.php';
error_reporting(0);

session_start();


$id_transaksi = $_GET["id_transaksi"];
$query = "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi";
$hapus = mysqli_query($conn, $query);
if ($hapus) {
    echo "<script type='text/javascript'>
    alert('Data Berhasil dihapus...');
    document.location.href ='tb_sewa.php';
    </script>";
}
