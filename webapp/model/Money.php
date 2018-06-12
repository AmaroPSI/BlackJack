<?php
class Wallet {

  private $money = 1000;
  private $wager;
  public function __construct($money, $wager) {
    $this->money = $money;
    $this->wager = $wager;
  }
  public function setWager($wager) {
    $this->wager = $wager;
  }
  public function getWager() {
    return $this->wager;
  }
  public function addMoney($money) {
    $this->money += $money;
  }
  public function getMoney() {
    return $this->money;
  }
  public function reconcile($game) {
    $state = $game->getState();
    debug("Wallet::reconcile state [$state] money [".$this->money."]");
    $prize = 0;
    $wager = $this->wager;
    if ($state != State::RECONCILED && State::isEndGame($state)) {
      // handle double down
      if ($game->isDoubleDown()) {
        $wager *= 2;
      }
      switch ($state) {
        case State::USER_BLACKJACK:
          $prize = $wager * 1.5;
          break;
        case State::DEALER_BUST:
        case State::USER_WIN:
          $prize = $wager;
          break;
        case State::DEALER_BLACKJACK:
        case State::USER_BUST:
        case State::DEALER_WIN:
          $prize += -$wager;
          break;
      }
      // handle insurance
      if ($game->userInsured()) {
        if ($state == State::DEALER_BLACKJACK) {
          // user original wager insurance
          $prize += $this->wager;
        } else {
          // user original wager insurance
          $prize -= $this->wager / 2;
        }
      }
      $this->money += $prize;
      debug("Wallet::reconcile final prize [$prize] money [".$this->money."]");
    }
    $game->reconcile();
  }
}
?>