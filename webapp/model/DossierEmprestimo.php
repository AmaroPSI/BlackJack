<?php
class DossierEmprestimo{
  public $data;
  public $nome;
  public $despesas;
  public $credito;
  public $numPrestacoes;
  public $planoPagamentos;

  public function __construct ( $Data, $Nome, $Despesas, $Credito, $NumPrest, $PlanoPagamento ) {
    $this->Data = $data;
    $this->Nome = $nome;
    $this->Despesas = $despesas;
    $this->Credito = $credito;
    $this->NumPrest = $numPrestacoes;
    $this->PlanoPagamento = $planoPagamentos;

   
  }
}
?>