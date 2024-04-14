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
<div class="search-bar">
    <img id="logo" src="assets/imgs/Streeler-removebg-preview.png" alt="logo">
    <form action="kereses.php" method="GET" class="search-form">
        <input type="text" name="kereses" class="search-input" placeholder="Keresés...">
        <button type="submit" class="search-button">
            <img class="icon" src="assets/imgs/search-removebg-preview.png" alt="Keresés">
        </button>
    </form>
    <div class="login-menu">
        <a href="login.php">Bejelentkezés/Regisztráció</a>
    </div>
    <div class="button-container">
        <a href="kosar.php" class="button">
            <img src="assets/imgs/basket.png" alt="Kosár" class ="icon" id ="basket_icon">
        </a>
    </div>
</div>
<nav>
    <a href="konyvek.php" class="nav-link">Könyvek</a>
    <a href="sikerlista.php" class="nav-link">Sikerlista</a>
    <a href="ujdonsagok.php" class="nav-link">Újdonságok</a>
    <a href="akciok.php" class="nav-link">Akciók</a>
    <a href="informaciok.php" class="nav-link">Információk</a>
</nav>
</body>
</html>