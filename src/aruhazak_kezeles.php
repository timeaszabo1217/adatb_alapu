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
