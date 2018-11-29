<?php
session_start();
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
}
include 'statystyki.php';

if( $username == 'tj35975') {
    include 'headerAdmin.php';
}
else{
    include 'headerUser.php';
}
?>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Edycja Wykładów i Kursów</h1>
            </div>
        </div>
    </div>
</header>

<form enctype="multipart/form-data" style="border-style: solid;" action="./ajax/uploadFile.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000000000000000" />
    <input name="plik" type="file" />
    <label for="typPliku">Typ pliku:</label>
    <select name="fileType">
        <option value="Wyklad">Wykład</option>
        <option value="Kurs">Kurs</option>
    </select>
    <label for="przedmiot">Przedmiot:</label>
    <select name="subjectFile">
        <option value="PSIAI">PSIAI</option>
        <option value="CYBER">CYBER</option>
    </select>
    <input type="submit" name ="upload" value="Wyślij plik" />
    <p><?php if (!empty($_SESSION['file_message']))
            echo $_SESSION['file_message']; ?></p>
</form>

<form enctype="multipart/form-data" style="border-style: solid;" action="./ajax/deleteFile.php" method="POST">
    <label>Pełna nazwa pliku: </label>
    <input name="filename" type="text"/>
    <label for="typPliku">Typ pliku:</label>
    <select name="fileType">
        <option value="Wyklad">Wykład</option>
        <option value="Kurs">Kurs</option>
    </select>
    <input type="submit" name ="delete" value="Skasuj plik" />
    <p><?php if (!empty($_SESSION['del_message']))
            echo $_SESSION['del_message']; ?></p>
</form>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Grupa Lewa &copy; 2018</span>
    </div>


    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    </body>

    </html>