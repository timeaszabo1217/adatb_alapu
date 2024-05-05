<?php
include 'menu.php';
?>

<?php

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit;
}
?>

<?php
$connection = null;
include 'process.php';

if (isset($_POST["aruhaz_delete"])) {
    $aruhaz_id = $_POST['aruhaz_delete'];
    $query = "DELETE FROM Aruhaz WHERE Aruhaz_id = :aruhaz_id";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':aruhaz_id', $aruhaz_id);
    oci_execute($stid);
    header("Location: aruhazak_kezeles.php");
    exit();
}

if (isset($_POST["aruhaz_add"])) {
    $iranyitoszam = $_POST["iranyitoszam_add"];
    $varos = $_POST["varos_add"];
    $utca = $_POST["utca_add"];
    $hazszam = $_POST["hazszam_add"];
    $dolgozok_szama = $_POST["dolgozok_szama_add"];

    $stid = oci_parse(database(),
        "INSERT INTO ARUHAZ (IRANYITOSZAM, VAROS, UTCA, HAZSZAM, DOLGOZOK_SZAMA)
         VALUES (:iranyitoszam, :varos, :utca, :hazszam, :dolgozok_szama)");

    oci_bind_by_name($stid, ":iranyitoszam", $iranyitoszam);
    oci_bind_by_name($stid, ":varos", $varos);
    oci_bind_by_name($stid, ":utca", $utca);
    oci_bind_by_name($stid, ":hazszam", $hazszam);
    oci_bind_by_name($stid, ":dolgozok_szama", $dolgozok_szama);

    oci_execute($stid);

    header("Location: aruhazak_kezeles.php");
}

if (isset($_POST["aruhaz_modify"])) {
    if (isset($_POST["aruhaz_id"])) {
        $aruhaz_id = $_POST["aruhaz_id"];
        $query = "UPDATE Aruhaz SET ";
        $update_values = array();

        if (!empty($_POST["iranyitoszam_modify"])) {
            $query .= "IRANYITOSZAM = :iranyitoszam, ";
            $update_values[':iranyitoszam'] = $_POST["iranyitoszam_modify"];
        }
        if (!empty($_POST["varos_modify"])) {
            $query .= "VAROS = :varos, ";
            $update_values[':varos'] = $_POST["varos_modify"];
        }
        if (!empty($_POST["utca_modify"])) {
            $query .= "UTCA = :utca, ";
            $update_values[':utca'] = $_POST["utca_modify"];
        }
        if (!empty($_POST["hazszam_modify"])) {
            $query .= "HAZSZAM = :hazszam, ";
            $update_values[':hazszam'] = $_POST["hazszam_modify"];
        }
        if (!empty($_POST["dolgozok_szama_modify"])) {
            $query .= "DOLGOZOK_SZAMA = :dolgozok_szama, ";
            $update_values[':dolgozok_szama'] = $_POST["dolgozok_szama_modify"];
        }

        $query = rtrim($query, ", ");
        $query .= " WHERE ARUHAZ_ID = :aruhaz_id";

        $stid = oci_parse(database(), $query);

        foreach ($update_values as $key => &$value) {
            oci_bind_by_name($stid, $key, $value);
        }
        oci_bind_by_name($stid, ':aruhaz_id', $aruhaz_id);
        oci_execute($stid);

        header("Location: aruhazak_kezeles.php");
        exit();
    }
}


if (isset($_POST["aruhaz_assign"])) {
    $konyv_id = $_POST["konyv_id"];
    $selected_genre = $_POST["aruhaz_id"];

    $insert_query = "INSERT INTO ARUHAZKONYV (aruhaz_id, konyv_id) VALUES (:aruhaz_id, :konyv_id)";
    $insert_stid = oci_parse(database(), $insert_query);
    oci_bind_by_name($insert_stid, ':aruhaz_id', $selected_genre);
    oci_bind_by_name($insert_stid, ':konyv_id', $konyv_id);
    oci_execute($insert_stid);

    header("Location: aruhazak_kezeles.php");
    exit();
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
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="fiok_kezeles.php">Fiókok
                kezelése</a></li>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="konyvek_kezeles.php">Könyvek
                kezelése</a></li>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="aruhazak_kezeles.php">Áruházak
                kezelése</a></li>
    </ul>
</div>
<main>
    <div class="book-form-container">
        <h2>Áruház törlése</h2>
        <form method="POST" action="aruhazak_kezeles.php" accept-charset="utf-8">
            <section>
                <table>
                    <thead>
                    <tr>
                        <th>Irányítószám</th>
                        <th>Város</th>
                        <th>Közterület</th>
                        <th>Házszám</th>
                        <th>Dolgozók száma</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Aruhaz";
                    $stid = oci_parse(database(), $query);
                    oci_execute($stid);
                    while ($row = oci_fetch_assoc($stid)) {
                        echo "<tr>";
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
        </form>
    </div>
    <div class="book-form-container">
        <h2>Áruház hozzáadása</h2>
        <form method="POST" action="aruhazak_kezeles.php" accept-charset="utf-8">
            <div class="input-container">
                <label for="iranyitoszam">Irányítószám:</label>
                <label>
                    <input type="text" name="iranyitoszam_add"/>
                </label>
                <label for="varos">Város:</label>
                <label>
                    <input type="text" name="varos_add"/>
                </label>
                <label for="utca">Utca:</label>
                <label>
                    <input type="text" name="utca_add"/>
                </label>
                <label for="hazszam">Házszám:</label>
                <label>
                    <input type="text" name="hazszam_add"/>
                </label>
                <label for="dolgozok_szama">Dolgozók száma:</label>
                <label>
                    <input type="text" name="dolgozok_szama_add"/>
                </label>
            </div>
            <input class="continueButton" type="submit" name="aruhaz_add" value="Hozzáadás"/>
        </form>
    </div>
    <div class="book-form-container">
        <h2>Áruház módosítása</h2>
        <form method="POST" action="aruhazak_kezeles.php" accept-charset="utf-8">
            <div class="select-container">
                <p>Válassz az áruházak listából, ha módosítani szeretnél:</p>
                <label>
                    <select name="aruhaz_id">
                        <?php
                        $stid = oci_parse(database(), 'SELECT ARUHAZ_ID, IRANYITOSZAM, VAROS, UTCA, HAZSZAM, DOLGOZOK_SZAMA FROM Aruhaz');
                        oci_execute($stid);
                        while (($row = oci_fetch_row($stid)) != false) {
                            echo '<option value="' . $row[0] . '">' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' - ' . $row[4] . ' - ' . $row[5] . '</option>';
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="input-container">
                <label for="iranyitoszam_modify">Irányítószám:</label>
                <label>
                    <input type="text" name="iranyitoszam_modify"/>
                </label>
                <label for="varos_modify">Város:</label>
                <label>
                    <input type="text" name="varos_modify"/>
                </label>
                <label for="utca_modify">Utca:</label>
                <label>
                    <input type="text" name="utca_modify"/>
                </label>
                <label for="hazszam_modify">Házszám:</label>
                <label>
                    <input type="text" name="hazszam_modify"/>
                </label>
                <label for="dolgozok_szama_modify">Dolgozók száma:</label>
                <label>
                    <input type="text" name="dolgozok_szama_modify"/>
                </label>
            </div>
            <input class="continueButton" type="submit" name="aruhaz_modify" value="Módosítás"/>
        </form>
    </div>

    <div class="book-form-container">
        <h2>Áruház hozzárendelés könyvhöz</h2>
        <div class="select-container">
            <form method="POST" action="aruhazak_kezeles.php" accept-charset="utf-8">
                <label for="konyv_id">Könyv:</label>
                <select name="konyv_id" id="konyv_id">
                    <?php
                    $stid = oci_parse(database(), 'SELECT KONYV_ID, NEV FROM Konyv');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<option value="' . $row['KONYV_ID'] . '">' . $row['KONYV_ID'] . ' - ' . $row['NEV'] . '</option>';
                    }
                    ?>

                </select>
                <label for="aruhaz_id">Áruház:</label>
                <select name="aruhaz_id" id="aruhaz_id">
                    <?php

                    $stid = oci_parse(database(), 'SELECT Aruhaz_id, Varos FROM Aruhaz');
                    oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                        echo '<option value="' . $row['ARUHAZ_ID'] . '">' . $row['VAROS'] . '</option>';
                    }
                    ?>
                </select>
                <input class="continueButton" type="submit" name="aruhaz_assign" value="Hozzárendelés">
            </form>
        </div>
    </div>

    <div class="book-form-container">
        <h2>Országos készlet könyvenként</h2>
        <table>
            <thead>
            <tr>
                <th>Könyv neve</th>
                <th>Összes példány</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = 'SELECT K.NEV AS Konyv_nev, COALESCE(SUM(AK.Keszlet), 0) AS Osszes_peldany
                      FROM Konyv K
                      LEFT JOIN AruhazKonyv AK ON K.Konyv_id = AK.Konyv_id
                      GROUP BY K.NEV';

            $stid = oci_parse(database(), $query);
            oci_execute($stid);

            while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) !== false) {
                echo '<tr>';
                echo '<td>' . $row['KONYV_NEV'] . '</td>';
                echo '<td>' . $row['OSSZES_PELDANY'] . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <style>
        #table {
            border-collapse: collapse;
            width: 100%;
        }

        .th{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            background-color: #f2f2f2;
        }



    </style>

    <div class="book-form-container">
        <h2>Áruházankénti választék</h2>
        <table id="table">
            <thead>
            <tr>
                <th class="th">Áruház</th>
                <th class="th" >Elérhető könyvek száma(különböző)</th>
                <th class="th">Könyvek címe</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query = 'SELECT A.Varos AS Varos, COUNT(*) AS Konyvek_szama, LISTAGG(K.Nev, \', \') WITHIN GROUP (ORDER BY K.Nev) AS Konyvek_nevei
                        FROM Konyv K
                        INNER JOIN AruhazKonyv AK ON K.Konyv_id = AK.Konyv_id
                        INNER JOIN Aruhaz A ON AK.Aruhaz_id = A.Aruhaz_id
                        GROUP BY A.Varos';


            $stid = oci_parse(database(), $query);
            oci_execute($stid);


            while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) !== false) {

                $konyvek = explode(',', $row['KONYVEK_NEVEI']);

                echo '<tr>';
                echo '<td class="th" >' . $row['VAROS'] . '</td>';
                echo '<td class="th">' . $row['KONYVEK_SZAMA'] . '</td>';
                echo '<td class="th">' . implode('<br>', $konyvek) . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>









</main>
</body>
</html>
