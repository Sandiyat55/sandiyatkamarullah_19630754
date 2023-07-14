
<?php
// memanggil file conn.php untuk melakukan conn database
include '../include/config.php';
// membuat variabel untuk menampung data dari form
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
$query  = "UPDATE wisata SET nama = '$nama', harga = '$harga', kuota = '$kuota', tanggal ='$tanggal', berapa_hari = '$berapa_hari', status = '$status', deskripsi ='$deskripsi', gambar = '$nama_gambar_baru'";
$query .= "WHERE id_wisata = '$id_wisata'";
$result = mysqli_query($conn, $query);
$gambar = $_FILES['gambar']['name'];
$a = $_FILES['gambar']['name'];
$jml = count($a);
if ($result) {
    for ($i = 0; $i < $jml; $i++) {
        $b = $a[$i];
        $c =  $_FILES['gambar']['tmp_name'][$i];
        move_uploaded_file($c, '../gambar/' . $b);
        $sql = "UPDATE gambar SET gambar ='$b' WHERE id_wisata = '$id_wisata'";
   
        $result = mysqli_query($conn, $sql);
    }
}
if ($result) {
    echo "<script>alert('Data Berhasil disimpan...');
    document.location.href = 'tb_wisata.php';</script>";
} else {
    die("Query Error :" . mysqli_errno($conn) . " - " . mysqli_error($conn));
}
