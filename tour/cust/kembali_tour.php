<?php
session_start();
unset($_SESSION['cart']);
echo "<script>location='tour.php';</script>";
