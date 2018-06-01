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
					if(!is_numeric($Face)) $Value = 10;
					if($Face == 'A') $Value = 11;
					
					$this->Deck[] = array("Suit" => $Suit, "Face" => $Face, "Value" => $Value);					
				}
			}
		}
		
		public function addCard($entity, $num = 2) {
			
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
					$Value = $Value - 10;
					$Aces--;
				} 
				$Value += $card['Value'];
			}
			
			// Set the Value
			$this->Scores[$entity] = $Value;
		}
		
		public function playBank() {
			// End the game
			$this->GameEnd = 1;

			// If the player's score is bigger than the bank's and the player's score is smaller than or equal to 21 then play.
			while($this->Scores['Player'] > $this->Scores['Dealer'] && $this->Scores['Player'] <= 21)
				$this->addCard('Dealer', 1);
			
			// calculate the score for the bank
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