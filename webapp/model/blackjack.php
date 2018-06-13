<?php

	class Blackjack {
		public $Deck = array();
		public $Suit = array("Diamonds","Hearts","Clubs","Spades");
		public $Face = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K", "A"); 
		public $Cards = array("Player" => array(), "Dealer" => array());
		public $Scores = array("Player" => 0, "Dealer" => 0);
		public $GameEnd = 0;
		public $CardNum = array("Player" => 0, "Dealer" => 0);
		
		public function __construct() {
			
			// Build a Deck
			foreach($this->Suit as $Suit) {
				foreach($this->Face as $Face) {
						
					// Values for Cards
					$Value = $Face;
					if(!is_numeric($Face)) $Value = 2;
					if($Face == 'A') $Value = 2;
					
					$this->Deck[] = array("Suit" => $Suit, "Face" => $Face, "Value" => $Value);					
				}
			}
		}
		//count value of cards
function countCards($cards)
{
	//reassign some cards by number.
	for($x=0; $x<count($cards); $x++)
	{
		switch ($cards[$x])
		{
			case "j":
				$cards[$x] = 10;
				break;
			case "q":
				$cards[$x] = 10;
				break;
			case "k":
				$cards[$x] = 10;
				break;
		}
	}
	
	//start counting the cards
	for($x=0; $x<count($cards);$x++)
	{
		//if the card isn't an ACE
		if(is_numeric($cards[$x]))
		{
			$count = $count + $cards[$x];
		}
		else //if card is an ace, we'll count last. 
		{
			$delay[] = $card[$x];
		}
	}
	//check if there's any ACES
	if(count($delay) > 0)
	{
		//if ONE ACE
		if(count($delay) == 1)
		{
			//if total count of cards is 10 or less then 10, we'll make ACE 11,
			if($count <= 10)
			{
				$count = $count +  11;
			}//if the total count of cards is 21, player busted.
			elseif($count >= 21)
			{
				$count= $count + 1;
			}
		}
		else//if more then one ace
		{
			//loop through all aces
			for($x=0; $x<count($delay); $x++)
			{
				//if total count is less then 10 minus the count of the other aces, ACE is 11
				if($count <= 10 - count($delay))
				{
					$count = $count + 11;
				}
				elseif($count >= 21)
				{
					$count = $count + 1;
				}
			}
		}
	}
	
	//return card count
	return $count;
}

	
		public function addCard($entity, $num = 1) {
			
			// Shuffle Deck and deal two Cards
			shuffle($this->Deck);
			for($i = 0; $i < $num; $i++) {
				$this->CardNum[$entity]++;
				$this->Cards[$entity][] = $this->Deck[$i]; 
				unset($this->Deck[$i]);
			}
			
			$this->calculateScore($entity);
			
		}
	
		private function calculateScore($entity) {
			
			// Loop through and add the Values
			$Value = 0;
			$Aces = 0;
			foreach($this->Cards[$entity] as $card) {
				$new_Value = $Value + $card['Value'];
				if($card['Face'] == 'A') $Aces++;
				if($new_Value > 21 && $Aces > 0) {
					$Value = $Value - 2;
					$Aces--;
				} 
				$Value += $card['Value'];
			}
			
			// Set the Value
			$this->Scores[$entity] = $Value;
		}

		
		public function playDealer() {
			// End the game
			$this->GameEnd = 1;

			// If the player's score is bigger than the Dealer's and the player's score is smaller than or equal to 21 then play.
			while($this->Scores['Player'] > $this->Scores['Dealer'] && $this->Scores['Player'] <= 21)
				$this->addCard('Dealer', 1);
			
			// calculate the score for the Dealer
			$this->calculateScore('Dealer');
				
		}
		
		public function getResult() {
			// Check for blackjack
			if($this->Scores['Player'] == 21 && $this->CardNum['Player'] == 2) {
				if($this->Scores['Dealer'] == 21 && $this->CardNum['Dealer'] == 2) {
					$result = 'Tie.';
				}
				$result = 'Blackjack.';
			}

			if($this->Scores['Player'] > 21) $result = '<strong>Bust</strong>';
			if($this->Scores['Dealer'] > 21) $result = '<strong>Win</strong>';
			if($this->Scores['Dealer'] == $this->Scores['Player']) $result = '<strong>Tie</strong>';
			if($this->Scores['Dealer'] > $this->Scores['Player'] && $this->Scores['Dealer'] < 22) $result = '<strong>Loss</strong>';
			if($this->Scores['Player'] > $this->Scores['Dealer'] && $this->Scores['Player'] < 22) $result = '<strong>Win</strong>';

			return $result;
		}
		
		
	}

?>