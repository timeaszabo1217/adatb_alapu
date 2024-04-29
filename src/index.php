<?php
include 'menu.php';
$connection = null;
include 'process.php';
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
<h1>Sikerlista</h1>
<a href="sikerlista.php" style="float: right; margin-right: 60px">Teljes lista</a>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div style="margin: 0 auto; width: 50%;">
    <?php
    $query = 'SELECT K.NEV, K.AR, KS.SZERZO FROM Konyv K INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id ORDER BY K.Eladott_peldanyok_szama DESC FETCH FIRST 3 ROWS ONLY';
    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    while ($row = oci_fetch_assoc($stid)) {
        echo '<div style="margin: 0 30px; display: inline-block; text-align: center; width: 150px; min-height: 400px">';
        echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '<p style="height: 40px">' . $row['NEV'] . '</p>';
        echo '<p style="height: 20px">' . $row['SZERZO'] . '</p>';
        echo '<p style="height: 5px">_________________</p>';
        echo '<p>' . $row['AR'] . ' Ft</p>';
        echo '<form method="post" action="kosar.php">';
        echo '<input type="hidden" name="book_title" value="' . $row['NEV'] . '">';
        echo '<input type="hidden" name="book_price" value="' . $row['AR'] . '">';
        echo '<input class="continueButton" type="submit" value="Kosárba">';
        echo '</form>';
        echo '</div>';
    }
    oci_free_statement($stid);
    oci_close($connection);
    ?>
</div>
</body>
</html>
