<?php
$connection = null;
include 'process.php';


    if (isset($_POST['konyv_delete'])) {
        $bookId = $_POST['book_id'];
    $stid = oci_parse(database(), "DELETE FROM KONYV WHERE KONYV_ID = {$bookId}");
    oci_execute($stid);
    echo 'hello';
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
<div class="search-bar">
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
    <h2>Könyv adatok hozzáadása, módosítása, törlése</h2>
    <form method="POST" action="admin.php" accept-charset="utf-8">

    <section>
        <div class="tablazat">
            <strong>Könyvek</strong>
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
                    <th>Műveletek</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $stid = oci_parse(database(), 'SELECT * FROM konyv');
                oci_execute($stid);
                while (($row = oci_fetch_assoc($stid)) != false) {
                    echo '<tr>';
                    echo '<td>'.$row['KONYV_ID'].'</td>';
                    echo '<td>'.$row['NEV'].'</td>';
                    echo '<td>'.$row['KIADAS_EVE'].'</td>';
                    echo '<td>'.$row['KIADO'].'</td>';
                    echo '<td>'.$row['OLDALSZAM'].'</td>';
                    echo '<td>'.$row['MERET'].'</td>';
                    echo '<td>'.$row['KOTET'].'</td>';
                    echo '<td>'.$row['AR'].'</td>';
                    echo '<td>'.$row['ELADOTT_PELDANYOK_SZAMA'].'</td>';
                    echo '<td>
                      <form method="post" action="admin.php">
                          <input type="hidden" name="book_id" value="' . $row['KONYV_ID'] . '">
                          <input type="submit" name="konyv_delete" value="Törlés">
                      </form>
                  </td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>
