<?php
class Deck{
  public $cards;

  public function __construct() {
    $this->cards = $this->initializeDeck();
    shuffle($this->cards);
  }

  private function initializeDeck(){
    $deck = array(
            new Card("cardClubs2.png",2),
            new Card("cardClubs3.png",3),
            new Card("cardClubs4.png",4),
            new Card("cardClubs5.png",5),
            new Card("cardClubs6.png",6),
            new Card("cardClubs7.png",7),
            new Card("cardClubs8.png",8),
            new Card("cardClubs9.png",9),
            new Card("cardClubs10.png",10),
            new Card("cardClubsA.png",11),
            new Card("cardClubsJ.png",10),
            new Card("cardClubsK.png",10),
            new Card("cardClubsQ.png",10),
            new Card("cardDiamonds2.png",2),
            new Card("cardDiamonds3.png",3),
            new Card("cardDiamonds4.png",4),
            new Card("cardDiamonds5.png",5),
            new Card("cardDiamonds6.png",6),
            new Card("cardDiamonds7.png",7),
            new Card("cardDiamonds8.png",8),
            new Card("cardDiamonds9.png",9),
            new Card("cardDiamonds10.png",10),
            new Card("cardDiamondsA.png",11),
            new Card("cardDiamondsJ.png",10),
            new Card("cardDiamondsK.png",10),
            new Card("cardDiamondsQ.png",10),
            new Card("cardHearts2.png",2),
            new Card("cardHearts3.png",3),
            new Card("cardHearts4.png",4),
            new Card("cardHearts5.png",5),
            new Card("cardHearts6.png",6),
            new Card("cardHearts7.png",7),
            new Card("cardHearts8.png",8),
            new Card("cardHearts9.png",9),
            new Card("cardHearts10.png",10),
            new Card("cardHeartsA.png",11),
            new Card("cardHeartsJ.png",10),
            new Card("cardHeartsK.png",10),
            new Card("cardHeartsQ.png",10),
            new Card("cardSpades2.png",2),
            new Card("cardSpades3.png",3),
            new Card("cardSpades4.png",4),
            new Card("cardSpades5.png",5),
            new Card("cardSpades6.png",6),
            new Card("cardSpades7.png",7),
            new Card("cardSpades8.png",8),
            new Card("cardSpades9.png",9),
            new Card("cardSpades10.png",10),
            new Card("cardSpadesA.png",11),
            new Card("cardSpadesJ.png",10),
            new Card("cardSpadesK.png",10),
            new Card("cardSpadesQ.png",10),
          );
      return $deck;
  }

  public function giveCardToHand(){
    $card = array_shift($this->cards);
    return $card;
  }
}
?>