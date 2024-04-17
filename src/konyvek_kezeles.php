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
    header("Location: konyvek_kezeles.php");
    exit();
}

if (isset($_POST["konyv_add"])) {
    $nev = $_POST["nev_add"];
    $kiadas_eve = $_POST["kiadas_eve_add"];
    $kiado = $_POST["kiado_add"];
    $oldalszam = $_POST["oldalszam_add"];
    $meret = $_POST["meret_add"];
    $kotet = $_POST["kotet_add"];
    $ar = $_POST["ar_add"];
    $eladott_peldanyok_szama = $_POST["eladott_peldanyok_szama_add"];

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

    header("Location: konyvek_kezeles.php");
}

if (isset($_POST["konyv_modify"])) {
    if (isset($_POST["konyv_id"])) {
        $konyv_id = $_POST["konyv_id"];
        $query = "UPDATE Konyv SET ";
        $update_values = array();

        if (!empty($_POST["nev_modify"])) {
            $query .= "NEV = :nev, ";
            $update_values[':nev'] = $_POST["nev_modify"];
        }
        if (!empty($_POST["kiadas_eve_modify"])) {
            $query .= "KIADAS_EVE = :kiadas_eve, ";
            $update_values[':kiadas_eve'] = $_POST["kiadas_eve_modify"];
        }
        if (!empty($_POST["kiado_modify"])) {
            $query .= "KIADO = :kiado, ";
            $update_values[':kiado'] = $_POST["kiado_modify"];
        }
        if (!empty($_POST["oldalszam_modify"])) {
            $query .= "OLDALSZAM = :oldalszam, ";
            $update_values[':oldalszam'] = $_POST["oldalszam_modify"];
        }
        if (!empty($_POST["meret_modify"])) {
            $query .= "MERET = :meret, ";
            $update_values[':meret'] = $_POST["meret_modify"];
        }
        if (!empty($_POST["kotet_modify"])) {
            $query .= "KOTET = :kotet, ";
            $update_values[':kotet'] = $_POST["kotet_modify"];
        }
        if (!empty($_POST["ar_modify"])) {
            $query .= "AR = :ar, ";
            $update_values[':ar'] = $_POST["ar_modify"];
        }
        if (!empty($_POST["eladott_peldanyok_szama_modify"])) {
            $query .= "ELADOTT_PELDANYOK_SZAMA = :eladott_peldanyok_szama, ";
            $update_values[':eladott_peldanyok_szama'] = $_POST["eladott_peldanyok_szama_modify"];
        }
        $query = rtrim($query, ", ");

        $query .= " WHERE Konyv_id = :konyv_id";

        $stid = oci_parse(database(), $query);

        foreach ($update_values as $key => &$value) {
            oci_bind_by_name($stid, $key, $value);
        }
        oci_bind_by_name($stid, ':konyv_id', $konyv_id);
        oci_execute($stid);

        header("Location: konyvek_kezeles.php");
        exit();
    }
}

if (isset($_POST["mufaj_assign"])) {
    $konyv_id = $_POST["konyv_id"];
    $selected_genre = $_POST["mufaj_megnevezes"];

    $check_query = "SELECT COUNT(*) FROM KonyvMufaj WHERE Konyv_id = :konyv_id";
    $check_stid = oci_parse(database(), $check_query);
    oci_bind_by_name($check_stid, ':konyv_id', $konyv_id);
    oci_execute($check_stid);
    $count = oci_fetch_row($check_stid)[0];

    if ($count == 0) {
        $insert_query = "INSERT INTO KonyvMufaj (Konyv_id, Mufaj_megnevezes) VALUES (:konyv_id, :mufaj_megnevezes)";
        $insert_stid = oci_parse(database(), $insert_query);
        oci_bind_by_name($insert_stid, ':konyv_id', $konyv_id);
        oci_bind_by_name($insert_stid, ':mufaj_megnevezes', $selected_genre);
        oci_execute($insert_stid);
    } else {
        $update_query = "UPDATE KonyvMufaj SET Mufaj_megnevezes = :mufaj_megnevezes WHERE Konyv_id = :konyv_id";
        $update_stid = oci_parse(database(), $update_query);
        oci_bind_by_name($update_stid, ':konyv_id', $konyv_id);
        oci_bind_by_name($update_stid, ':mufaj_megnevezes', $selected_genre);
        oci_execute($update_stid);
    }

    header("Location: konyvek_kezeles.php");
    exit();
}

