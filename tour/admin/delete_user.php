<?php
include '../include/config.php';
error_reporting(0);

session_start();


$id_users = $_GET["id_user"];
$query = "DELETE FROM users WHERE id_user =$id_users";
$hapus = mysqli_query($conn, $query);
if ($hapus) {
    echo "<script type='text/javascript'>
    alert('Data Berhasil dihapus...');
    document.location.href ='tb_user.php';
    </script>";
}
