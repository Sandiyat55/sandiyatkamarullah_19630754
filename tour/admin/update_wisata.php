
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
$gambar_wisata = $_FILES['gambar']['name'];

//cek dulu jika merubah gambar wisata jalankan coding ini
if ($gambar_wisata != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_wisata); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_wisata; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

        // jalankan query UPDATE berdasarkan ID yang wisatanya kita edit
        $query  = "UPDATE wisata SET nama = '$nama', harga = '$harga', kuota = '$kuota', tanggal ='$tanggal', berapa_hari = '$berapa_hari', status = '$status', deskripsi ='$deskripsi', gambar_wisata = '$nama_gambar_baru'";
        $query .= "WHERE id_wisata = '$id_wisata'";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman wisata.php
            //silahkan ganti wisata.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil diubah.');window.location='tb_wisata.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_wisata.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang wisatanya kita edit
    $query  = "UPDATE wisata SET nama = '$nama', harga = '$harga', kuota = '$kuota', tanggal ='$tanggal',berapa_hari='$berapa_hari', status = '$status', deskripsi ='$deskripsi'";
    $query .= "WHERE id_wisata= '$id_wisata'";
    $result = mysqli_query($conn, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        //tampil alert dan akan redirect ke halaman wisata.php
        //silahkan ganti wisata.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='tb_wisata.php';</script>";
    }
}
