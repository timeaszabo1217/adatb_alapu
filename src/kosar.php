<?php
include 'menu.php';
include 'process.php';

// Kosár tartalmának inicializálása, ha még nem létezik
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ha a kosárba rakás gombra kattintottak az előző oldalon
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_title']) && isset($_POST['book_price'])) {
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];

    // Hozzáadás a kosárhoz
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

<?php
// Kosár megjelenítése
$total_price = 0;

// Az adatbázisból származó könyv információk
$query = 'SELECT NEV, AR FROM Konyv';
$stid = oci_parse(database(), $query);
oci_execute($stid);

$books = [];
while ($row = oci_fetch_assoc($stid)) {
    $books[] = $row; // Egész sor hozzáadása a tömbhöz
}

foreach ($_SESSION['cart'] as $item) {
    echo '<div>';
    // A kosárban lévő könyv információk megjelenítése
    echo '<p>Cím: ' . $item['title'] . ', Ár: ' . $item['price'] . ' Ft</p>';
    $total_price += $item['price'];
    echo '</div>';
}
?>

<p>Összesen: <?php echo $total_price; ?> Ft</p>

<!-- Vásárlás gomb -->
<form method="post" action="vasarlas.php">
    <input type="s
