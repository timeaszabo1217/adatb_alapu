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

if (isset($_POST["fiok_delete"])) {
    $vasarlo_email = $_POST['fiok_delete'];
    $query = "DELETE FROM Vasarlo WHERE VASARLO_EMAIL = :vasarlo_email";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':VASARLO_EMAIL', $vasarlo_email);
    oci_execute($stid);
    header("Location: fiok_kezeles.php");
    exit();
}

if (isset($_POST["fiok_add"])) {
    $vasarlo_email = $_POST["email_add"];
    $varos = $_POST["varos_add"];
    $utca = $_POST["utca_add"];
    $hazszam = $_POST["hazszam_add"];
    $jelszo = $_POST["jelszo_add"];

    $stid = oci_parse(database(),
        "INSERT INTO ARUHAZ (IRANYITOSZAM, VAROS, UTCA, HAZSZAM, DOLGOZOK_SZAMA)
         VALUES (:iranyitoszam, :varos, :utca, :hazszam, :dolgozok_szama)");

    oci_bind_by_name($stid, ":iranyitoszam", $iranyitoszam);
    oci_bind_by_name($stid, ":varos", $varos);
    oci_bind_by_name($stid, ":utca", $utca);
    oci_bind_by_name($stid, ":hazszam", $hazszam);
    oci_bind_by_name($stid, ":dolgozok_szama", $dolgozok_szama);

    oci_execute($stid);

    header("Location: fiok_kezeles.php");
}

if (isset($_POST["fiok_modify"])) {
    if (isset($_POST["vasarlo_email"])) {
        $aruhaz_id = $_POST["vasarlo_email"];
        $query = "UPDATE Vasarlo SET ";
        $update_values = array();

        if (!empty($_POST["email_modify"])) {
            $query .= "VASARLO_EMAIL = :vasarlo_email, ";
            $update_values[':vasarlo_email'] = $_POST["email_modify"];
        }
            if (!empty($_POST["jelszo_modify"])) {
                $query .= "JELSZO = :jelszo, ";
                $update_values[':dolgozok_szama'] = $_POST["dolgozok_szama_modify"];
            }
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
        <h2>Vásárló törlése</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
        <section>
            <table>
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Jelszó</th>
                    <th>Irányítószám</th>
                    <th>Város</th>
                    <th>Utca</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM Vasarlo";
                $stid = oci_parse(database(), $query);
                oci_execute($stid);
                while ($row = oci_fetch_assoc($stid)) {
                    echo "<tr>";
                    echo "<td>" . $row['VASARLO_EMAIL'] . "</td>";
                    echo "<td>" . $row['JELSZO'] . "</td>";
                    echo "<td>" . $row['IRANYITOSZAM'] . "</td>";
                    echo "<td>" . $row['VAROS'] . "</td>";
                    echo "<td>" . $row['UTCA'] . "</td>";
                    echo "<td><button class='continueButton' type='submit' name='fiok_delete' value='" . $row['VASARLO_EMAIL'] . "'>Törlés</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </section>
        </form>
    </div>
    <div class="book-form-container">
        <h2>Vásárló hozzáadása</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <div class="input-container">
                <label for="email">Email cím:</label>
                <label>
                    <input type="text" name="email_add"/>
                </label>
                <label for="jelszo">Jelszó:</label>
                <label>
                    <input type="text" name="jelszo_add"/>
                </label>
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
            </div>
            <input class="continueButton" type="submit" name="fiok_add" value="Hozzáadás" />
        </form>
    </div>
    <div class="book-form-container">
        <h2>Vásárló módosítása</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <div class="select-container">
                <p>Válassz a vásárlók listából, ha módosítani szeretnél:</p>
                <label>
                    <select name="vasarlo_email">
                        <?php
                        $stid = oci_parse(database(), 'SELECT * FROM Vasarlo');
                        oci_execute($stid);
                        while (($row = oci_fetch_row($stid)) != false) {
                            echo '<option value="' . $row[0] . '">' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' - ' . $row[4] . '</option>';
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="input-container">
                <label for="email_modify">Email cím:</label>
                <label>
                    <input type="text" name="email_modify"/>
                </label>
                <label for="jelszo_modify">Jelszó:</label>
                <label>
                    <input type="text" name="jelszo_modify"/>
                </label>
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
            </div>
            <input class="continueButton" type="submit" name="fiok_modify" value="Módosítás" />
        </form>
    </div>
</main>
</body>
</html>
