<?php
global $connection;

$host = 'localhost';
$port = '1521';
$db_service_name = 'orania2';
$username = '';
$password = '';

$connection = oci_connect($username, $password, "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$db_service_name)))");

if ($connection) {
    echo "<p>Sikeresen csatlakozva az Oracle adatbázishoz.</p>";
} else {
    $error = oci_error();
    echo "<p>Hiba a kapcsolódás során: " . $error['message'] . "</p>";
}

oci_close($connection);