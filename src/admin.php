<?php
include 'menu.php';
include 'process.php';
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
<div>
    <?php
    // Lekérdezés az értesítésekhez, ahol az értesítés nem null
    $query = "SELECT Ertesites, Konyv.Nev AS KonyvCime, Aruhaz.Varos AS AruhazVaros
          FROM AruhazKonyv
          INNER JOIN Konyv ON AruhazKonyv.Konyv_id = Konyv.Konyv_id
          INNER JOIN Aruhaz ON AruhazKonyv.Aruhaz_id = Aruhaz.Aruhaz_id
          WHERE Ertesites IS NOT NULL";

    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    // Ellenőrizze, hogy van-e értesítés
    if (oci_fetch($stid)) {
        echo '<div>';
        echo '<h2>Értesítések</h2>';
        echo '<ul>';
        // Az összes értesítés kiírása
        do {
            $ertesites = oci_result($stid, 'ERTESITES');
            $konyvCime = oci_result($stid, 'KONYVCIME');
            $aruhazVaros = oci_result($stid, 'ARUHAZVAROS');
            echo '<li>Figyelmeztetés, ebből a könyvből: ' . $konyvCime . ', ebben az áruházban: ' . $aruhazVaros . '            ' . $ertesites . '</li>';
        } while (oci_fetch($stid));
        echo '</ul>';
        echo '</div>';
    } else {
        // Ha nincs értesítés
        echo '<div>Nincs új értesítés.</div>';
    }


    // Szabadítsd fel az erőforrásokat
    oci_free_statement($stid);
    ?>


</div>
</body>
</html>
