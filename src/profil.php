<?php
$connection = null;
include 'menu.php';
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
    <link rel="stylesheet" href="css/urlap.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>𝐒𝐭𝐫𝐞𝐞𝐥𝐞𝐫</title>
</head>
<body>
<div class="container">

    <h1>Profil</h1>

    <?php if ($_SESSION['user_type'] === 'admin') { ?>
    <p>Email: <?php echo $_SESSION['username']; ?></p>
    <p>Kezdés időpontja: <?php echo $user['KEZDES_IDOPONTJA']; ?></p>
    <p>Beosztás: <?php echo $user['BEOSZTAS']; ?></p>

        <h1>Profil módosítása</h1>

        <form method="post" action="">
            <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>">

            <label for="starting">Kezdés időpontja:</label><br>
            <input type="text" id="starting" name="starting" value="<?php echo $user['KEZDES_IDOPONTJA']; ?>"><br>
            <label for="position">Beosztás:</label><br>
            <input type="text" id="position" name="position" value="<?php echo $user['BEOSZTAS']; ?>"><br>

            <input type="submit" name="update" value="Adatok módosítása">
        </form>
    <?php }?>

    <?php if ($_SESSION['user_type'] === 'vasarlo') { ?>
    <p>Email: <?php echo $_SESSION['username']; ?></p>
    <p>Irányítószám: <?php echo $user['IRANYITOSZAM']; ?></p>
    <p>Város: <?php echo $user['VAROS']; ?></p>
    <p>Utca: <?php echo $user['UTCA']; ?></p>
    <p>Megjegyzés: <?php echo $user['MEGJEGYZES']; ?></p>

        <h1>Profil módosítása</h1>

        <form method="post" action="">
            <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>">
            <label for="postal_code">Irányítószám:</label><br>
            <input type="number" id="postal_code" name="postal_code" value="<?php echo $user['IRANYITOSZAM']; ?>"><br>
            <label for="city">Város:</label><br>
            <input type="text" id="city" name="city" value="<?php echo $user['VAROS']; ?>"><br>
            <label for="street">Utca:</label><br>
            <input type="text" id="street" name="street" value="<?php echo $user['UTCA']; ?>"><br>
            <label for="comments">Megjegyzés:</label><br>
            <input type="text" id="comments" name="comments" value="<?php echo $user['MEGJEGYZES']; ?>"><br>


            <input type="submit" name="update" value="Adatok módosítása">
        </form>
    <?php }?>



    <h1>Profil törlése</h1>

    <!-- Form for deleting user -->
    <form method="post" action="">
        <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>">
        <input type="submit" name="delete" value="Felhasználó törlése">
    </form>

</div>
</body>
</html>
