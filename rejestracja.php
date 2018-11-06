<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rejestracja</title>
</head>
<body>
<fieldset>
    <form method="POST">
        <center><font size="5">Rejestracja</p></font>
        
        <p>Username<input type="text" name="Username"></p>
        <p>Password<input type ="Password" name="Password"/></p>
        <p><input type= "submit" name ="akc" value="Dodaj"/></p><center>
    </form>
</fieldset>
<?php
    include("db_ini.php");
    
    if(isset($_POST['akc'])) {
        $Username = trim($_POST['Username']);
        $Password = trim($_POST['Password']);
        if( empty($Username) || empty($Password)) {
            echo "Jedno z pól jest puste. ";
        }
        $haslo_hash = password_hash($passowrd,PASSWORD_DEFAULT);
        $result = mysql_query("INSERT INTO Users (`ID_User`,`Username`, `Password`,`Role`) VALUES ('', '$Username', '$haslo_hash', 'Student')");
        if($result) {
            echo "Dodano użytkownika. ";
        }else{
            echo "Błąd przy dodawaniu użytkownika";
        }
    }
    mysql_close();
?>
<a href="index.php">Wróć</p>
</body>
</html>