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
<div class="sidebar">

</div>
<h1>Könyvek</h1>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div class="book-form-container books-container">
    <?php
    $query = 'SELECT K.NEV, K.AR, KS.SZERZO FROM Konyv K INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id';
    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    while ($row = oci_fetch_assoc($stid)) {
        echo '<div style="display: flex; align-items: center;">';
        echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '<div style="margin-left: 10px;">';
        echo '<p>Cím: ' . $row['NEV'] . '</p>';
        echo '<p>Szerző: ' . $row['SZERZO'] . '</p>';
        echo '<p>Ár: ' . $row['AR'] . ' Ft</p>';
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
