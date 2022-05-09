<?php
//Starts
ob_start();
session_start();

//Globais
$home="http://jmms.com.br/projects/orderfast/";
$title="Order Fast - Painel";
$startaction="";
$msg="";
if(isset($_GET["acao"])){
	$acao=$_GET["acao"];
	$startaction=1;
}

//INCLUDE DAS CLASSES
include("classes/DB.class.php");
include("dashboard/cadastroGarcom.class.php");


//conexao com banco de dados
$conectar=new DB;
$conectar=$conectar->conectar();

//Método de Cadastro
if($startaction == 1){
   if($acao == "cadastrar"){
		$nameGarcom=$_POST["nameGarcom"];
		$cpfGarcom=$_POST["cpfGarcom"];
		$emailGarcom=$_POST["emailGarcom"];
		$senhaGarcom=$_POST["senhaGarcom"];
		
		if(empty($nameGarcomme) || empty($cpfGarcom) || empty($emailGarcom) || empty($senhaGarcom)){
			$msg = "Preencha todos os campos!";
		}
		//TODOS OS CAMPOS PREENCHIDOS
		else{
			//EMAIL VÁLIDO
			if(filter_var($emailGarcom,FILTER_VALIDATE_EMAIL)){
				
				
				//SENHA INVÁLIDA
			    if(strlen($senhaGarcom) < 8 ){
					$msg = "A senha deve conter no mínimo oito caracteres!";
				}
				//SENHA VÁLIDA
				else{
					//EXECUTA A CLASSE DE CADASTRO
					$conectar=new cadastro;
					echo"<div class=\"flash\">";
					$conectar=$conectar->cadastrar($nameGarcom, $cpfGarcom, $emailGarcom, $senhaGarcom, $data);//coloquei data
					echo"</div>";
				}
			}
			//Email inválido
			else{
				$msg = "Digite seu e-mail corretamente!";
			}
					
		}
				
	}
	
}

//Variáveis de estilo
if($msg == ""){
	$display="display:none;";
}else{
	$display="display:block;";
}

?>