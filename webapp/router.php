<?php

use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/about',	'HomeController/about');

Router::get('home/',		'HomeController/login');
Router::get('home/login',	'HomeController/login');

Router::get('home/',		'HomeController/gamemenu');
Router::get('home/gamemenu','HomeController/gamemenu');

Router::get('home/',		'HomeController/signup');
Router::get('home/signup', 	'HomeController/signup');

Router::get('home/',		'HomeController/loadcard');
Router::get('home/loadcard','HomeController/loadcard');

Router::get('home/',		'HomeController/novojogo');
Router::get('home/novojogo','HomeController/novojogo');

Router::get('home/',		'HomeController/play');
Router::get('home/play',	'HomeController/play');

Router::post('home/stay',	'HomeController/stay');

Router::post('home/ask',	'HomeController/ask');

Router::post('home/bet',	'HomeController/bet');
/************** End of URLEncoder Routing Rules ************************************/