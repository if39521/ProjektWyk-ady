<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/wyklady.css">
	<link rel="stylesheet" type="text/css" href="css/forgotPassword.css">
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="wyklady.php">System Udostępniania Wykładów</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="wyklady.php">Wykłady i kursy</a></li>
                <li><a href="downloadHistory.php">Historia pobrań</a></li>
                <li><a href="statystyki.php">Statystyki</a> </li>

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