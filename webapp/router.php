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

Router::get('plano/',		'PlanoController/game');
Router::get('plano/game',	'PlanoController/game');

Router::post('plano/',		'PlanoController/show');
Router::post('plano/show',	'PlanoController/show');

Router::get('home/',		'HomeController/login');
Router::get('home/login',	'HomeController/login');

Router::get('home/',		'HomeController/gamemenu');
Router::get('home/gamemenu','HomeController/gamemenu');

Router::get('home/',		'HomeController/game');
Router::get('home/game','HomeController/game');


/************** End of URLEncoder Routing Rules ************************************/