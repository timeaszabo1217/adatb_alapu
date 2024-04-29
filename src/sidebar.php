<?php
include 'process.php';
$total_books = 0;
?>
<img src="assets/imgs/header.png" alt="header" style="width: 100%;">
<h1>Könyvek</h1>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<div class="sidebar">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p style="margin-left: 60px; margin-bottom: 0;">Műfaj</p>
        <div class="genre-container">
            <?php
            $query = "SELECT * FROM Mufaj";
            $stid = oci_parse(database(), $query);
            oci_execute($stid);
            while ($row = oci_fetch_assoc($stid)) {
                echo '<label><input type="checkbox" name="genres[]" value="' . $row['MUFAJ_MEGNEVEZES'] . '"> ' . $row['MUFAJ_MEGNEVEZES'] . '</label><br>';
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
    $query = 'SELECT K.NEV, K.AR, KS.SZERZO FROM Konyv K INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id 
              INNER JOIN KonyvMufaj KM ON K.Konyv_id = KM.Konyv_id 
              INNER JOIN Mufaj M ON KM.Mufaj_megnevezes = M.Mufaj_megnevezes';

    if (isset($_GET['genres']) && !empty($_GET['genres'])) {
        $selectedGenres = implode("','", $_GET['genres']);
        $query .= " WHERE M.MUFAJ_MEGNEVEZES IN ('$selectedGenres')";
    }

    $stid = oci_parse(database(), $query);
    oci_execute($stid);

    while ($row = oci_fetch_assoc($stid)) {
        echo '<div style="display: flex; align-items: center;">';
        echo '<img id="borito" src="assets/imgs/istockphoto-1132160175-612x612-removebg-preview.png" alt="Borítókép">';
        echo '<div style="margin-left: 10px;">';
        echo '<p>Cím: ' . $row['NEV'] . '</p>';
        echo '<p>Szerző: ' . $row['SZERZO'] . '</p>';
        echo '<p>Ár: ' . $row['AR'] . ' Ft</p>';
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