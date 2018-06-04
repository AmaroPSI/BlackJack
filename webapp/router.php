<?php

use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');
Router::get('home/about',	'HomeController/about');

Router::get('home/',		'HomeController/login');
Router::get('home/login',	'HomeController/login');

Router::get('home/',		'HomeController/gamemenu');
Router::get('home/gamemenu','HomeController/gamemenu');

Router::get('home/',		'HomeController/game');
Router::get('home/game',	'HomeController/game');

Router::get('home/',		'HomeController/hit');
Router::get('home/hit', 	'HomeController/hit');

Router::get('home/',		'HomeController/stand');
Router::get('home/stand', 	'HomeController/stand');

Router::get('home/',		'HomeController/signup');
Router::get('home/signup', 	'HomeController/signup');

Router::get('home/',		'HomeController/novojogo');
Router::get('home/novojogo', 	'HomeController/novojogo');

/************** End of URLEncoder Routing Rules ************************************/