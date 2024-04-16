<?php
$connection = null;
include 'menu.php';
include 'process.php';

if (isset($_POST['konyv_delete'])) {
    $konyv_id = $_POST['konyv_delete'];
    $query = "DELETE FROM Konyv WHERE Konyv_id = :konyv_id";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':konyv_id', $konyv_id);
    oci_execute($stid);
    header("Location: admin.php");
    exit();
}

if (isset($_POST["konyv_add"])) {
    echo 'Hello';
    $nev = $_POST["nev"];
    $kiadas_eve = $_POST["kiadas_eve"];
    $kiado = $_POST["kiado"];
    $oldalszam = $_POST["oldalszam"];
    $meret = $_POST["meret"];
    $kotet = $_POST["kotet"];
    $ar = $_POST["ar"];
    $eladott_peldanyok_szama = $_POST["eladott_peldanyok_szama"];

    $stid = oci_parse(database(),
        "INSERT INTO KONYV (NEV, KIADAS_EVE, KIADO, OLDALSZAM, MERET, KOTET, AR, ELADOTT_PELDANYOK_SZAMA)
         VALUES (:nev, :kiadas_eve, :kiado, :oldalszam, :meret, :kotet, :ar, :eladott_peldanyok_szama)");

    oci_bind_by_name($stid, ":nev", $nev);
    oci_bind_by_name($stid, ":kiadas_eve", $kiadas_eve);
    oci_bind_by_name($stid, ":kiado", $kiado);
    oci_bind_by_name($stid, ":oldalszam", $oldalszam);
    oci_bind_by_name($stid, ":meret", $meret);
    oci_bind_by_name($stid, ":kotet", $kotet);
    oci_bind_by_name($stid, ":ar", $ar);
    oci_bind_by_name($stid, ":eladott_peldanyok_szama", $eladott_peldanyok_szama);

    oci_execute($stid);

    header("Location: admin.php");
}


if (isset($_POST["aruhaz_delete"])) {
    $aruhaz_id = $_POST['aruhaz_delete'];
    $query = "DELETE FROM Aruhaz WHERE Aruhaz_id = :aruhaz_id";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':aruhaz_id', $aruhaz_id);
    oci_execute($stid);
    header("Location: admin.php");
    exit();
}


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
<h1 style="text-align: center">Admin oldal</h1>

<main>
    <div class="book-form-container">
        <h2>Könyvek törlése</h2>
        <form method="POST" action="admin.php" accept-charset="utf-8">
        <section>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Kiadás éve</th>
                        <th>Kiadó</th>
                        <th>Oldalszám</th>
                        <th>Méret</th>
                        <th>Kötet</th>
                        <th>Ár</th>
                        <th>Eladott példányok száma</th>
                        <th>Törlés</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stid = oci_parse(database(), 'SELECT * FROM konyv');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<tr>';
                        echo '<td>' . $row['KONYV_ID'] . '</td>';
                        echo '<td>' . $row['NEV'] . '</td>';
                        echo '<td>' . $row['KIADAS_EVE'] . '</td>';
                        echo '<td>' . $row['KIADO'] . '</td>';
                        echo '<td>' . $row['OLDALSZAM'] . '</td>';
                        echo '<td>' . $row['MERET'] . '</td>';
                        echo '<td>' . $row['KOTET'] . '</td>';
                        echo '<td>' . $row['AR'] . '</td>';
                        echo '<td>' . $row['ELADOTT_PELDANYOK_SZAMA'] . '</td>';
                        echo "<td><button class='continueButton' type='submit' name='konyv_delete' value='" . $row['KONYV_ID'] . "'>Törlés</button></td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
        </form>
    </div>
    <div class="book-form-container">
        <h2>Könyv hozzáadása, módosítása</h2>
        <form method="POST" action="admin.php" accept-charset="utf-8">
            <div class="select-container">
                <p>Válassz a könyv listából, ha módosítani szeretnél:</p>
                <label>
                    <select name="konyv_id">
                        <?php
                        $stid = oci_parse(database(), 'SELECT KONYV_ID, NEV, KIADAS_EVE, KIADO, OLDALSZAM, MERET, KOTET, AR, ELADOTT_PELDANYOK_SZAMA FROM Konyv');
                        oci_execute($stid);
                        while (($row = oci_fetch_row($stid)) != false) {
                            echo '<option value="' . $row[0] . '">' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' - ' . $row[4] . ' - ' . $row[5] . ' - ' . $row[6] . '- ' . $row[7] . '- ' . $row[8] . '</option>';
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="input-container">
                <label for="nev">Név:</label>
                <input type="text" name="nev" id="nev" />
                <label for="kiadas_eve">Kiadás éve:</label>
                <input type="number" name="kiadas_eve" id="kiadas_eve" />
                <label for="kiado">Kiadó:</label>
                <input type="text" name="kiado" id="kiado" />
                <label for="oldalszam">Oldalszám:</label>
                <input type="number" name="oldalszam" id="oldalszam" />
                <label for="meret">Méret:</label>
                <input type="text" name="meret" id="meret" />
                <label for="kotet">Kötet:</label>
                <input type="number" name="kotet" id="kotet" />
                <label for="ar">Ár:</label>
                <input type="number" name="ar" id="ar" />
                <label for="eladott_peldanyok_szama">Eladott példányok száma:</label>
                <input type="number" name="eladott_peldanyok_szama" id="eladott_peldanyok_szama" />
            </div>
            <input class="continueButton" type="submit" name="konyv_add" value="Hozzáadás" />
            <input class="continueButton" type="submit" name="konyv_modify" value="Módosítás" />
        </form>
    </div>
    <div class="book-form-container">
    <h2>Áruház törlése</h2>
    <section>
        <table>
            <thead>
            <tr>
                <th>Aruház ID</th>
                <th>Irányítószám</th>
                <th>Város</th>
                <th>Utca</th>
                <th>Házszám</th>
                <th>Dolgozók száma</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM Aruhaz";
            $stid = oci_parse(database(), $query);
            oci_execute($stid);
            while ($row = oci_fetch_assoc($stid)) {
                echo "<tr>";
                echo "<td>" . $row['ARUHAZ_ID'] . "</td>";
                echo "<td>" . $row['IRANYITOSZAM'] . "</td>";
                echo "<td>" . $row['VAROS'] . "</td>";
                echo "<td>" . $row['UTCA'] . "</td>";
                echo "<td>" . $row['HAZSZAM'] . "</td>";
                echo "<td>" . $row['DOLGOZOK_SZAMA'] . "</td>";
                echo "<td><form method='POST'><button class='continueButton' type='submit' name='aruhaz_delete' value='" . $row['ARUHAZ_ID'] . "'>Törlés</button></form></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </section>
    </div>
</main>
</body>
</html>
