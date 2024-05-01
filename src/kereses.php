<?php
include 'process.php';
include 'menu.php';
$total_books = 0;

if (isset($_GET['kereses']) && !empty($_GET['kereses'])) {
$kereses = strtolower($_GET['kereses']);
?>
<div class="book-form-container books-container">
    <?php
    $query = 'SELECT K.Konyv_id, K.NEV, K.AR, KS.SZERZO FROM Konyv K 
              INNER JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id 
              LEFT JOIN KonyvMufaj KM ON K.Konyv_id = KM.Konyv_id 
              LEFT JOIN Mufaj M ON KM.Mufaj_megnevezes = M.Mufaj_megnevezes 
              WHERE LOWER(K.NEV) LIKE :kereses OR LOWER(KS.SZERZO) LIKE :kereses';
    $stid = oci_parse(database(), $query);
    $kereses_param = '%' . $kereses . '%';
    oci_bind_by_name($stid, ':kereses', $kereses_param);
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
    } else {
        echo "Nincs találat.";
    }
    ?>
</div>
