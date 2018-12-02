<?php
session_start();
require_once(__DIR__.'/ajax/loadFiles.php');

$count = count($files_array);
$items_per_page = 5;
$total_pages = ceil($count / $items_per_page);

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
} else 
    $page = 1;

$offset = ($page - 1) * $items_per_page;
$limit_files_array = $file_controller->getAllFilesWithLimit($items_per_page, $offset);
 
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
    $user_role = $user->user_role;
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
        <td>
            <p><b>Edytuj</b></p>
        </td>
        <td>
            <p><b>Usuń</b></p>
        </td>
    </tr>
    <?php
    foreach ($limit_files_array as $files) {
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
            <td class='edit-box'>    
                <form action='ajax/updateFile.php' method='POST'>
                    <input name='edit_course' class='edit_input' placeholder="Edytuj nazwę">
                    <input type='hidden' name='current_name' value='<?php echo $files['filename'] ?>'>
                    <input type='hidden' name='file_type' value='<?php echo $files['file_type'] ?>'>
                    <button type='submit' class='edit_button'>
                    Edytuj
                    </button>
                
                </form>
            </td>
            <td class='delete-box'>
                <a href=<?php echo "ajax/download.php?file=".$files['filename']."&type=".$files['file_type']."" ?>>
                    <button class='delete_button'>
                    Usuń
                    </button>
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
<div class='pagination'>
<?php 
    for($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page)
        echo '<a class="active">'.$i. '</a>';
        else 
            echo '<a href="wyklady.php?page=' .$i .'"> '.$i .'</a>';
    }
?>
</div>
<div class='upload-form-box'>
    <form class='upload-form' enctype="multipart/form-data" style="border-style: solid;" action="./ajax/uploadFile.php" method="POST">
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
</div>
<footer class="footer">
    <div class="container">
        <span class="text-muted">Grupa Lewa &copy; 2018</span>
    </div>
</footer>

    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    </body>

    </html>