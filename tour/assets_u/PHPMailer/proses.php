<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


//sesuaikan name dengan di form nya ya 
$email = 'sandiyatkamarullah9@gmail.com';
$judul = 'Travel & Tour';
$pesan = 'Ada transaksi baru nih';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sandiyatkamarullah9@gmail.com';                     //SMTP username
    $mail->Password   = 'gyhqxrfuzipdvcuu';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //pengirim
    $mail->setFrom('sandiyatkamarullah@gmail.com', 'CV Icha Jaya Mandiri');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $judul;
    $mail->Body    = $pesan;
    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
    //$mail->addAttachment(''); 

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
//redirect ke halaman index.php
echo "<script>alert('Email berhasil terkirim!');</script>";
