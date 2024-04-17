<?php
session_start();
$connection = null;
include 'process.php';
?>

<!DOCTYPE html>
<html lang="hu">
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

    <h1>Bejelentkezés</h1>

    <?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = login($email, $password);

        if ($result) {
            $isAdmin = checkAdmin($email);

            $_SESSION['user_type'] = $isAdmin ? 'admin' : 'vasarlo';
            $_SESSION['username'] = $email;

            echo "<div id='successMessage'>Sikeres bejelentkezés!</div>";

            header("refresh:3;url=" . ($isAdmin ? "admin.php" : "index.php"));
            exit();
        } else {
            echo "<div id='errorMessage'>Hibás email cím vagy jelszó.</div>";
        }
    }
    oci_close($connection);
    ?>


    <form method="post">
        <p>E-mail cím
            <label>
                <input type="email" name="email" required>
            </label>
        </p>
        <p>Jelszó
            <label>
                <input type="password" name="password" required>
            </label>
        </p>
        <input type="submit" name="login" value="Bejelentkezés" class="continueButton">
    </form>

    <p>Ha még nincs fiókod, akkor <a href="register.php">regisztrálj</a>.</p>
</div>
</body>
</html>
