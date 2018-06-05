<?php
	session_start();
	ini_set('arg_separator.output', '&amp;');
	if(isset($_SESSION['CardsArray'])){
		$CardsArray = $_SESSION['CardsArray'];

		//Check size
		$size = sizeof($CardsArray);

		//Draw Card
		//Draw Random Card For Plauer
		$rand_keys = array_rand($CardsArray, 1);
		$rand_card = $CardsArray[$rand_keys];

		//Remove from array
		unset($CardsArray[$rand_keys]);

		if($size == "47"){
			//Draw Card
			$rand_card = "$rand_card";
			$_SESSION['rand_card'] = $rand_card;
		}

		echo"
		<img src=\"http://localhost/BlackJack/public/img/Cards/cardClubs2.png\" width=\"180\" height=\"232\" />
		";

	}

?>