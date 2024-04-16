<?php
include 'conn.php';

function register($email, $password, $password_confirmed, $postal_code, $city, $street, $comments) {
    global $connection;

    if ($password !== $password_confirmed) {
        echo "A jelszavak nem egyeznek!";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (substr_compare($email, '@streeler.com', -strlen('@streeler.com')) === 0) {
        $sql = "INSERT INTO Admin (Admin_email, Jelszo) VALUES (:email, :password)";
        $stmt = oci_parse($connection, $sql);
        oci_bind_by_name($stmt, ':email', $email);
        oci_bind_by_name($stmt, ':password', $password);
    } else {
        $sql = "INSERT INTO Vasarlo (Vasarlo_email, Jelszo, Iranyitoszam, Varos, Utca, Megjegyzes) VALUES (:email, :password, :postal_code, :city, :street, :comments)";
        $stmt = oci_parse($connection, $sql);
        oci_bind_by_name($stmt, ':email', $email);
        oci_bind_by_name($stmt, ':password', $password);
        oci_bind_by_name($stmt, ':postal_code', $postal_code);
        oci_bind_by_name($stmt, ':city', $city);
        oci_bind_by_name($stmt, ':street', $street);
        oci_bind_by_name($stmt, ':comments', $comments);
    }

    $result = oci_execute($stmt);

    return $result;
}

function getUserData($email) {
    global $connection;

    // Fetch user data based on whether they are an admin or not
    if ($_SESSION['user_type'] === 'admin') {
        $sql = "SELECT * FROM Admin WHERE Admin_email = :email";

    } else {
        $sql = "SELECT * FROM Vasarlo WHERE Vasarlo_email = :email";
    }

    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_execute($stmt);
    return oci_fetch_assoc($stmt);
}

function updateAdminUserData($email, $kezdes, $beosztas) {
    global $connection;

    $sql = "UPDATE Admin SET Kezdes_idopontja = :kezdes, Beosztas = :beosztas WHERE Admin_email = :email";

    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':kezdes', $kezdes);
    oci_bind_by_name($stmt, ':beosztas', $beosztas);

    return oci_execute($stmt);
}

function updateUserData($email, $iranyitoszam, $varos, $utca, $megjegyzes) {
    global $connection;

    $sql = "UPDATE Vasarlo SET Iranyitoszam = :iranyitoszam, Varos = :varos, Utca = :utca, Megjegyzes = :megjegyzes WHERE Vasarlo_email = :email";

    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':iranyitoszam', $iranyitoszam);
    oci_bind_by_name($stmt, ':varos', $varos);
    oci_bind_by_name($stmt, ':utca', $utca);
    oci_bind_by_name($stmt, ':megjegyzes', $megjegyzes);

    return oci_execute($stmt);
}

function deleteUserData($email) {
    global $connection;

    if ($_SESSION['user_type'] === 'admin') {
        $sql = "DELETE FROM Admin WHERE Admin_email = :email";
    } else {
        $sql = "DELETE FROM Vasarlo WHERE Vasarlo_email = :email";
    }

    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    return oci_execute($stmt);
}

function login($email, $password)
{
    global $connection;

    $sql_admin = "SELECT * FROM Admin WHERE Admin_email = :email";
    $stmt_admin = oci_parse($connection, $sql_admin);
    oci_bind_by_name($stmt_admin, ':email', $email);
    oci_execute($stmt_admin);
    $admin = oci_fetch_assoc($stmt_admin);

    if ($admin && password_verify($password, $admin['JELSZO'])) {
        $_SESSION['user_role'] = 'admin';
        return true;
    }

    $sql_vasarlo = "SELECT * FROM Vasarlo WHERE Vasarlo_email = :email";
    $stmt_vasarlo = oci_parse($connection, $sql_vasarlo);
    oci_bind_by_name($stmt_vasarlo, ':email', $email);
    oci_execute($stmt_vasarlo);
    $vasarlo = oci_fetch_assoc($stmt_vasarlo);

    if ($vasarlo && password_verify($password, $vasarlo['JELSZO'])) {
        $_SESSION['user_role'] = 'vasarlo';
        return true;
    }

    return false;
}


    /*$sql = "SELECT * FROM Vasarlo WHERE Vasarlo_email = :email";
    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);

    oci_execute($stmt);
    $user = oci_fetch_assoc($stmt);

    if($user && password_verify($password, $user['JELSZO'])){
        return true;


    } else {
        return false;
    }*/


function checkAdmin($email) {
    global $connection;
    $sql = "SELECT * FROM ADMIN WHERE Admin_email = :email";
    $stmt = oci_parse($connection, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_execute($stmt);
    $row = oci_fetch_assoc($stmt);
    return ($row !== false);
}

function database() {
    global $connection;
    return $connection;
}

?>