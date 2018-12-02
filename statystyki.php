<?php
session_start();
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
	$username = $user->username;
	$user_role = $user->user_role;
}
require_once(__DIR__.'/ajax/countStats.php');

if( $user_role == 'a') {
    require_once(__DIR__.'/headerAdmin.php');
}
else{
    require_once(__DIR__.'/headerUser.php');
}
?>
<div class='statistic-section'>
    <div class='statistic-container'>
        <div class='statistic-header'>
            <h3 class="panel-title">Statystyki</h3>
        </div>
    
        <div class='statistic-box-container'>
            <div class='statistic-box'>
                <h2><?php echo count($user_array) ?></h2>
                <h4>Użytkowników</h4>
            </div>
            <div class='statistic-box'>
                <h2><?php echo $ile_dni?></h2>
                <h4>Pobrań w tym dniu</h4>
            </div>
            <div class='statistic-box'>
                <h2><?php echo $ile_tydz?></h2>
                <h4>Pobrań w tym tygodniu</h4>
            </div>
            <div class='statistic-box'>
                <h2><?php echo $ile_mies?></h2>
                <h4>Pobrań w tym miesiącu</h4>
            </div>
        </div>
        
    </div>
</div>
      <footer class="footer">
          <div class="container">
              <span class="text-muted">Grupa Lewa &copy; 2018</span>
          </div>
      </footer>

      <script src="vendor/bootstrap/js/bootstrap.js"></script>
   </body>
   
</html>