if (isset($_POST["mufaj_add"])) {
    $new_genre = $_POST["mufaj"];

    $check_query = "SELECT COUNT(*) FROM Mufaj WHERE Mufaj_megnevezes = :new_genre";
    $check_stid = oci_parse(database(), $check_query);
    oci_bind_by_name($check_stid, ':new_genre', $new_genre);
    oci_execute($check_stid);
    $count = oci_fetch_row($check_stid)[0];

    if ($count == 0) {
        $insert_query = "INSERT INTO Mufaj (Mufaj_megnevezes) VALUES (:new_genre)";
        $insert_stid = oci_parse(database(), $insert_query);
        oci_bind_by_name($insert_stid, ':new_genre', $new_genre);
    }
}

if (isset($_POST['mufaj_delete'])) {
    $mufaj = $_POST['mufaj_delete'];

    $query_konyvmufaj = "DELETE FROM KonyvMufaj WHERE Mufaj_megnevezes = :mufaj";
    $stid_konyvmufaj = oci_parse(database(), $query_konyvmufaj);
    oci_bind_by_name($stid_konyvmufaj, ':mufaj', $mufaj);
    oci_execute($stid_konyvmufaj);

    $query_mufaj = "DELETE FROM Mufaj WHERE Mufaj_megnevezes = :mufaj";
    $stid_mufaj = oci_parse(database(), $query_mufaj);
    oci_bind_by_name($stid_mufaj, ':mufaj', $mufaj);
    oci_execute($stid_mufaj);

    header("Location: konyvek_kezeles.php");
    exit();
}

