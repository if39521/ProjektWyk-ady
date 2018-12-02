<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/wyklady.css">
	<link rel="stylesheet" type="text/css" href="css/forgotPassword.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">


</head>

<body>
<nav class="navbar navbar-default">
    <div class="container" style='height: 40px; width: 90%;'>
        <div class="navbar-header" style='display: flex !important; align-items: center; height: 100% !important;'>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="wyklady.php">System Udostępniania Wykładów</a>
        </div>
        <div id="navbar" style='display: flex !important; align-items: center; height: 100% !important;' class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="wyklady.php">Wykłady i Kursy</a></li>
                <li><a href="confirmStudents.php">Zatwierdzanie Użytkowników</a> </li>
                <li><a href="forgotPassword.php">Zmiana hasła</a> </li>
                <li><a href="statystyki.php">Statystyki</a> </li>
                <li><a href="downloadHistory.php">Historia pobrań</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class='x'>Witaj, <?php
                        if (isset($user))
                            echo $username; ?></a></li>
                <li><a href="ajax/logout.php">Wyloguj</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
