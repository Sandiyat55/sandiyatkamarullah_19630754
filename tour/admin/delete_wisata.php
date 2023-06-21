<?php
include '../include/config.php';
error_reporting(0);

session_start();


$id_wisata = $_GET["id_wisata"];
$query = "DELETE FROM wisata WHERE id_wisata =$id_wisata";
$hapus = mysqli_query($conn, $query);
if ($hapus) {
    echo "<script type='text/javascript'>
    alert('Data Berhasil dihapus...');
    document.location.href ='tb_wisata.php';
    </script>";
}
