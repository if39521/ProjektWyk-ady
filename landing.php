<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Udostępniania Wykładów</title>
    <link rel="stylesheet" type="text/css" href="css/landing.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
</head>
<body>
<header class="showcase">
    <div class="tresc">
        <div class="naglowek">
           <h1>Witaj w Systemie Udostępniania Wykładów</h1>
        </div>
        <div class="tekst">
            <p>Aby uzyskać dostęp do serwisu zaloguj się lub zarejestruj.</p>
        </div>

    </div>
</header>

<!-- Services -->
<section class="buttony">
    <div class="container grid-2 center">
        <div>
            <a href="logowanie.php" class="btn_landing">Logowanie</a>
        </div>
        <div>
            <a href="rejestracja.php" class="btn_landing">Rejestracja</a>
        </div>
    </div>
</section>

<footer class="center bg-dark">
    <p>Grupa Lewa &copy; 2018</p>
</footer>
</body>
</html>