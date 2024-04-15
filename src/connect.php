<?php
$connection = null;
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>𝐒𝐭𝐫𝐞𝐞𝐥𝐞𝐫</title>
</head>
<body>
<div class="container">
    <h1>Oracle adatbázis kapcsolódás</h1>

    <?php
    if ($connection) {
        echo "<p>Sikeresen csatlakozva az Oracle adatbázishoz.</p>";
    } else {
        $error = oci_error();
        echo "<p>Hiba a kapcsolódás során: " . $error['message'] . "</p>";
    }
    oci_close($connection);
    ?>

    <img src="assets/imgs/240-2401373_book-free-download-best-magic-spell-book-clipart-removebg-preview.png" alt="opened book graphic">

    <a href="index.php" class="continueButton">Tovább az oldalra</a>
</div>
</body>
</html>
