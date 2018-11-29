<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
            <a class="navbar-brand" href="welcome.php">System Udostępniania Wykładów</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="wyklady.php">Wykłady i Kursy</a></li>
                <li><a href="edytujWyklad.php">Edytuj Wykłady i Kursy</a></li>
                <li><a href="confirmStudents.php">Zatwierdzanie Użytkowników</a> </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Witaj, <?php
                        if (isset($user))
                            echo $username; ?></a></li>
                <li><a href="ajax/logout.php">Wyloguj</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
