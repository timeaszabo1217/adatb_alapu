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
<div class="sidebar">
    <?php include 'sidebar.php'; ?>
</div>
<h1>Könyvek</h1>

<?php
$query = 'SELECT K.NEV, K.AR, KS.SZERZO FROM Konyv K INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id';
$stid = oci_parse(database(), $query);
oci_execute($stid);

while ($row = oci_fetch_assoc($stid)) {
    echo '<div>';
    echo '<p>Cím: ' . $row['NEV'] . ', Szerző: ' . $row['SZERZO'] . ', Ár: ' . $row['AR'] . ' Ft</p>';
    echo '<form method="post" action="kosar.php">';
    echo '<input type="hidden" name="book_title" value="' . $row['NEV'] . '">';
    echo '<input type="hidden" name="book_price" value="' . $row['AR'] . '">';
    echo '<input type="submit" value="Kosárba">';
    echo '</form>';
    echo '</div>';
}

oci_free_statement($stid);
oci_close($connection);
?>
</body>
</html>
