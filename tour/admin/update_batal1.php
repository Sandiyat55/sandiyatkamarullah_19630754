<?php
// memanggil file conn.php untuk melakukan conn database

include '../include/config.php';
$id_transaksi = $_GET["id_transaksi"];
$status = "batal";
$sql = "UPDATE transaksi set status = '$status' where id_transaksi = '$id_transaksi'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script type='text/javascript'>
                 alert('Data Berhasil disimpan...');
                document.location.href = 'tb_sewa.php';
                </script>";
} else {
    echo '<script> alert("Data Not Saved"); </script>';
}
