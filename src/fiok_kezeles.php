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

if (isset($_POST["admin_delete"])) {
    $admin_email = $_POST['admin_delete'];
    $query = "DELETE FROM Admin WHERE ADMIN_EMAIL = :admin_email";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':ADMIN_EMAIL', $admin_email);
    oci_execute($stid);
    header("Location: fiok_kezeles.php");
    exit();
}

if (isset($_POST["fiok_add"])) {
    $vasarlo_email = $_POST["email_add"];
    $jelszo = $_POST["jelszo_add"];
    $iranyitoszam = $_POST["iranyitoszam_add"];
    $varos = $_POST["varos_add"];
    $utca = $_POST["utca_add"];
    $megjegyzes = $_POST["megjegyzes_add"];


    $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);

    $stid = oci_parse(database(),
        "INSERT INTO VASARLO (VASARLO_EMAIL, JELSZO, IRANYITOSZAM, VAROS, UTCA, MEGJEGYZES)
         VALUES (:vasarlo_email, :jelszo, :iranyitoszam, :varos, :utca, :megjegyzes)");

    oci_bind_by_name($stid, ":vasarlo_email", $vasarlo_email);
    oci_bind_by_name($stid, ":jelszo", $jelszo);
    oci_bind_by_name($stid, ":iranyitoszam", $iranyitoszam);
    oci_bind_by_name($stid, ":varos", $varos);
    oci_bind_by_name($stid, ":utca", $utca);
    oci_bind_by_name($stid, ":megjegyzes", $megjegyzes);

    oci_execute($stid);

    header("Location: fiok_kezeles.php");
}

if (isset($_POST["admin_add"])) {
    $admin_email = $_POST["email_add"];
    $jelszo = $_POST["jelszo_add"];
    $kezdes_idopontja = $_POST["kezdes_idopontja_add"];
    $beosztas = $_POST["beosztas_add"];

    $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);

    $stid = oci_parse(database(),
        "INSERT INTO Admin (ADMIN_EMAIL, JELSZO, KEZDES_IDOPONTJA, BEOSZTAS)
         VALUES (:admin_email, :jelszo, TO_DATE(:kezdes_idopontja, 'YYYY-MM-DD'), :beosztas)");

    oci_bind_by_name($stid, ":admin_email", $admin_email);
    oci_bind_by_name($stid, ":jelszo", $jelszo);
    oci_bind_by_name($stid, ":kezdes_idopontja", $kezdes_idopontja);
    oci_bind_by_name($stid, ":beosztas", $beosztas);

    oci_execute($stid);

    header("Location: fiok_kezeles.php");
}

