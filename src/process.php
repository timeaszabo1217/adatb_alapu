<?php
include 'conn.php';

function register($email, $password) {
    global $connection;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Vasarlo (Vasarlo_email, Jelszo) VALUES (:email, :password)";
    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':password', $password);

    $result = oci_execute($stmt);

    return $result;
}

function login($email, $password) {
    global $connection;

    $sql = "SELECT * FROM Vasarlo WHERE Vasarlo_email = :email";
    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);

    oci_execute($stmt);
    $user = oci_fetch_assoc($stmt);

    if($user && password_verify($password, $user['Jelszo'])){
        return true;
    } else {
        return false;
    }
}
?>