<?php

$host = 'localhost';
$port = '1521';
$db_service_name = 'orania2';
$username = 'C##JJMS9M';
$password = 'C##JJMS9M';

$connection = oci_connect($username, $password, "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$db_service_name)))");

if ($connection) {
    echo "Sikeresen csatlakozva az Oracle adatbázishoz.\n";
}