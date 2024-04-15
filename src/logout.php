<?php

session_start();

// Ha a felhasználó nincs bejelentkezve, akkor átirányítjuk a bejelentkezés oldalra.

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

// Írjuk meg az oldalról való kijelentkezést megvalósító PHP kódot!

session_unset();        // A munkamenet változók kiürítése. Ehelyett a $_SESSION = []; utasítás is megfelelő.
session_destroy();      // A munkamenet megszüntetése.

header("Location: login.php");  // A kijelentkezett felhasználót átirányítjuk a bejelentkezés oldalra.
