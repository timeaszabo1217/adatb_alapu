<?php
include 'process.php';
include  'menu.php';

// Kosár tartalma ellenőrzése
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Ha a kosár üres, akkor valószínűleg valami hiba történt, visszairányítjuk a felhasználót az előző oldalra
    header("Location: kosar.php");
    exit;
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Vásárló e-mail címének beolvasása a sessionből
$user_email = $_SESSION['username'];


// Kosár tartalma beolvasása
$kosár_tartalma = $_SESSION['cart'];

// Vásárlókönyv adatbázisba szúrása
foreach ($kosár_tartalma as $könyv) {
    $book_title = $könyv['title'];
    $book_price = $könyv['price'];

    // SQL lekérdezés előkészítése és végrehajtása
    $query = "INSERT INTO VasarloKonyv (Vasarlo_email, Konyv_id)
SELECT :user_email, K.Konyv_id 
FROM Konyv K
JOIN KonyvSzerzo KS ON K.Konyv_id = KS.Konyv_id
WHERE K.Nev = :book_title AND K.Ar = :book_price";

    $stid = oci_parse(database(), $query);
    oci_bind_by_name($stid, ':user_email', $user_email);
    oci_bind_by_name($stid, ':book_title', $book_title);
    oci_bind_by_name($stid, ':book_price', $book_price);


    $result = oci_execute($stid);
    if (!$result) {
        // Sikertelen adatbázis művelet

    }

    oci_free_statement($stid);
}

$_SESSION['cart'] = [];
header("Location: kosar.php");
exit;
?>
