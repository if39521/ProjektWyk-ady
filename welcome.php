<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Udostępniania Wykładów</title>
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


</head>
<body>
    <div class="nav">
        <a href="welcome.php">Strona Główna</a>
        <a href="#wyklady">Wykłady</a>
        <a href="#kursy">Kursy</a>
        <a href="#">Statystyki</a>
        <a id="logout" href = "ajax/logout.php"><i class="fas fa-power-off"></i></a>
    </div>

    <div class="showcase">
        <div class="powitanie">
            <div class="naglowek">
                <h1>Witaj<?php if (!empty($_SESSION['login_user'])) echo $_SESSION['login_user']; ?></h1>
            </div>
        </div>
    </div>
</body>

</html>