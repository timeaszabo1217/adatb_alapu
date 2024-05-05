<?php
include 'menu.php';
include 'process.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_title']) && isset($_POST['book_price'])) {
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];

    $query = "SELECT Ertesites FROM AruhazKonyv WHERE Konyv_id = (SELECT Konyv_id FROM Konyv WHERE NEV = :book_title)";
    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':book_title', $book_title);
    oci_execute($stid);
    $row = oci_fetch_assoc($stid);
    $notification = $row ? $row['ERTESITES'] : '';

    $_SESSION['cart'][] = ['title' => $book_title, 'price' => $book_price];
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Kosár</title>
</head>
<body>
<h1>Kosár tartalma</h1>
<img class="line" src="assets/imgs/line1.png" alt="Választó vonal">
<?php
$total_price = 0;

$query = 'SELECT NEV, AR FROM Konyv';
$stid = oci_parse(database(), $query);
oci_execute($stid);

$books = [];
while ($row = oci_fetch_assoc($stid)) {
    $books[] = $row;
}

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        echo '<div style="margin-left: 60px;">';
        echo '<p>Cím: ' . $item['title'] . ', Ár: ' . $item['price'] . ' Ft</p>';
        $total_price += $item['price'];
        echo '</div>';
    }
} else {
    echo '<div style="margin-left: 60px;"><p>Még nincs termék a kosaradban, nézz szét a <a href="konyvek.php">Könyvek</a> oldalon.</p></div>';
}

if ($total_price > 0):
    ?>
    <img class="line" src="assets/imgs/line2.png" alt="Választó vonal">
    <div style="margin-left: 60px;">
        <p>Végösszeg: <?php echo $total_price; ?> Ft</p>
    </div>
    <form method="post" action="fizetes.php">
        <?php if ($notification === 'Nincs készleten'): ?>
            <p style="color: #c15a5a; margin-left: 60px;">Ezt a könyvet jelenleg nem lehet megvásárolni, mert nincs készleten.</p>
        <?php else: ?>
            <?php if ($notification === 'Ez az utolsó könyv'): ?>
            <p style="color: #c15a5a; margin-left: 60px;">Ez az utolsó példány ebből a könyvből, siess!</p>
        <?php endif; ?>
            <input class="continueButton" type="submit" value="Fizetés">
        <?php endif; ?>
    </form>
<?php endif; ?>



