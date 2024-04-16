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
    <link rel="stylesheet" href="css/urlap.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>𝐒𝐭𝐫𝐞𝐞𝐥𝐞𝐫</title>
</head>
<body>
<div class="container">
    <a href="index.php" style="position: absolute; top: 0; left: 0;">↶ Vissza a főoldalra</a>

    <h1>Regisztráció</h1>

    <?php

    if(isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmed = $_POST['password_confirmed'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $comments = $_POST['comments'];

        if($password === $password_confirmed) {
            $result = register($email, $password, $password_confirmed, $postal_code, $city, $street, $comments);

            if ($result) {
                echo "<div id='successMessage'>Sikeres regisztráció!</div>";
                header("refresh:3;url=login.php");
                exit();
            } else {
                echo "<div id='errorMessage'>Hiba történt a regisztráció során.</div>";
            }
        }
    }
    oci_close($connection);
    ?>

    <form method="post">
        <p>E-mail cím*
            <label>
                <input type="email" name="email" required>
            </label>
        </p>
        <p>Jelszó*
            <label>
                <input type="password" name="password" required>
            </label>
        </p>
        <p>Jelszó még egyszer*
            <label>
                <input type="password" name="password_confirmed" required>
            </label>
        </p>
        <p>Irányítószám
            <label>
                <input type="number" name="postal_code">
            </label>
        </p>
        <p>Város
            <label>
                <input type="text" name="city">
            </label>
        </p>
        <p>Lakcím
            <label>
                <input type="text" name="street">
            </label>
        </p>
        <p>Megjegyzés a címmel kapcsolatban
            <label>
                <input type="text" name="comments">
            </label>
        </p>
        <input type="submit" name="register" value="Regisztráció" class="continueButton">
    </form>

    <p>Ha már van fiókod, akkor <a href="login.php">jelentkezz be</a>.</p>
</div>
</body>
</html>
