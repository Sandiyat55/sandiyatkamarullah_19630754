<?php
// memanggil file conn.php untuk melakukan conn database

include '../include/config.php';
$id_transaksi = $_GET["id_transaksi"];
$que = mysqli_query($conn, "SELECT * FROM Transaksi where id_transaksi = '$id_transaksi'");
$d = mysqli_fetch_assoc($que);
$jum = $d['qty'];
$id_wisata = $d['id_wisata'];
$quen = mysqli_query($conn, "SELECT * FROM wisata where id_wisata = '$id_wisata'");
$dn = mysqli_fetch_assoc($quen);
$rating = $dn['rating'] - $jum;
$status = "batal";
$sql = "UPDATE transaksi set status = '$status' where id_transaksi = '$id_transaksi'";
$sql1 = "UPDATE cek set status = '$status' where id_transaksi = '$id_transaksi'";
$sql11 = "UPDATE wisata set rating = '$rating' where id_wisata = '$id_wisata'";
$result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql1);
$result = mysqli_query($conn, $sql11);
if ($result) {
    echo "<script type='text/javascript'>
                 alert('Data Berhasil disimpan...');
                document.location.href = 'tb_transaksi.php';
                </script>";
} else {
    echo '<script> alert("Data Not Saved"); </script>';
}
