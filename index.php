<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Udostępniania Wykładów</title>
    <link rel="stylesheet" type="text/css" href="css/landing.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<section class="showcase" id="main">
    <div class="tresc">
        <div class="naglowek">
            <h1>Witaj w Systemie Udostępniania Wykładów</h1>
        </div>
        <div class="tekst">
            <h2>Aby uzyskać dostęp do serwisu zaloguj się lub zarejestruj</h2>
        </div>
        <div class="buttony">
            <div class="container grid-2 center">
                <div>
                    <a href="login.php" class="btn_landing">Logowanie</a>
                </div>
                <div>
                    <a href="register.php" class="btn_landing">Rejestracja</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="center bg-dark">
    <p>Grupa Lewa &copy; 2018</p>
</footer>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>