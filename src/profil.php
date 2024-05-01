<?php
include 'menu.php';

$connection = null;
include 'process.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$user = getUserData($_SESSION['username']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        if ($_SESSION['user_type'] === 'admin') {
            $result = updateAdminUserData($_SESSION['username'], $_POST['starting'], $_POST['position']);
        } else {
            $result = updateUserData($_SESSION['username'], $_POST['postal_code'], $_POST['city'], $_POST['street'], $_POST['comments']);
        }
        if ($result) {
            echo "<div id='successMessage'>Adatok frissítve!</div>";
        } else {
            echo "<div id='errorMessage'>Hiba történt az adatok frissítése során.</div>";
        }
    } elseif (isset($_POST['delete'])) {
        $result = deleteUserData($_SESSION['username']);
        if ($result) {
            echo "<div id='successMessage'>Felhasználó törölve!</div>";
            session_destroy();
            header('Location: login.php');
            exit;
        } else {
            echo "<div id='errorMessage'>Hiba történt a felhasználó törlése során.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>𝐒𝐭𝐫𝐞𝐞𝐥𝐞𝐫</title>
</head>
<body>
<div class="container">
    <h1 style="margin-left: 0;">Profil</h1>
    <?php if ($_SESSION['user_type'] === 'admin') { ?>
        <p>Email: <?php echo $_SESSION['username']; ?></p>
        <p>Kezdés időpontja: <?php echo $user['KEZDES_IDOPONTJA'] ?? ''; ?></p>
        <p>Beosztás: <?php echo $user['BEOSZTAS'] ?? ''; ?></p>

        <h1 style="margin-left: 0;">Profil módosítása</h1>
        <form method="post" action="">
            <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>">

            <p><label for="starting">Kezdés időpontja:</label></p><br>
            <input type="text" id="starting" name="starting" value="<?php echo $user['KEZDES_IDOPONTJA'] ?? ''; ?>"><br>
            <p><label for="position">Beosztás:</label></p><br>
            <input type="text" id="position" name="position" value="<?php echo $user['BEOSZTAS'] ?? ''; ?>"><br>
            <input class="continueButton" type="submit" name="update" value="Módosítás">
        </form>
    <?php }?>

    <?php if ($_SESSION['user_type'] === 'vasarlo') { ?>
        <p>Email: <?php echo $_SESSION['username']; ?></p>
        <p>Irányítószám: <?php echo $user['IRANYITOSZAM'] ?? ''; ?></p>
        <p>Város: <?php echo $user['VAROS'] ?? ''; ?></p>
        <p>Utca: <?php echo $user['UTCA'] ?? ''; ?></p>
        <p>Megjegyzés: <?php echo $user['MEGJEGYZES'] ?? ''; ?></p>

        <h1 style="margin-left: 0;">Profil módosítása</h1>
        <form method="post" action="">
            <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>">
            <p><label for="postal_code">Irányítószám:</label></p><br>
            <input type="number" id="postal_code" name="postal_code" value="<?php echo $user['IRANYITOSZAM'] ?? ''; ?>"><br>
            <p><label for="city">Város:</label></p><br>
            <input type="text" id="city" name="city" value="<?php echo $user['VAROS'] ?? ''; ?>"><br>
            <p><label for="street">Utca:</label></p><br>
            <input type="text" id="street" name="street" value="<?php echo $user['UTCA'] ?? ''; ?>"><br>
            <p><label for="comments">Megjegyzés:</label></p><br>
            <input type="text" id="comments" name="comments" value="<?php echo $user['MEGJEGYZES'] ?? ''; ?>"><br>
            <input class="continueButton" type="submit" name="update" value="Módosítás">
        </form>
    <?php }?>

    <h1 style="margin-left: 0;">Profil törlése</h1>
    <form method="post" action="">
        <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>">
        <input class="continueButton" type="submit" name="delete" value="Fiók törlése"><br>
    </form>
</div>
</body>
</html>
