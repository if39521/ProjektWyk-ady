<?php
session_start();
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
}
if( $username == 'tj35975') {
    require_once(__DIR__.'/headerAdmin.php');
}
else{
    require_once(__DIR__.'/headerUser.php');
}
require_once(__DIR__.'/statystyki.php');

?>

<section id="main">
    <div class="container">

        <div class="col-md-10">
            <!-- Website Overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Statystyki</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <div class="well dash-box">
                            <h2><?php echo count($user_array) ?></h2>
                            <h4>Użytkowników</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="well dash-box">
                            <h2><?php echo $ile_dni?></h2>
                            <h4>Pobrań w tym dniu</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="well dash-box">
                            <h2><?php echo $ile_tydz?></h2>
                            <h4>Pobrań w tym tygodniu</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="well dash-box">
                            <h2><?php echo $ile_mies?></h2>
                            <h4>Pobrań w tym miesiącu</h4>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Grupa Lewa &copy; 2018</span>
    </div>
</footer>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
</body>

</html>

