<?php
include 'menu.php';
include 'process.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_title']) && isset($_POST['book_price'])) {
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];

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
        // A kosárban lévő könyv információk megjelenítése
        echo '<p>Cím: ' . $item['title'] . ', Ár: ' . $item['price'] . ' Ft</p>';
        $total_price += $item['price'];
        echo '</div>';
    }
} else {
    echo '<div style="margin-left: 60px;"><p>Még nincs termék a kosaradban, nézz szét a <a href="konyvek.php">Könyvek</a> oldalon.</p></div>';
}

// A vizuális elemek csak akkor jelennek meg, ha van valami a kosárban
if ($total_price > 0):
    ?>
    <img class="line" src="assets/imgs/line2.png" alt="Választó vonal">
    <div style="margin-left: 60px;">
        <p>Végösszeg: <?php echo $total_price; ?> Ft</p>
    </div>

    <form method="post" action="fizetes.php">
        <input class="continueButton" type="submit" value="Fizetés">
    </form>
<?php endif; ?>



