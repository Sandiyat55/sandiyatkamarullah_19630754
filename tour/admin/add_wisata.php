<?php
include '../include/config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}
if (isset($_POST['insertdata'])) {
    $nama = $_POST['nama'];
    $harga  = $_POST['harga'];
    $kuota = $_POST['kuota'];
    $tanggal  = $_POST['tanggal'];
    $status = $_POST['status'];
    $deskripsi = $_POST['ket'];
    $berapa_hari = $_POST['berapa_hari'];
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
            $sql = "INSERT INTO wisata (nama, tanggal, harga,  deskripsi, kuota, berapa_hari,  status, gambar)
					VALUES ('$nama', '$tanggal', '$harga',  '$deskripsi', '$kuota', '$berapa_hari', '$status','$nama_gambar_baru')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Query Error :" . mysqli_errno($conn) . " - " . mysqli_error($conn));
            } else {
                echo "<script>alert('Data Berhasil disimpan...');
                document.location.href = 'tb_wisata.php';</script>";
            }
        } else {
            echo "<script>alert('ekstensi gambar hanya bisa jpg dan png');
            document.location.href = 'tb_wisata.php';
                </script>";
        }
    } else {
        $sql = "INSERT INTO wisata (nama, tanggal, harga,  deskripsi, kuota, berapa_hari, status)
					VALUES ('$nama', '$tanggal', '$harga',  '$deskripsi', '$kuota', '$berapa_hari', '$status')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
        alert('Data Berhasil disimpan...');
        document.location.href = 'tb_wisata.php';
    </script>";
        } else {
            echo '<script>
        alert("Data Not Saved");
    </script>';
        }
    }
}
