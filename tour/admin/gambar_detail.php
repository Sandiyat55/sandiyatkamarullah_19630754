<?php
include '../include/config.php';


session_start();

$id_wisata = $_GET['id_wisata'];
$sql  =   mysqli_query($conn, "SELECT * FROM
gambar where id_wisata='$id_wisata'");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Image Upload</title>
    <style>
        body {
            display: flex;
            align-items: center;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
        }

        .error {
            color: #a00;
        }

        .gallery img {
            width: 120px;
        }
    </style>
</head>
 
<body>

    <iframe src="" frameborder="0"></iframe>
    <?php
    if (mysqli_num_rows($sql) > 0) {
        while ($fetch = mysqli_fetch_assoc($sql)) {
    ?>
            <img src="../gambar/<?php echo $fetch['gambar'] ?>" height="600" width="450" alt="" srcset="">
            <p></p>
    <?php
        }
    }
    ?>
</body>

</html>