<?php
session_start();

if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
    require_once(__DIR__.'/ajax/loadFiles.php');
    $files_array = $file_controller->getAllFiles();
}

if( $username == 'tj35975') {
    require_once(__DIR__.'/headerAdmin.php');
}
else{
    require_once(__DIR__.'/headUser.php');
}

?>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Wykłady i Kursy</h1>
            </div>
        </div>
    </div>
</header>

<table border="1">
    <tr>
        <td>
            <p><b>Pełna nazwa pliku</b></p>
        </td>
        <td>
            <p><b>Typ pliku W - wykład K- kurs</b></p>
        </td>
        <td>
            <p><b>Data dodania pliku</b></p>
        </td>
        <td>
            <p><b>Przedmiot</b></p>
        </td>
    </tr>
    <?php
    foreach ($files_array as $files) {
        ?>
        <tr>
            <td>

                <a href=<?php echo "ajax/download.php?file=".$files['filename']."&type=".$files['file_type']."" ?> ><?php echo $files['filename'] ?></a>

            </td>
            <td>
                <?php echo $files['file_type'];?>
            </td>
            <td>
                <?php echo $files['c_date'];?>
            </td>
            <td>
                <?php echo $files['file_subject'];?>
            </td>
        </tr>
    <?php } ?>
</table>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Grupa Lewa &copy; 2018</span>
    </div>
</footer>

    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    </body>

    </html>