if (isset($_POST["vasarlo_modify"])) {
    if (isset($_POST["vasarlo_email"])) {
        $vasarlo_email = $_POST["vasarlo_email"];
        $query = "UPDATE Vasarlo SET ";
        $update_values = array();

        if (!empty($_POST["email_modify"])) {
            $query .= "VASARLO_EMAIL = :vasarlo_email, ";
            $update_values[':vasarlo_email'] = $_POST["email_modify"];
        }
        if (!empty($_POST["jelszo_modify"])) {
            $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
            $query .= "JELSZO = :jelszo, ";
            $update_values[':jelszo'] = $_POST["jelszo_modify"];
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
        if (!empty($_POST["megjegyzes_modify"])) {
            $query .= "MEGJEGYZES = :megjegyzes, ";
            $update_values[':megjegyzes'] = $_POST["megjegyzes_modify"];
        }

        $query = rtrim($query, ", ");
        $query .= " WHERE VASARLO_EMAIL = :eredeti_email";

        $stid = oci_parse(database(), $query);

        foreach ($update_values as $key => &$value) {
            oci_bind_by_name($stid, $key, $value);
        }
        oci_bind_by_name($stid, ':eredeti_email', $admin_email);
        oci_bind_by_name($stid, ":jelszo", $jelszo);
        oci_execute($stid);

        header("Location: fiok_kezeles.php");
        exit();
    }
}

if (isset($_POST["admin_modify"])) {
    if (isset($_POST["admin_email"])) {
        $admin_email = $_POST["admin_email"];
        $query = "UPDATE Admin SET ";
        $update_values = array();

        if (!empty($_POST["email_modify"])) {
            $query .= "ADMIN_EMAIL = :admin_email, ";
            $update_values[':admin_email'] = $_POST["email_modify"];
        }

        if (!empty($_POST["jelszo_modify"])) {
            $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
            $query .= "JELSZO = :jelszo, ";
            $update_values[':jelszo'] = $_POST["jelszo_modify"];
        }

        if (!empty($_POST["kezdes_idopontja_modify"])) {
            $query .= "KEZDES_IDOPONTJA = TO_DATE(:kezdes_idopontja, 'YYYY-MM-DD'), ";
            $update_values[':kezdes_idopontja'] = $_POST["kezdes_idopontja_modify"];
        }

        if (!empty($_POST["beosztas_modify"])) {
            $query .= "BEOSZTAS = :beosztas, ";
            $update_values[':beosztas'] = $_POST["beosztas_modify"];
        }

        $query = rtrim($query, ", ");
        $query .= " WHERE ADMIN_EMAIL = :eredeti_email";

        $stid = oci_parse(database(), $query);

        foreach ($update_values as $key => &$value) {
            oci_bind_by_name($stid, $key, $value);
        }
        oci_bind_by_name($stid, ':eredeti_email', $admin_email);
        oci_bind_by_name($stid, ":jelszo", $jelszo);
        oci_execute($stid);

        header("Location: fiok_kezeles.php");
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
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="fiok_kezeles.php">Fiókok kezelése</a></li>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="konyvek_kezeles.php">Könyvek kezelése</a></li>
        <li><img class="listajel" src="assets/imgs/icon.png" alt="listajel"><a href="aruhazak_kezeles.php">Áruházak kezelése</a></li>
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
                    <th>Irányítószám</th>
                    <th>Város</th>
                    <th>Utca</th>
                    <th>Megjegyzés</th>
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
                    echo "<td>" . $row['IRANYITOSZAM'] . "</td>";
                    echo "<td>" . $row['VAROS'] . "</td>";
                    echo "<td>" . $row['UTCA'] . "</td>";
                    echo "<td>" . $row['MEGJEGYZES'] . "</td>";
                    echo "<td><button class='continueButton' type='submit' name='fiok_delete' value='" . $row['VASARLO_EMAIL'] . "'>Törlés</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </section>
        </form>

        <h2>Admin törlése</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <section>
                <table>
                    <?php
                    $query = "SELECT * FROM Admin";
                    $stid = oci_parse(database(), $query);
                    oci_execute($stid);
                    while ($row = oci_fetch_assoc($stid)) {
                        echo "<tr>";
                        echo "<td>" . $row['ADMIN_EMAIL'] . "</td>";
                        echo "<td>" . $row['KEZDES_IDOPONTJA'] . "</td>";
                        echo "<td>" . $row['BEOSZTAS'] . "</td>";
                        echo "<td><button class='continueButton' type='submit' name='admin_delete' value='" . $row['ADMIN_EMAIL'] . "'>Törlés</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </section>
        </form>
    </div>
    <div class="book-form-container">
        <h2>Vásárló hozzáadása</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <div class="input-container">
                <label for="email">Email cím:</label>
                <input type="text" name="email_add"/>
                <label for="jelszo">Jelszó:</label>
                <input type="password" name="jelszo_add"/>
                <label for="iranyitoszam">Irányítószám:</label>
                <input type="number" name="iranyitoszam_add"/>
                <label for="varos">Város:</label>
                <input type="text" name="varos_add"/>
                <label for="utca">Utca:</label>
                <input type="text" name="utca_add"/>
                <label for="megjegyzes">Megjegyzés:</label>
                <input type="text" name="megjegyzes_add"/>
            </div>
            <input class="continueButton" type="submit" name="fiok_add" value="Hozzáadás" />
        </form>

        <h2>Admin hozzáadása</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <div class="input-container">
                <label for="email">Email cím:</label>
                <input type="text" name="email_add"/>
                <label for="jelszo">Jelszó:</label>
                <input type="password" name="jelszo_add"/>
                <label for="kezdes_idopontja">Kezdes időpontja:</label>
                <input type="date" name="kezdes_idopontja_add"/>
                <label for="beosztas">Beosztás:</label>
                <input type="text" name="beosztas_add"/>
            </div>
            <input class="continueButton" type="submit" name="admin_add" value="Hozzáadás" />
        </form>
    </div>
    <div class="book-form-container">
        <h2>Vásárló módosítása</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <div class="select-container">
                <p>Válassz a vásárlók listából, ha módosítani szeretnél:</p>
                    <select name="vasarlo_email" id = "vasarlo_email">
                        <?php
                        $stid = oci_parse(database(), 'SELECT VASARLO_EMAIL FROM Vasarlo');
                        oci_execute($stid);
                        while (($row = oci_fetch_row($stid)) != false) {
                            echo '<option value="' . $row[0] . '">' . $row[0]  . '</option>';
                        }
                        ?>
                    </select>
            </div>
            <div class="input-container">
                <label for="email_modify">Email cím:</label>
                <input type="text" name="email_modify"/>
                <label for="jelszo_modify">Jelszó:</label>
                <input type="password" name="jelszo_modify"/>
                <label for="iranyitoszam_modify">Irányítószám:</label>
                <input type="number" name="iranyitoszam_modify"/>
                <label for="varos_modify">Város:</label>
                <input type="text" name="varos_modify"/>
                <label for="utca_modify">Utca:</label>
                <input type="text" name="utca_modify"/>
                <label for="megjegyzes_modify">Megjegyzés:</label>
                <input type="text" name="megjegyzes_modify"/>
            </div>
            <input class="continueButton" type="submit" name="fiok_modify" value="Módosítás" />
        </form>

        <h2>Admin módosítása</h2>
        <form method="POST" action="fiok_kezeles.php" accept-charset="utf-8">
            <div class="select-container">
                <p>Válassz az adminok közül a módosításhoz:</p>
                    <select name="admin_email" id ="admin_email">
                        <?php
                        $stid = oci_parse(database(), 'SELECT ADMIN_EMAIL FROM Admin');
                        oci_execute($stid);
                        while (($row = oci_fetch_row($stid)) != false) {
                            echo '<option value="' . $row[0] .'">' . $row[0] . '</option>';
                        }
                        ?>
                    </select>
            </div>
            <div class="input-container">
                <label for="email_modify">Új email cím:</label>
                <input type="text" name="email_modify"/>
                <label for="jelszo_modify">Új jelszó:</label>
                <input type="password" name="jelszo_modify"/>
                <label for="kezdes_idopontja_modify">Új kezdés időpontja:</label>
                <input type="date" name="kezdes_idopontja_modify"/>
                <label for="beosztas_modify">Új beosztás:</label>
                <input type="text" name="beosztas_modify"/>
            </div>
            <input class="continueButton" type="submit" name="admin_modify" value="Módosítás" />
        </form>
    </div>
</main>
</body>
</html>
