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

        p {
            margin: 0;
        }

        a {
            font-family: 'Roboto Light', sans-serif;
            font-weight: lighter;
            text-decoration: 1px underline #546248;
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['book_id']) && !empty($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $query = "SELECT K.KONYV_ID, K.NEV, K.KIADAS_EVE, K.KIADO, K.OLDALSZAM,
              KS.SZERZO, A.ARUHAZ_ID, A.IRANYITOSZAM, A.VAROS, A.UTCA, A.HAZSZAM, 
              A.DOLGOZOK_SZAMA , AK.ARUHAZ_ID, AK.KONYV_ID, AK.KESZLET, COUNT(A.ARUHAZ_ID) OVER () AS ARUHAZAK_SZAMA
              FROM Konyv K
              INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id 
              LEFT JOIN AruhazKonyv AK ON K.KONYV_ID = AK.KONYV_ID
              INNER JOIN Aruhaz A ON A.Aruhaz_id = AK.Aruhaz_id 
              WHERE K.KONYV_ID = :book_id
              GROUP BY K.KONYV_ID, K.NEV, K.KIADAS_EVE, K.KIADO, K.OLDALSZAM, KS.SZERZO, A.ARUHAZ_ID, 
                       A.IRANYITOSZAM, A.VAROS, A.UTCA, A.HAZSZAM, A.DOLGOZOK_SZAMA , AK.ARUHAZ_ID, AK.KONYV_ID, AK.KESZLET";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':book_id', $book_id);
    oci_execute($stid);

    if ($row = oci_fetch_assoc($stid)) {
        echo '<h1>Bolti készletinformáció</h1>';
        echo '<img class="line user-select-none" src="assets/imgs/line1.png" alt="Választó vonal" style="margin-bottom: 0;">';
        echo '<a href="adatlap.php?book_id=' . $row['KONYV_ID'] . '" style="margin-left: 60px; text-decoration: none" ">↶ Vissza a könyv adatlapjára</a>';
        echo '<div style="display: flex; margin-bottom: 50px;">';
        echo '<div style="margin-left: 60px; margin-top: 80px;">';
        $szerzo_google_keres = str_replace(' ', '+', $row['SZERZO']);
        echo '<p><a href="https://www.google.com/search?q=' . $szerzo_google_keres . '" target="_blank">' . $row['SZERZO'] . '</a></p>';
        echo '<h2>' . $row['NEV'] . '</h2>';
        $kiado_google_keres = str_replace(' ', '+', $row['KIADO']);
        echo '<p style="margin-bottom: 50px;"><a href="https://www.google.com/search?q=' . $kiado_google_keres . '" target="_blank">' . $row['KIADO'] . '</a> | ' . $row['KIADAS_EVE'] . ' | ' . $row['OLDALSZAM'] . '</p>';
        echo '<h3>Ez a könyv ' . $row['ARUHAZAK_SZAMA'] . ' áruházban található meg:</h3>';
        do {
            echo '<h3>Áruház információ:</h3>';
            echo '<p>Cím: ' . $row['IRANYITOSZAM'] . ' ' . $row['VAROS'] . ' ' . $row['UTCA'] . ' ' . $row['HAZSZAM'] . '</p>';
            echo '<p>Dolgozók száma: ' . $row['DOLGOZOK_SZAMA'] . '</p>';
            echo '<p>Készlet: ' . $row['KESZLET'] . '</p>';
        } while ($row = oci_fetch_assoc($stid));
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p style="margin: 20px 50px;">A könyv nem található egy áruházban sem.</p>';
    }
    oci_free_statement($stid);
} else {
    echo '<p style="margin: 20px 50px;">Nincs megadva könyv azonosító.</p>';
}
oci_close(database());
?>
</body>
</html>
