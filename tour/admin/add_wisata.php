<?php
include '../include/config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}
if (isset($_POST['insertdata'])) {
    $id_wisata = $_POST['id_wisata'];
    $nama = $_POST['nama'];
    $harga  = $_POST['harga'];
    $kuota = $_POST['kuota'];
    $tanggal  = $_POST['tanggal'];
    $status = $_POST['status'];
    $deskripsi = $_POST['ket'];
    $berapa_hari = $_POST['berapa_hari'];
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;
    move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru);
    $sql = "INSERT INTO wisata (nama, tanggal, harga,  deskripsi, kuota, berapa_hari,  status, gambar)
    VALUES ('$nama', '$tanggal', '$harga',  '$deskripsi', '$kuota', '$berapa_hari', '$status','$nama_gambar_baru')";
    $result = mysqli_query($conn, $sql);
    $id_wisata_barusan =  $conn->insert_id;

    $gambar = $_FILES['gambar']['name'];
    $a = $_FILES['gambar']['name'];
    $jml = count($a);
    if ($result) {
        for ($i = 0; $i < $jml; $i++) {
            $b = $a[$i];
            $c =  $_FILES['gambar']['tmp_name'][$i];
            move_uploaded_file($c, '../gambar/' . $b);
            $sql = "INSERT INTO gambar (id_wisata, gambar)
            VALUES ('$id_wisata_barusan', '$b')";
            $result = mysqli_query($conn, $sql);
        }
    }
    if ($result) {
        echo "<script>alert('Data Berhasil disimpan...');
        document.location.href = 'tb_wisata.php';</script>";
    } else {
        die("Query Error :" . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }
}
