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
include("classes/cadastro.class.php");
include("classes/login.class.php");


//conexao com banco de dados
$conectar=new DB;
$conectar=$conectar->conectar();

/*$query = mysql_query("SELECT * FROM users");
echo mysql_num_rows($query); //conta o numero de registros no banco de dados
*/


//Método de Cadastro
if($startaction == 1){
   if($acao == "cadastrar"){
		$nome		= $_POST["nome"];
		$telefone   = $_POST["telefone"];
		$cpfcnpj	= $_POST["cpfcnpj"];
		$email		= $_POST["email"];
		$senha		= $_POST["senha"];
		
		if(empty($nome) || empty($telefone) || empty($cpfcnpj) || empty($email) || empty($senha)){
			$msg = "Preencha todos os campos!";
		}
		//TODOS OS CAMPOS PREENCHIDOS
		else{
			//EMAIL VÁLIDO
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				
				
				//SENHA INVÁLIDA
			    if(strlen($senha) < 8 ){
					$msg = "A senha deve conter no mínimo oito caracteres!";
				}
				//SENHA VÁLIDA
				else{
					//EXECUTA A CLASSE DE CADASTRO
					$conectar=new cadastro;
					echo"<div class=\"flash\">";
					$conectar=$conectar->cadastrar($nome, $telefone, $cpfcnpj, $email, $senha, $data);//coloquei data
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

//Método de Login
if($startaction == 1){
   if($acao == "logar"){
   	//Dados - para fazer o login
   	$email = addslashes($_POST["email"]);
   	$senha = addslashes(sha1($_POST["senha"]."zaqxswcde123"));

   	if(empty($email) || empty($senha)){
   		$msg = "Preencha todos os campos!";
   	}else{
   		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   			$msg = "Digite seu e-mail corretamente!";
   		}else{
   			//Executa a busca pelo usuário
   			$login = new login;
   			//$emailuser = $_SESSION["email"]; checar se está funcionando a session
   			//$senhauser = $_SESSION["senha"];
   			echo "<div class=\"flash\">";
   			//echo "<div class=\"flash\">$emailuser $senhauser";  checar se está funcionando a session
   			$login = $login->logar($email, $senha);
   			echo "</div>";
   		}
   	}


   }
}

//Método de Logout
if($startaction == 1){
   if($acao == "logout"){
   	//setcookie("logado","");
   	$_SESSION["logado"] = false;
   	unset($_SESSION["email"],$_SESSION["senha"],$_SESSION["nivel"]);
   }
}

//Método para checar o usuario
if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
	$logado = 1;
	$nivel  = $_SESSION["nivel"];
}

//Método de Aprovar
if($startaction == 1){
   if($acao == "aprovar"){
   	if($nivel == 2){
   		if(isset($_GET["id"])){
   			$id = $_GET["id"];
   			$query = mysql_query("UPDATE users SET status='1' WHERE id='$id'");
   		}
   	}

  }
}

//Método de Bloquear
if($startaction == 1){
   if($acao == "bloquear"){
   	if($nivel == 2){
   		if(isset($_GET["id"])){
   			$id = $_GET["id"];
   			$query = mysql_query("UPDATE users SET status='0' WHERE id='$id'");
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