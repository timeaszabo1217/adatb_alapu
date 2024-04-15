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
    <title>Bejelentkezés</title>
</head>
<body>
<div class="container">
    <h1>Bejelentkezés</h1>

    <?php

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = login($email, $password);

        if($result){
            $isAdmin = checkAdmin($email);
            if($isAdmin){
                header("Location: admin.php");
                exit();
            } else {
                echo "Sikeres bejelentkezés!";
                header("Location: index.php");
                exit();
            }
        }else {
            echo "Hibás email cím vagy jelszó.";
        }
    }
    oci_close($connection);
    ?>

    <form method="post">
        Email: <input type="email" name="email" required><br>
        Jelszó: <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Bejelentkezés" class="continueButoon">
    </form>

    <a href="register.php" class="continueButoon">Regisztráció</a>
</div>
</body>
</html>
