<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;

class BetController extends BaseController
{
    public function stay(){
        $stay = Post::get('stay');
        $deck = Session::get('deck');
        $dealerHand = Session::get('dealerHand');
        $playerHand = Session::get('playerHand');
        $dealerHand->addCardToHand($deck->giveCardToHand());

        if($dealerHand->value > 21 || ($playerHand->value <= 21 && $playerHand->value > $dealerHand->value)){   
            echo "<br><br><br><h2 style='text-align:center;'>The player won the blackjack</h2>";
            return  View::make('home.play');
        }
        if($playerHand->value > 21 || ($dealerHand->value <= 21 && $dealerHand->value >= 17 && $dealerHand->value > $playerHand->value)){
            $playerWin = "<h1>You lost the blackjack</h1>";
            return  View::make('home.play', ['playerWin' => $playerWin]);
        }

        return View::make('home.play',['playerWin' => null]);
        return View::make('home.play');
    }

    public function ask(){
        $ask = Post::get('ask');
        $deck = Session::get('deck');
        $dealerHand = Session::get('dealerHand');
        $playerHand = Session::get('playerHand');
        $playerHand->addCardToHand($deck->giveCardToHand());
        
        if($playerHand->value > 21 || $dealerHand->value > $playerHand->value ){   
            echo "<br><br><br><h2 style='text-align:center;'>You lost the blackjack</h2>";
            return  View::make('home.play');
        }
        if($playerHand->value > $dealerHand->value )
        
        return View::make('home.play');

    }

    public function bet(){
        $bet = Post::get('bet');
        $deck = new Deck();
        $playerHand = new Hand($deck->giveCardToHand());
        $dealerHand = new Hand($deck->giveCardToHand());
        $playerHand->addCardToHand($deck->giveCardToHand());
        Session::set('deck', $deck);
        Session::set('playerHand', $playerHand);
        Session::set('dealerHand', $dealerHand);

        return View::make('home.play');
    }
}