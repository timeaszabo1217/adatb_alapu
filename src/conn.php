<?php

$host = 'localhost';
$port = '1521';
$db_service_name = 'orania2';
$username = 'C##JJMS9M';
$password = 'C##JJMS9M';

$connection = oci_connect($username, $password, "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$db_service_name)))");

if ($connection) {
    echo "Sikeresen csatlakozva az Oracle adatbázishoz.\n";


    $sql = "SELECT admin_email, beosztas FROM admin ORDER BY beosztas";

    $statement = oci_parse($connection, $sql);
    oci_execute($statement);

    while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "Admin email: " . $row['ADMIN_EMAIL'] . "\n";
        echo "Beosztás: " . $row['BEOSZTAS'] . "\n\n";
    }

    oci_free_statement($statement);
    oci_close($connection);

} else {
    $error_message = oci_error();
    echo "Sikertelen csatlakozás: " . $error_message['message'];
}