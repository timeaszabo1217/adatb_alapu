<?php
include 'process.php';
include  'menu.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: kosar.php");
    exit;
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (checkAdmin($_SESSION['username'])) {
    header('Location: admin.php');
    exit;
}

$user_email = $_SESSION['username'];
$kosár_tartalma = $_SESSION['cart'];

foreach ($kosár_tartalma as $könyv) {
    $book_title = $könyv['title'];
    $book_price = $könyv['price'];
    $query_check = "SELECT COUNT(*) AS count FROM VasarloKonyv WHERE Vasarlo_email = :user_email AND Konyv_id IN (SELECT Konyv_id FROM Konyv WHERE Nev = :book_title AND Ar = :book_price)";
    $stid_check = oci_parse(database(), $query_check);
    oci_bind_by_name($stid_check, ':user_email', $user_email);
    oci_bind_by_name($stid_check, ':book_title', $book_title);
    oci_bind_by_name($stid_check, ':book_price', $book_price);
    oci_execute($stid_check);
    $row = oci_fetch_assoc($stid_check);
    $count = $row['COUNT'];

    if ($count > 0) {
        $query_update = "UPDATE VasarloKonyv SET Darabszam = Darabszam + 1 WHERE Vasarlo_email = :user_email AND Konyv_id IN (SELECT Konyv_id FROM Konyv WHERE Nev = :book_title AND Ar = :book_price)";
        $stid_update = oci_parse(database(), $query_update);
        oci_bind_by_name($stid_update, ':user_email', $user_email);
        oci_bind_by_name($stid_update, ':book_title', $book_title);
        oci_bind_by_name($stid_update, ':book_price', $book_price);
        oci_execute($stid_update);
        oci_free_statement($stid_update);
    } else {
        $query_insert = "INSERT INTO VasarloKonyv (Vasarlo_email, Konyv_id, Darabszam) 
                         SELECT :user_email, Konyv_id, 1 
                         FROM Konyv 
                         WHERE Nev = :book_title AND Ar = :book_price";
        $stid_insert = oci_parse(database(), $query_insert);
        oci_bind_by_name($stid_insert, ':user_email', $user_email);
        oci_bind_by_name($stid_insert, ':book_title', $book_title);
        oci_bind_by_name($stid_insert, ':book_price', $book_price);
        oci_execute($stid_insert);
        oci_free_statement($stid_insert);
    }
    oci_free_statement($stid_check);
}
$_SESSION['cart'] = [];
header("Location: kosar.php");
exit;
