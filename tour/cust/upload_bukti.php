
<?php
include '../include/config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['users'])) {
    header("Location: ../auth/user_login.php");
}
$id_user = $_SESSION['id_user'];
$id_transaksi = $_POST["id_transaksi"];
$queu = $conn->query("SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
$detpem = $queu->fetch_assoc();
if (isset($_POST['bukti'])) {

    $status = "disetujui";
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
            $sql =  "UPDATE transaksi set status = '$status', gambar = '$nama_gambar_baru' where id_transaksi = '$id_transaksi'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Query Error :" . mysqli_errno($conn) . " - " . mysqli_error($conn));
            } else {
                echo "<script>alert('Data Berhasil disimpan...');
            document.location.href = 'riwayat.php?id_user=$id_user';</script>";
            }
        } else {
            echo "<script>alert('ekstensi gambar hanya bisa jpg dan png');
        document.location.href = 'confirmation.php?id_transaksi=$id_transaksi';
            </script>";
        }
    } else {
        $sql = "UPDATE transaksi set status = '$status' where id_transaksi = '$id_transaksi'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
    alert('Data Berhasil disimpan...');
    document.location.href = 'riwayat.php?id_user=$id_user';
</script>";
        } else {
            echo '<script>
    alert("Data Not Saved");
</script>';
        }
    }
}
?>