if (isset($_POST["almufaj_assign"])) {
    $mufaj_megnevezes = $_POST["mufaj_megnevezes"];
    $new_almufaj = $_POST["new_almufaj"];

    $check_query = "SELECT COUNT(*) FROM Almufaj WHERE Mufaj_megnevezes = :mufaj_megnevezes AND Almufaj_megnevezes = :new_almufaj";
    $check_stid = oci_parse(database(), $check_query);
    oci_bind_by_name($check_stid, ':mufaj_megnevezes', $mufaj_megnevezes);
    oci_bind_by_name($check_stid, ':new_almufaj', $new_almufaj);
    oci_execute($check_stid);
    $count = oci_fetch_row($check_stid)[0];

    if ($count == 0) {
        $insert_query = "INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES (:mufaj_megnevezes, :new_almufaj)";
        $insert_stid = oci_parse(database(), $insert_query);
        oci_bind_by_name($insert_stid, ':mufaj_megnevezes', $mufaj_megnevezes);
        oci_bind_by_name($insert_stid, ':new_almufaj', $new_almufaj);
        oci_execute($insert_stid);
        header("Location: konyvek_kezeles.php");
        exit();
    }
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
        <li><a href="fiok_kezeles.php">Fiókok kezelése</a></li>
        <li><a href="konyvek_kezeles.php">Könyvek kezelése</a></li>
        <li><a href="aruhazak_kezeles.php">Áruházak kezelése</a></li>
    </ul>
</div>
<main>
    <div class="book-form-container">
        <h2>Könyvek törlése</h2>
        <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
            <section>
                <table>
                    <thead>
                    <tr>
                        <th>Név</th>
                        <th>Kiadás éve</th>
                        <th>Kiadó</th>
                        <th>Oldalszám</th>
                        <th>Méret</th>
                        <th>Kötet</th>
                        <th>Ár</th>
                        <th>Eladott példányok száma</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stid = oci_parse(database(), 'SELECT * FROM konyv');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<tr>';
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
        <h2>Könyv hozzáadása</h2>
        <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
            <div class="input-container">
                <label for="nev">Név:</label>
                <label>
                    <input type="text" name="nev_add"/>
                </label>
                <label for="kiadas_eve">Kiadás éve:</label>
                <label>
                    <input type="number" name="kiadas_eve_add"/>
                </label>
                <label for="kiado">Kiadó:</label>
                <label>
                    <input type="text" name="kiado_add"/>
                </label>
                <label for="oldalszam">Oldalszám:</label>
                <label>
                    <input type="number" name="oldalszam_add"/>
                </label>
                <label for="meret">Méret:</label>
                <label>
                    <input type="text" name="meret_add"/>
                </label>
                <label for="kotet">Kötet:</label>
                <label>
                    <input type="number" name="kotet_add"/>
                </label>
                <label for="ar">Ár:</label>
                <label>
                    <input type="number" name="ar"/>
                </label>
                <label for="eladott_peldanyok_szama">Eladott példányok száma:</label>
                <label>
                    <input type="number" name="eladott_peldanyok_szama_add"/>
                </label>
            </div>
            <input class="continueButton" type="submit" name="konyv_add" value="Hozzáadás" />
        </form>
    </div>
    <div class="book-form-container">
        <h2>Könyv módosítása</h2>
        <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
            <div class="select-container">
                <p>Válasszd ki a módosítani szánt könyvet a listából:</p>
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
                <label>
                    <input type="text" name="nev_modify"/>
                </label>
                <label for="kiadas_eve">Kiadás éve:</label>
                <label>
                    <input type="number" name="kiadas_eve_modify"/>
                </label>
                <label for="kiado">Kiadó:</label>
                <label>
                    <input type="text" name="kiado_modify"/>
                </label>
                <label for="oldalszam">Oldalszám:</label>
                <label>
                    <input type="number" name="oldalszam_modify"/>
                </label>
                <label for="meret">Méret:</label>
                <label>
                    <input type="text" name="meret_modify"/>
                </label>
                <label for="kotet">Kötet:</label>
                <label>
                    <input type="number" name="kotet_modify"/>
                </label>
                <label for="ar">Ár:</label>
                <label>
                    <input type="number" name="ar_modify"/>
                </label>
                <label for="eladott_peldanyok_szama">Eladott példányok száma:</label>
                <label>
                    <input type="number" name="eladott_peldanyok_szama_modify"/>
                </label>
            </div>
            <input class="continueButton" type="submit" name="konyv_modify" value="Módosítás" />
        </form>
    </div>
    <div class="book-form-container">
        <h2>Műfaj hozzárendelés könyvhöz</h2>
        <div class="select-container">
            <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
                <label for="konyv_id">Könyv:</label>
                <select name="konyv_id" id="konyv_id">
                    <?php
                    $stid = oci_parse(database(), 'SELECT KONYV_ID, NEV FROM Konyv');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<option value="' . $row['KONYV_ID'] . '">' . $row['NEV'] . '</option>';
                    }
                    ?>
                </select>
                <label for="mufaj">Műfaj:</label>
                <select name="mufaj_megnevezes" id="mufaj">
                    <?php
                    $stid = oci_parse(database(), 'SELECT MUFAJ_MEGNEVEZES FROM Mufaj');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<option value="' . $row['MUFAJ_MEGNEVEZES'] .'">' . $row['MUFAJ_MEGNEVEZES'] . '</option>';
                    }
                    ?>
                </select>
                <input class="continueButton" type="submit" name="mufaj_assign" value="Hozzárendelés">
            </form>
        </div>
    </div>
    <div class="book-form-container">
        <h2>Műfaj törlése</h2>
        <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
            <table>
                <thead>
                <tr>
                    <th>Műfaj megnevezés</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $stid = oci_parse(database(), 'SELECT * FROM Mufaj');
                oci_execute($stid);
                while (($row = oci_fetch_assoc($stid)) != false) {
                    echo '<tr>';
                    echo '<td>' . $row['MUFAJ_MEGNEVEZES'] . '</td>';
                    echo "<td><button class='continueButton' type='submit' name='mufaj_delete' value='" . $row['MUFAJ_MEGNEVEZES'] . "'>Törlés</button></td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </form>
    </div>
    <div class="book-form-container">
        <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
            <h2>Műfaj hozzáadása</h2>
            <label for="mufaj">Műfaj neve:</label>
            <label>
                <input type="text" name="mufaj">
            </label>
            <input class="continueButton" type="submit" name="mufaj_add" value="Hozzáadás">
        </form>
    </div>
    <div class="book-form-container">
        <h2>Alműfaj hozzárendelése</h2>
        <form method="POST" action="konyvek_kezeles.php" accept-charset="utf-8">
            <div class="input-container">
                <label for="mufaj">Válasszd ki a fő műfajt:</label>
                <select name="mufaj_megnevezes" id="mufaj">
                    <?php
                    $stid = oci_parse(database(), 'SELECT Mufaj_megnevezes FROM Mufaj');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<option value="' . $row['MUFAJ_MEGNEVEZES'] . '">' . $row['MUFAJ_MEGNEVEZES'] . '</option>';
                    }
                    ?>
                </select>
                <label for="new_almufaj">Új alműfaj megadása:</label>
                <input type="text" name="new_almufaj" id="new_almufaj">
            </div>
            <input class="continueButton" type="submit" name="almufaj_assign" value="Hozzárendelés">
        </form>
    </div>
</main>
</body>
</html>
