<?php
require_once(__DIR__.'/controller/HistoryController.php');
require_once(__DIR__.'/classes/DB.php');
date_default_timezone_set('UTC');//ustawiam domyślnąstrefę czasową
$historyController = new HistoryController($pdo);

$user_array = $historyController->getAllUserRecords();
$history_array = $historyController->getAllHistoryRecords();

	
            $ile_dni=0;
			$ile_tydz=0;
			$ile_mies=0;
			$ile_sem=0;
			$month=date('m');
			$today = date("Y.m.d");
		     $akt_tydz=date('W');
			
			foreach($history_array as $history):
				if(date("Y.m.d",strtotime($history['c_date']))==$today)
					$ile_dni++;
				
				$mies=explode("-",$history['c_date']);
				if($mies[1]==$month)
					$ile_mies++;
				
				if($mies[1]>=10 and $mies[1]<=12 or $mies[1]==1 )
					$ile_sem++;
				 
				$plik_tydz=date("W",strtotime($history['c_date']));
				if($plik_tydz==$akt_tydz)
					$ile_tydz++;
				
			endforeach;
		
?>
<html>
<head>
</head>
	<body>
	<strong>Statystyki</strong><br /><br >
	<p>Dzisiaj jest <?php echo $today?></p>
	<p>Aktualny dzien tygodnia  <?php echo $akt_tydz?></p>
	<br /><br />Liczba użytkowników: <?php echo count($user_array) ?> <br />
	<br /><br />Pobrania<br /><br />

	<table border="1" rules="all">
	<tr><th>Dzień</th><th>Tydzień</th><th>Miesiąc</th><th>Semestr</th></tr>
	<tr><td><?php echo $ile_dni?></td><td><?php echo $ile_tydz?></td><td><?php echo $ile_mies?></td><td><?php echo$ile_sem?></td></tr>
	</table>
	</body>
</html>