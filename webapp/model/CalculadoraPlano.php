<?php 
class CalculadoraPlano { 

    public $credito;
	public $numPrest;
    
    public function calculaPlano($credito, $numPrest){

		$valorPrestacao = $credito/$numPrest;
		$diasSemana = array('Domingo', 'Segunda', 'Terça', 'Quarta','Quinta','Sexta', 'Sábado');
	//	$data = date("Y/m/d");
		//$time = strtotime(date("Y/m/d"));
		$tabela = array();
		array_push($tabela,$credito,$numPrest,$data,number_format((float)$valorPrestacao, 2, '.', ''));

	    for($i = 0; $i<$numPrest ; $i++) {

		//	$time = strtotime($data);
	    	$credito = $credito - $valorPrestacao;

	    //	if($diasSemana[date('w', strtotime($data))] == "Domingo")
		//		$data = date("Y/m/d", strtotime("+1 day", $time));
	    //	else if($diasSemana[date('w', strtotime($data))] == "Sábado")
		//		$data = date("Y/m/d", strtotime("+2 day", $time));

		//	$infoLinhaTabela = array($i+1,$data,$diasSemana[date('w', strtotime($data))],number_format((float)$credito, 2, '.', ''));	  		
			
			array_push($tabela,$infoLinhaTabela);

		//	$data = date("Y/m/d", strtotime("+1 month", $time));
		}
		return $tabela;
	}
	
   
} 

?> 