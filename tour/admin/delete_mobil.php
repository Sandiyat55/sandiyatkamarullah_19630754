<?php
include '../include/config.php';
error_reporting(0);

session_start();


$id_mobil = $_GET["id_mobil"];
$query = "DELETE FROM mobil WHERE id_mobil =$id_mobil";
$hapus = mysqli_query($conn, $query);
if ($hapus) {
    echo "<script type='text/javascript'>
    alert('Data Berhasil dihapus...');
    document.location.href ='tb_mobil.php';
    </script>";
}
