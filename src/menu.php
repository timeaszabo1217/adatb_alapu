<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);
$userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'vasarlo';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>𝐒𝐭𝐫𝐞𝐞𝐥𝐞𝐫</title>
</head>
<body>
<div class="div-container user-select-none">
    <div class="search-bar">
        <a href="index.php">
            <img id="logo" src="assets/imgs/Streeler-removebg-preview.png" alt="logo">
        </a>
        <form action="kereses.php" method="GET" class="search-form">
            <label>
                <input type="text" name="kereses" class="search-input" placeholder="Keresés...">
            </label>
            <button type="submit" class="search-button">
                <img class="icon" src="assets/imgs/search-removebg-preview.png" alt="Keresés">
            </button>
        </form>
        <div class="login-menu">
            <?php if (!$isLoggedIn) : ?>
                <a href="login.php" class="nav-link">Bejelentkezés/Regisztráció</a>
            <?php else : ?>
                <?php if ($userRole === 'admin') : ?>
                    <a href="admin.php" class="nav-link">Admin</a>
                <?php endif; ?>
                <div class="dropdown">
                    <button class=dropbtn><img class=icon src=assets/imgs/profile.png alt=Profil></button>
                    <div class="dropdown-content">
                        <a href="profil.php">Profil</a>
                        <a href="logout.php">Kijelentkezés</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="button-container">
        <a href="kosar.php" class="button">
            <img src="assets/imgs/basket.png" alt="Kosár" class ="icon" id ="basket_icon">
        </a>
    </div>
</div>
<nav class="user-select-none">
    <a href="konyvek.php" class="nav-link">Könyvek</a>
    <a href="sikerlista.php" class="nav-link">Sikerlista</a>
    <a href="ujdonsagok.php" class="nav-link">Újdonságok</a>
    <a href="akciok.php" class="nav-link">Akciók</a>
    <a href="informaciok.php" class="nav-link">Információk</a>
</nav>
</body>
</html>