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

    $query = "SELECT Ertesites, Konyv.Nev AS KonyvCime, Aruhaz.Varos AS AruhazVaros
          FROM AruhazKonyv
          INNER JOIN Konyv ON AruhazKonyv.Konyv_id = Konyv.Konyv_id
          INNER JOIN Aruhaz ON AruhazKonyv.Aruhaz_id = Aruhaz.Aruhaz_id
          WHERE Ertesites IS NOT NULL";

    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    if (oci_fetch($stid)) {
        echo '<div>';
        echo '<h2 style="margin-left: 60px;">Értesítések</h2>';
        echo '<ul>';

        do {
            $ertesites = oci_result($stid, 'ERTESITES');
            $konyvCime = oci_result($stid, 'KONYVCIME');
            $aruhazVaros = oci_result($stid, 'ARUHAZVAROS');
            echo '<li style="margin-left: 60px; list-style: none;"><p>Figyelmeztetés, ebből a könyvből: ' . $konyvCime . ', ebben az áruházban: ' . $aruhazVaros . '            ' . $ertesites . '</p></li>';
        } while (oci_fetch($stid));
        echo '</ul>';
        echo '</div>';
    } else {
        echo '<p style="margin-left: 60px;">Nincs új értesítés.</p>';
    }
    oci_free_statement($stid);
    ?>
</div>
</body>
</html>
