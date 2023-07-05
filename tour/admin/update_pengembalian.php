<?php
// memanggil file conn.php untuk melakukan conn database

include '../include/config.php';

$id_transaksi = $_POST["id_transaksi"];
$kondisi = $_POST['kondisi'];
$ket = $_POST['ket'];
$status = "selesai";
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
        $sql =  "UPDATE transaksi set kondisi = '$kondisi' , ket = '$ket', status = '$status', gambar_pengembalian = '$nama_gambar_baru' where id_transaksi = '$id_transaksi'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Query Error :" . mysqli_errno($conn) . " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data Berhasil disimpan...');
                document.location.href = 'tb_sewa.php';</script>";
        }
    } else {
        echo "<script>alert('ekstensi gambar hanya bisa jpg dan png');
            document.location.href = 'tb_sewa.php';
                </script>";
    }
} else {
    $sql = "UPDATE transaksi set kondisi = '$kondisi' , ket = '$ket', status = '$status' where id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script type='text/javascript'>
                 alert('Data Berhasil disimpan...');
                document.location.href = 'tb_sewa.php';
                </script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
