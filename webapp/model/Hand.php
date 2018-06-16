<?php

class Hand{
	public $cards;
	public $value;

	public function __construct($card) {
		$this->cards = array($card);
		$this->value = $card->value;
	}
	public function addCardToHand($card){
		array_push($this->cards, $card);
		$this->value += $card->value;

		
	}
}