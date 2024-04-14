<?php
$connection = null;
include 'process.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Regisztráció</title>
</head>
<body>
<div class="container">
    <h1>Regisztráció</h1>

    <?php

    if(isset($_POST['register'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $comments = $_POST['comments'];

        $result = register($email, $password, $postal_code, $city, $street, $comments);

        if($result){
            echo "Sikeres regisztráció!";
        } else {
            echo "Hiba történt a regisztráció során.";
        }
    }
    oci_close($connection);
    ?>

    <form method="post">
        Email: <input type="email" name="email" required><br>
        Jelszó: <input type="password" name="password" required><br>
        Irányítószám: <input type="number" name="postal_code"><br>
        Város: <input type="text" name="city"><br>
        Utca: <input type="text" name="street"><br>
        Megjegyzés: <input type="text" name="comments"><br>
        <input type="submit" name="register" value="Regisztráció" class="continueButoon">
    </form>

    <a href="login.php" class="continueButoon">Bejelentkezés</a>
</div>
</body>
</html>
