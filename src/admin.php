<?php
$connection = null;
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
<div class="menu-container">
    <img id="logo" src="assets/imgs/Streeler-removebg-preview.png" alt="logo">
    <form action="kereses.php" method="GET" class="search-form">
        <input type="text" name="kereses" class="search-input" placeholder="Keresés...">
        <button type="submit" class="search-button">
            <img class="icon" src="assets/imgs/search-removebg-preview.png" alt="Keresés">
        </button>
    </form>
    <div class="login-menu">
        <a href="logout.php">Kijelentkezés</a>
    </div>
</div>
<nav>
    <a href="konyvek.php" class="nav-link">Könyvek</a>
    <a href="sikerlista.php" class="nav-link">Sikerlista</a>
    <a href="ujdonsagok.php" class="nav-link">Újdonságok</a>
    <a href="akciok.php" class="nav-link">Akciók</a>
    <a href="informaciok.php" class="nav-link">Információk</a>
</nav>
<h1 style="text-align: center">Admin oldal</h1>

<main>
    <h2>Könyvek</h2>
    <form method="POST" action="admin.php" accept-charset="utf-8">

        <section>
            <div class="tablazat">
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
                        echo "<td><button type='submit' name='konyv_delete' value='" . $row['KONYV_ID'] . "'>Törlés</button></td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
    </form>


    <div>
        <br><br>
        <strong>Könyv hozzáadása, módosítása</strong>
        <form method="POST" action="admin.php" accept-charset="utf-8">
            <br>
            <label>Válassz a könyv listából, ha módosítani szeretnél:</label>
            <select name="konyv_id">
                <?php
                $stid = oci_parse(database(), 'SELECT KONYV_ID, NEV, KIADAS_EVE, KIADO, OLDALSZAM, MERET, KOTET, AR, ELADOTT_PELDANYOK_SZAMA FROM Konyv');
                oci_execute($stid);
                while (($row = oci_fetch_row($stid)) != false) {
                    echo '<option value="' . $row[0] . '">' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' - ' . $row[4] . ' - ' . $row[5] . ' - ' . $row[6] . '- ' . $row[7] . '- ' . $row[8] . '</option>';
                }
                ?>
            </select>
            <label>Név:</label>
            <input type="text" name="nev"/>
            <label>Kiadás éve:</label>
            <input type="number" name="kiadas_eve"/>
            <label>Kiadó:</label>
            <input type="text" name="kiado"/>
            <label>Oldalszám:</label>
            <input type="number" name="oldalszam"/>
            <label>Méret:</label>
            <input type="text" name="meret"/>
            <label>Kötet:</label>
            <input type="number" name="kotet"/>
            <label>Ár:</label>
            <input type="number" name="ar"/>
            <label>Eladott példányok száma:</label>
            <input type="number" name="eladott_peldanyok_szama"/>

            <input type="submit" name="konyv_add" value="Elküld" />
            <input type="submit" name="konyv_modify" value="Könyv módosítása"/>
        </form>
    </div>

    </section>

    <h2>Áruház adatok</h2>
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
                echo "<td><form method='POST'><button type='submit' name='aruhaz_delete' value='" . $row['ARUHAZ_ID'] . "'>Törlés</button></form></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </section>


</main>
</body>
</html>
