<?php
$connection = null;
include 'menu.php';
include 'process.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Fetch user data
$user = getUserData($_SESSION['username']);

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        // Update user data
        $result = updateUserData($_SESSION['username'], $_POST['postal_code'], $_POST['city'], $_POST['street'], $_POST['comments']);
        if ($result) {
            echo "<div id='successMessage'>Adatok frissítve!</div>";
        } else {
            echo "<div id='errorMessage'>Hiba történt az adatok frissítése során.</div>";
        }
    } elseif (isset($_POST['delete'])) {
        // Delete user
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

    <h1>Profil</h1>

    <!-- Display user data -->
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Irányítószám: <?php echo $user['postal_code']; ?></p>
    <p>Város: <?php echo $user['city']; ?></p>
    <p>Utca: <?php echo $user['street']; ?></p>
    <p>Megjegyzés: <?php echo $user['comments']; ?></p>

    <!-- Form for updating user data -->
    <form method="post" action="">
        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
        <label for="postal_code">Irányítószám:</label><br>
        <input type="number" id="postal_code" name="postal_code" value="<?php echo $user['postal_code']; ?>"><br>
        <label for="city">Város:</label><br>
        <input type="text" id="city" name="city" value="<?php echo $user['city']; ?>"><br>
        <label for="street">Utca:</label><br>
        <input type="text" id="street" name="street" value="<?php echo $user['street']; ?>"><br>
        <label for="comments">Megjegyzés:</label><br>
        <input type="text" id="comments" name="comments" value="<?php echo $user['comments']; ?>"><br>
        <input type="submit" name="update" value="Adatok frissítése">
    </form>

    <!-- Form for deleting user -->
    <form method="post" action="">
        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
        <input type="submit" name="delete" value="Felhasználó törlése">
    </form>

</div>
</body>
</html>
