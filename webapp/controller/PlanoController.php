<?php
use ArmoredCore\WebObjects\View; //Tem como função apenas chamar a vista do formdossier (index.phtml).
use ArmoredCore\WebObjects\Post; //Fazer use da classe View no início do controlador
use ArmoredCore\Controllers\BaseController;

	class PlanoController extends BaseController{

	public function game() {
		return View::make('plano.game');
	}

}
?>