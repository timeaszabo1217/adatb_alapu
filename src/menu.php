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
        <a class="user-select-none" href="index.php">
            <img class="user-select-none" id="logo" src="assets/imgs/Streeler-removebg-preview.png" alt="logo">
        </a>
        <form action="kereses.php" method="GET" class="search-form">
            <label>
                <input type="text" name="kereses" class="search-input" placeholder="Keresés...">
            </label>
            <button type="submit" class="search-button">
                <img class="icon user-select-none" src="assets/imgs/search-removebg-preview.png" alt="Keresés">
            </button>
        </form>
        <div class="login-menu">
            <?php if (!$isLoggedIn) : ?>
                <a href="login.php" class="nav-link user-select-none">Bejelentkezés/Regisztráció</a>
            <?php else : ?>
                <?php if ($userRole === 'admin') : ?>
                    <a href="admin.php" class="nav-link user-select-none">Admin</a>
                <?php endif; ?>
                <div class="dropdown">
                    <button class="dropbtn"><img class="icon user-select-none" src="assets/imgs/profile.png" alt="Profil"></button>
                    <div class="dropdown-content">
                        <a class="user-select-none" href="profil.php">Profil</a>
                        <a class="user-select-none" href="logout.php">Kijelentkezés</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="button-container">
        <a href="kosar.php" class="button user-select-none">
            <img src="assets/imgs/basket.png" alt="Kosár" class ="icon user-select-none" id ="basket_icon">
        </a>
    </div>
</div>
<nav class="user-select-none">
    <a href="konyvek.php" class="nav-link user-select-none">Könyvek</a>
    <a href="sikerlista.php" class="nav-link user-select-none">Sikerlista</a>
    <a href="ujdonsagok.php" class="nav-link user-select-none">Újdonságok</a>
    <a href="akciok.php" class="nav-link user-select-none">Akciók</a>
    <a href="informaciok.php" class="nav-link user-select-none">Információk</a>
</nav>
</body>
</html>