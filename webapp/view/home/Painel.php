<?php
@session_start();
include "../Conexao/config.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha ='$senha'");

if($valida = mysql_fetch_array($sql)){

	$_SESSION['usuario-ok'] = $valida;
	$_SESSION['senha-ok'] = $valida;

	echo"
		<body style='background-color:#131926;'>
		<div style='width:400px; heigth:auto; overflow:hidden; background-color:#F2FFEE; border:1px solid #CBFFC6; 					margin:0 auto; margin-top:16%;'>

		<h1 style='font:12px Tahoma; color:#0E7100; text-align:center;'>Logado com Sucesso, Entrando no Sistema...</h1>
		<center><img src='../Img/load.gif' width='220' height='19' style='margin:0 0 8px 0;' /></center>

		</div>
	</body>

	<meta http-equiv='refresh' content='3; URL=../Painel.php' />

";

}else{

	echo"
	<script language='javascript'>location.href='../login-error.php';</script>
	";		
	}
?>