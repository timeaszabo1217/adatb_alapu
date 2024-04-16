<?php
$connection = null;
include 'menu.php';
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
<div class="menu">
    <ul>
        <li><a href="fiok_kezeles.php">Fiókok kezelése</a></li>
        <li><a href="konyvek_kezeles.php">Könyvek kezelése</a></li>
        <li><a href="aruhazak_kezeles.php">Áruházak kezelése</a></li>
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
                    <th>Utca</th>
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
            <input class="continueButton" type="submit" name="aruhaz_add" value="Hozzáadás" />
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
            <input class="continueButton" type="submit" name="aruhaz_modify" value="Módosítás" />
        </form>
    </div>
</main>
</body>
</html>
