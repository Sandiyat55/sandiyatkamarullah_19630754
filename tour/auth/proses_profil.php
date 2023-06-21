
<?php
// memanggil file conn.php untuk melakukan conn database

include '../include/config.php';
// membuat variabel untuk menampung data dari form
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];
$no_hp  = $_POST['no_hp'];
$no_ktp = $_POST['no_ktp'];
$alamat = $_POST['alamat'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$gambar_user = $_FILES['gambar']['name'];

//cek dulu jika merubah gambar user jalankan coding ini
if ($gambar_user != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_user); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_user; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

        // jalankan query UPDATE berdasarkan ID yang usernya kita edit
        $query  = "UPDATE users SET username = '$username',email = '$email', no_hp = '$no_hp', no_ktp = '$no_ktp', alamat ='$alamat', tanggal_lahir = '$tanggal_lahir', jenis_kelamin ='$jenis_kelamin', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id_user = '$id_user'";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman user.php
            //silahkan ganti user.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil diubah.');window.location='../cust/index_u.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='user_account_setting.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang usernya kita edit
    $query  = "UPDATE user SET username = '$username',email = '$email', no_hp = '$no_hp', no_ktp = '$no_ktp', alamat ='$alamat', tanggal_lahir = '$tanggal_lahir', jenis_kelamin ='$jenis_kelamin'";
    $query .= "WHERE id_user= '$id_user'";
    $result = mysqli_query($conn, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        //tampil alert dan akan redirect ke halaman user.php
        //silahkan ganti user.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil dilengkapi.');window.location='../cust/index_u.php';</script>";
    }
}
