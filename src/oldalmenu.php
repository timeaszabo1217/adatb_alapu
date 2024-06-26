<?php
include 'process.php';
$total_books = 0;
?>
<img class="user-select-none" src="assets/imgs/header.png" alt="header" style="width: 100%;">
<h1>Könyvek</h1>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div class="sidebar">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p style="margin-left: 60px; margin-bottom: 0;">Műfaj</p>
        <div class="genre-container">
            <?php
            $query = "SELECT M.MUFAJ_MEGNEVEZES, COUNT(K.Konyv_id) AS konyvek_szama
                      FROM Mufaj M 
                      LEFT JOIN KonyvMufaj KM ON M.MUFAJ_MEGNEVEZES = KM.Mufaj_megnevezes
                      LEFT JOIN Konyv K ON KM.Konyv_id = K.Konyv_id
                      GROUP BY M.MUFAJ_MEGNEVEZES";
            $stid = oci_parse(database(), $query);
            oci_execute($stid);
            while ($row = oci_fetch_assoc($stid)) {
                echo '<label><input type="checkbox" name="genres[]" value="' . $row['MUFAJ_MEGNEVEZES'] . '"> ' . $row['MUFAJ_MEGNEVEZES'] . ' (' . $row['KONYVEK_SZAMA'] . ')</label><br>';
            }
            oci_free_statement($stid);
            ?>
        </div>
        <div class="filter-button">
            <input class="continueButton" type="submit" value="Szűrés">
        </div>
    </form>
</div>
<div class="book-form-container books-container">
    <?php
    $query = 'SELECT M.MUFAJ_MEGNEVEZES || \' (\' || COUNT(K.Konyv_id) || \')\' AS MEGNEVEZES, K.Konyv_id, K.NEV, K.AR, KS.SZERZO
          FROM Konyv K 
          INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id 
          LEFT JOIN KonyvMufaj KM ON K.Konyv_id = KM.Konyv_id 
          LEFT JOIN Mufaj M ON KM.Mufaj_megnevezes = M.Mufaj_megnevezes';

    if (isset($_GET['genres']) && !empty($_GET['genres'])) {
        $selectedGenres = implode("','", $_GET['genres']);
        $query .= " WHERE M.MUFAJ_MEGNEVEZES IN ('$selectedGenres')";
    }

    $query .= ' GROUP BY M.MUFAJ_MEGNEVEZES, K.Konyv_id, K.NEV, K.AR, KS.SZERZO
            ORDER BY M.MUFAJ_MEGNEVEZES, K.NEV';

    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    while ($row = oci_fetch_assoc($stid)) {
        echo '<div style="display: flex; align-items: center;">';
        echo '<a href="adatlap.php?book_id=' . $row['KONYV_ID'] . '">';
        echo '<img class="user-select-none" id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '</a>';
        echo '<div style="margin-left: 10px;">';
        echo '<a href="adatlap.php?book_id=' . $row['KONYV_ID'] . '">' . $row['NEV'] . '</a>';
        echo '<p>' . $row['SZERZO'] . '</p>';
        echo '<p>' . $row['AR'] . ' Ft</p>';
        echo '</div>';
        echo '<form class="basketButton" method="post" action="kosar.php">';
        echo '<input type="hidden" name="book_title" value="' . $row['NEV'] . '">';
        echo '<input type="hidden" name="book_price" value="' . $row['AR'] . '">';
        echo '<input class="continueButton" type="submit" value="Kosárba">';
        echo '</form>';
        echo '</div>';

        $total_books++;
    }
    oci_free_statement($stid);
    echo '<p>Találatok száma: ' . $total_books . '</p>';
    ?>
</div>