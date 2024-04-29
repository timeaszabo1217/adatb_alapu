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
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div class="book-form-container books-container" style="margin-left: 300px;">
    <?php
    $query = 'SELECT K.KONYV_ID, K.NEV, K.AR, KS.SZERZO, K.ELADOTT_PELDANYOK_SZAMA 
              FROM Konyv K 
              INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id 
              ORDER BY K.ELADOTT_PELDANYOK_SZAMA DESC';
    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    while ($row = oci_fetch_assoc($stid)) {
        echo '<div style="display: flex; align-items: center;">';
        echo '<a href="adatlap.php?book_id=' . $row['KONYV_ID'] . '">';
        echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '</a>';
        echo '<div style="margin-left: 10px;">';
        echo '<a href="adatlap.php?book_id=' . $row['KONYV_ID'] . '">' . $row['NEV'] . '</a>';
        echo '<p>' . $row['SZERZO'] . '</p>';
        echo '<p>Eladott példányok száma: ' . $row['ELADOTT_PELDANYOK_SZAMA'] . '</p>';
        echo '</div>';
        echo '<div style="margin-left: 500px; position: absolute; transform: translateX(100%); ">';
        echo '<p>' . $row['AR'] . ' Ft</p>';
        echo '</div>';
        echo '<form class="basketButton" method="post" action="kosar.php">';
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
