<?php
include 'menu.php';
?>

<?php

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>𝐒𝐭𝐫𝐞𝐞𝐥𝐞𝐫</title>
</head>
<body>
<h1 style="text-align: center">Admin oldal</h1>
<div class="menu">
    <ul>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="fiok_kezeles.php">Fiókok kezelése</a></li>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="konyvek_kezeles.php">Könyvek kezelése</a></li>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="aruhazak_kezeles.php">Áruházak kezelése</a></li>
    </ul>
</div>
</body>
</html>
