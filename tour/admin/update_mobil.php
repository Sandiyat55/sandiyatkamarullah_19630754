
<?php
// memanggil file conn.php untuk melakukan conn database

include '../include/config.php';
// membuat variabel untuk menampung data dari form
$id_mobil = $_POST['id_mobil'];
$nama_mobil = $_POST['nama_mobil'];
$nomor_kendaraan = $_POST['nomor_kendaraan'];
$harga  = $_POST['harga'];
$merek = $_POST['merek'];
$seat = $_POST['seat'];
$tahun  = $_POST['tahun'];
$status = $_POST['status'];
$bensin = $_POST['bensin'];
$transmision = $_POST['transmision'];
$warna = $_POST['warna'];
$gambar_mobil = $_FILES['gambar']['name'];

//cek dulu jika merubah gambar mobil jalankan coding ini
if ($gambar_mobil != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_mobil); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_mobil; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

        // jalankan query UPDATE berdasarkan ID yang mobilnya kita edit
        $query  = "UPDATE mobil SET nama_mobil = '$nama_mobil',merek = '$merek', harga = '$harga', seat = '$seat', bensin = '$bensin', transmision = '$transmision', warna = '$warna',tahun ='$tahun', status = '$status', nomor_kendaraan ='$nomor_kendaraan', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id_mobil = '$id_mobil'";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman mobil.php
            //silahkan ganti mobil.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil diubah.');window.location='tb_mobil.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_mobil.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang mobilnya kita edit
    $query  = "UPDATE mobil SET nama_mobil = '$nama_mobil',merek = '$merek', harga = '$harga', seat = '$seat', bensin = '$bensin', transmision = '$transmision', warna = '$warna', tahun ='$tahun', status = '$status', nomor_kendaraan ='$nomor_kendaraan'";
    $query .= "WHERE id_mobil= '$id_mobil'";
    $result = mysqli_query($conn, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        //tampil alert dan akan redirect ke halaman mobil.php
        //silahkan ganti mobil.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='tb_mobil.php';</script>";
    }
}
