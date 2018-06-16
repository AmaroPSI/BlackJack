<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class HomeController extends BaseController
{

    public function index(){

        return View::make('home.index');
    }

    public function howtoplay(){

        return View::make('home.howtoplay');
    }

    public function login(){
        //Throw new Exception('Method not implemented. Do it yourself!');
        return View::make('home.login');
    }

    public function signup(){
        
        return View::make('home.signup');
    }

    public function worksheet(){

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'MVC Worksheet']);

        return View::make('home.worksheet');
    }

    public function setsession(){
        $dataObject = MetaArmCoreModel::getComponents();
        Session::set('object', $dataObject);

        Redirect::toRoute('home/worksheet');
    }

    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/worksheet');
    }

    public function aboutus(){
        return View::make('home.aboutus');
    }
    public function play(){
         return View::make('home.play');
    }
    public function gamemenu(){
            return View::make('home.gamemenu');
        }
    public function stay(){
        $stay = Post::get('stay');
        $deck = Session::get('deck');
        $dealerHand = Session::get('dealerHand');
        $dealerHand->addCardToHand($deck->giveCardToHand());

        if($dealerHand->value > 21){

        }

        return View::make('home.play');
    }

    public function ask(){
        $ask = Post::get('ask');
        $deck = Session::get('deck');
        $playerHand = Session::get('playerHand');
        $playerHand->addCardToHand($deck->giveCardToHand());
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

