<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
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

Router::get('plano/',		'PlanoController/index');
Router::get('plano/index',	'PlanoController/index');

Router::post('plano/index',	'PlanoController/index');

Router::post('plano/',		'PlanoController/show');
Router::post('plano/show',	'PlanoController/show');


/************** End of URLEncoder Routing Rules ************************************/