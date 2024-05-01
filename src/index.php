<?php
include 'menu.php';
include 'process.php';
include 'index_procedures.php';
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
<img src="assets/imgs/header.png" alt="header" style="width: 100%;">

<h1>Legújabb könyveink</h1>
<a href="ujdonsagok.php" style="float: right; margin-right: 60px">Teljes lista</a>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<?php
    executeProcedure('TOP5KONYV');
?>
<h1>Sikerlista</h1>
<a href="sikerlista.php" style="float: right; margin-right: 60px">Teljes lista</a>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div style="margin: 0 auto; width: 50%;">
<?php
    executeProcedure('TOP3KONYV');
?>
</div>
</body>
</html>
