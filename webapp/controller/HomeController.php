<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

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

    public function start(){
        //View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'Quick Start']);
        return View::make('home.start');
    }

    public function login(){
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
    public function about(){
    //O método about não processa quaisquer dados e apenas devolve a vista ao cliente
        return View::make('home.about');
    }
    public function gamemenu(){
        return View::make('home.gamemenu');
    }
    public function game(){
        return View::make('home.game');
    }
    public function hit(){
        return View::make('home.hit');
    } 
    public function stand(){
        return View::make('home.stand');
    } 
    public function novojogo(){
        return View::make('home.novojogo');
    } 
    public function loadcard(){
      return View::make('home.loadcard');
    } 
    public function cardpointstest(){
      return View::make('home.cardpointstest');
    } 
}