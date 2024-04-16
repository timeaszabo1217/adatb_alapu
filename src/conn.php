<?php
global $connection;

$host = 'localhost';
$port = '1521';
$db_service_name = 'orania2';
$username = 'C##E1T43H';
$password = 'Goffry2019';

$connection = oci_connect($username, $password, "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$db_service_name)))");