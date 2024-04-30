<?php
include 'menu.php';
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
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: none;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['book_id']) && !empty($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $query = "SELECT K.KONYV_ID, K.NEV, K.KIADAS_EVE, K.KIADO, K.OLDALSZAM, K.MERET, K.KOTET, K.AR, K.ELADOTT_PELDANYOK_SZAMA,
              KS.SZERZO, M.MUFAJ_MEGNEVEZES 
              FROM Konyv K 
              INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id 
              INNER JOIN KonyvMufaj KM ON K.Konyv_id = KM.Konyv_id 
              INNER JOIN Mufaj M ON KM.Mufaj_megnevezes = M.Mufaj_megnevezes
              WHERE K.KONYV_ID = :book_id";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':book_id', $book_id);
    oci_execute($stid);

    if ($row = oci_fetch_assoc($stid)) {
        echo '<h1>Könyv adatlapja</h1>';
        echo '<img class="line user-select-none" src="assets/imgs/line1.png" alt="Választó vonal" style="margin-bottom: 0;">';
        echo '<div style="display: flex;">';
        echo '<img id="borito-adatlap" class="user-select-none" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '<div style="margin-left: 60px; margin-top: 60px;">';
        echo '<p>' . $row['SZERZO'] . '</p>';
        echo '<h2>' . $row['NEV'] . '</h2>';
        echo '<p style="margin-bottom: 50px;">' . $row['KIADO'] . ' | ' . $row['KIADAS_EVE'] . ' | ' . $row['OLDALSZAM'] . '</p>';
        echo '<table>';
        echo '<tr><td><strong>Szerző</strong></td><td><p style="margin: 0">' . $row['SZERZO'] . '</p></td></tr>';
        echo '<tr><td><strong>Cím</strong></td><td><p style="margin: 0">' . $row['NEV'] . '</p></td></tr>';
        echo '<tr><td><strong>Kiadó</strong></td><td><p style="margin: 0">' . $row['KIADO'] . '</p></td></tr>';
        echo '<tr><td><strong>Kiadás éve</strong></td><td><p style="margin: 0">' . $row['KIADAS_EVE'] . '</p></td></tr>';
        echo '<tr><td><strong>Oldalszám</strong></td><td><p style="margin: 0">' . $row['OLDALSZAM'] . '</p></td></tr>';
        echo '<tr><td><strong>Méret</strong></td><td><p style="margin: 0">' . $row['MERET'] . '</p></td></tr>';
        echo '<tr><td><strong>Kötet</strong></td><td><p style="margin: 0">' . $row['KOTET'] . '</p></td></tr>';
        echo '<tr><td><strong>Műfaj</strong></td><td><p style="margin: 0">' . $row['MUFAJ_MEGNEVEZES'] . '</p></td></tr>';
        echo '<tr><td><strong>Eladott példányok száma</strong></td><td><p style="margin: 0">' . $row['ELADOTT_PELDANYOK_SZAMA'] . '</p></td></tr>';
        echo '</table>';
        echo '</div>';
        echo '<div style="display: flex; position: relative; margin-top: 100px; left: 700px; text-align: center;">';
        echo '<form class="basketButton" method="post" action="kosar.php">';
        echo '<h2>' . $row['AR'] . ' Ft</h2>';
        echo '<input type="hidden" name="book_title" value="' . $row['NEV'] . '">';
        echo '<input type="hidden" name="book_price" value="' . $row['AR'] . '">';
        echo '<input class="continueButton" type="submit" value="Kosárba">';
        echo '<a href="keszlet.php?book_id=' . $row['KONYV_ID'] . '">' . 'Készletinformáció' . '</a>';
        echo '<table style="text-align: left; margin-top: 30px;">';
        echo '<tr><td><strong>Személyes átvétel</strong></td></tr>';
        echo '<tr><td><strong>2-3 nap</strong></td></tr>';
        echo '<tr><td><p style="margin: 0">Ingyenes</p></td></tr>';
        echo '<tr><td><strong>Házhoz szállítás</strong></td></tr>';
        echo '<tr><td><strong>4-5 nap</strong></td></tr>';
        echo '<tr><td><p style="margin: 0">1200 Ft</p></td></tr>';
        echo '</table>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>A könyv adatai nem találhatók.</p>';
    }
    oci_free_statement($stid);
} else {
    echo '<p>Nincs megadva könyv azonosító.</p>';
}
oci_close(database());
?>
</body>
</html>
