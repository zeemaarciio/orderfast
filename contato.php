<?php 
$page = "Order Fast - Contato";
include("templates/header.php");

//require('functions/iniSis.php');
//require('functions/outSis.php');
?>

<?php

include_once("dashboard/settings/conexao.php");
//$mensagem="";
$erro = false;

foreach ( $_POST as $chave => $valor ) {
	// Remove todas as tags HTML
	// Remove os espaços em branco do valor
	$chave = trim( strip_tags( $valor ) );
	
	// Verifica se tem algum valor nulo
	if ( empty ( $valor ) ) {
		$erro = 'Existem campos em branco.';
	}
}

	if(isset($_POST['sendContact'])){

    $nome             = utf8_decode(ucwords(strtolower($_POST["nome"])));
    $email            = $_POST["email"];
    $assunto          = utf8_decode(ucwords(strtolower($_POST["assunto"])));
    $mensagemContato  = utf8_decode(ucwords(strtolower($_POST["mensagemContato"])));
    
    function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
    
	
	if(empty($nome)){
			 $mensagem = "Preencha o campo Nome!";
	}
	
	else
	if(strlen($nome) < 5){
		$mensagem = "Seu nome deve ter no mínimo 5 caracteres!";
	}
	else
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    	$mensagem = 'Digite seu e-mail corretamente!';
    }
    
 else
	
	if(empty($assunto)){
		$mensagem = "Preencha o campo Assunto!";
	}
	else
	
	if(empty($mensagemContato)){
		$mensagem = "Preencha o campo Mensagem!";
	}
	
	else{
		
		//$verifica = mysql_query("SELECT * FROM contato WHERE nomeItem='$nome'");//verifica se ja tem um nome cadastrado
		//$contar = mysql_num_rows($verifica);
		if($contar == 0){
    	
    	$query = mysql_query("INSERT INTO contato (nome, email, assunto, mensagemContato, data) VALUES ('$nome',
    	'$email', '$assunto', '$mensagemContato', NOW())");
    	
		}
		
		 if(isset($query)){
		 	if(mysql_affected_rows() != 0){
			   $flash2="Mensagem enviada com sucesso!";
			   
		 	}
		   }else{
		   		if($flash2 == ""){
			   		$flash2="Ops! Houve um erro no sistema, tente novamente!";
			 }
		   }
    
       // if(mysql_affected_rows() != 0){
        	//$flash2="Categoria cadastrada com sucesso!";
            //header("Location: restaurante.php");
            //exit();
        //}
        //$flash2="Cadastro realizado com sucesso!";
	}
//	echo "<script>location.href='restaurante';</script>"; 
}

//Variáveis de estilo
if($mensagem == ""){
	$display="display:none;";
}else{
	$display="display:block;";
}

if($flash2 == ""){
	$display2="display:none;";
}else{
	$display2="display:block;";
}

?>


<!DOCTYPE HTML>
 <html lang="pt-br">
 <head>
 	<?php include_once("includes/head.php"); ?>
 	<title>Order Fast | Contato</title>
 </head>
 <body>
 	<?php  include_once ("includes/topo.php"); ?>
 	
	<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>

 	<div class="container">
 	 
 	 <div id="contato" class="formContact bradius" style="top:90px">
       <div class="logo-login"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/banner_fale_conosco.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="100"/></a></div>
       <div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
       <div class="acomodar">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <label for="nome">Nome:</label><input id="nome" type="text" class="text bradius" name="nome" placeholder="Seu nome"/>
          <label for="email">E-mail:</label><input id="email" type="text" class="text bradius" name="email" placeholder="mail@exemplo.com"/>
          <label for="email">Assunto:</label><input id="assunto" type="text" class="text bradius" name="assunto" placeholder="Assunto"/>
          <label for="senha">Mensagem:</label><textarea name="mensagemContato" id="mensagemContato" rows="3" class="msgcontact bradius"></textarea>
          <input type="submit" class="sbContact bradius" name="sendContact" value="Enviar" />
          </form>
        
       </div>
 		
 	</div><!-- container  -->

 	<?php include_once ("includes/footer.php"); ?>
 	
 </body>
 </html>