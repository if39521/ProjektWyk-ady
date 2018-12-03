<?php
session_start();
require_once(__DIR__.'/ajax/loadFiles.php');

if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
    $user_role = $user->user_role;
    $user_id = $user->user_id;

    $history_array = $history_controller->getAllHistoryRecords(29);
    $file_ids_array = array();
    foreach($history_array as $history) {
    array_push($file_ids_array, $history['file_id']);
    };
    $files_ids = join(",",$file_ids_array); 
    $where = "file_id IN (" .$files_ids. ')';
    $files_history_array = $file_controller->getAllFiles($where);
}

if( $user_role == 'a') {
    require_once(__DIR__.'/headerAdmin.php');
}
else{
    require_once(__DIR__.'/headerUser.php');
}

?>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Historia pobran</h1>
            </div>
        </div>
    </div>
</header>

<div class='download-history-container'>

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
        foreach ($files_history_array as $files) {
            ?>
            <tr>
                <td>
    
                    <a href=<?php echo "ajax/watermark.php?file=".$files['filename']."&type=".$files['file_type']."" ?> ><?php echo $files['filename'] ?></a>
    
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
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Grupa Lewa &copy; 2018</span>
    </div>
</footer>

    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    </body>

    </html>