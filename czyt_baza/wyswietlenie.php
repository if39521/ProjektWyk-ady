<?php
date_default_timezone_set('UTC');//ustawiam domyślnąstrefę czasową
	$polacz = new mysqli('localhost','27809920_lewa','iyuAth9Y','27809920_lewa');	
	

 


           echo"<strong>Statystyki</strong><br /><br >";
   $historia = $polacz->query("SELECT * FROM History");
    $uzyt = $polacz->query("SELECT * FROM Users");
	
             $ile_dni=0;
			 $ile_tydz=0;
			 $ile_mies=0;
			 $ile_sem=0;
			 $month=date('m');
			$today = date("Y.m.d");
		     $akt_tydz=date('W');
			 
			echo 'Dziś jest:  '.$today."<br />";
			echo 'Aktualny nr tgodnia:  '.$akt_tydz."<br />";
			
			
			while($r_his = $historia ->fetch_assoc())
			{
				
				if(date("Y.m.d",strtotime($r_his['c_date']))==$today)
					$ile_dni++;
				
				$mies=explode("-",$r_his['c_date']);
				if($mies[1]==$month)
					$ile_mies++;
				
				if($mies[1]>=10 and $mies[1]<=12 or $mies[1]==1 )
					$ile_sem++;
				 
				$plik_tydz=date("W",strtotime($r_his['c_date']));
				if($plik_tydz==$akt_tydz)
					$ile_tydz++;
				
			}
			
        echo "</table>";
		
		$licz=0;
		while($r_uzyt = $uzyt ->fetch_assoc())
			{
				if($r_uzyt['user_id']==true)
				 $licz++;
			}
		    
		echo '<br /><br />Liczba użytkowników: <br />';
		  echo $licz;
		
		
		echo '<br /><br />Pobrania<br /><br />';
		
		echo'<table border="1" rules="all">';
		     echo' <tr><th>Dzień</th><th>Tydzień</th><th>Miesiąc</th><th>Semestr</th></tr>';
			 echo' <tr><td>'.$ile_dni.'</td><td>'.$ile_tydz.'</td><td>'.$ile_mies.'</td><td>'.$ile_sem.'</td></tr>';
			
			
			
        echo '</table>';

	

			

?>
