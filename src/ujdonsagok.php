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
<h1>Újdonságok</h1>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div style="margin-left: 40px; margin-top: 20px; display: flex; flex-wrap: wrap; justify-content: left;">
    <?php
    $query = 'SELECT K.KONYV_ID, K.NEV, K.AR, KS.SZERZO FROM Konyv K INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id ORDER BY K.Konyv_id DESC FETCH FIRST 12 ROWS ONLY';
    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    while ($row = oci_fetch_assoc($stid)) {
        echo '<div style="width: 150px; margin: 0 15px 20px; text-align: center;">';
        echo '<a href="adatlap.php?book_id=' . $row['KONYV_ID'] . '">';
        echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '</a>';
        echo '<a style="height: 60px; display: block; margin-bottom: 5px;" href="adatlap.php?book_id=' . $row['KONYV_ID'] . '">' . $row['NEV'] . '</a>';
        echo '<p style="height: 20px; margin-bottom: 5px;">' . $row['SZERZO'] . '</p>';
        echo '<p style="height: 5px; margin-bottom: 5px;">_________________</p>';
        echo '<p>' . $row['AR'] . ' Ft</p>';
        echo '<form method="post" action="kosar.php">';
        echo '<input type="hidden" name="book_id" value="' . $row['KONYV_ID'] . '">';
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