<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;

class HomeController extends BaseController
{

    public function index(){

        return View::make('home.index');
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
    public function about(){
        return View::make('home.about');
    }
    public function play(){
         return View::make('home.play');
    }
    public function gamemenu(){
            return View::make('home.gamemenu');
        }
    

}

