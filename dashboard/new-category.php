<?php
ob_start();
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");
$mensagem="";

foreach ( $_POST as $chave => $valor ) {
	// Remove todas as tags HTML
	// Remove os espaços em branco do valor
	$chave = trim( strip_tags( $valor ) );
	
	// Verifica se tem algum valor nulo
	if ( empty ( $valor ) ) {
		$erro = 'Existem campos em branco.';
	}
}

	if(isset($_POST['sendCategoria'])){

    $nomeCategoria = utf8_decode(ucwords(strtolower($_POST["nomeCategoria"])));
    
    if(empty($nomeCategoria)){
			 $mensagem = "Preencha todos os campos!";
	}
	
	else
	if(strlen($nomeCategoria) < 5){
		$mensagem = "O nome deve ter no mínimo 5 caracteres!";
	}
	
	else{
		
		$verifica = mysql_query("SELECT * FROM categoria WHERE nomeCategoria='$nomeCategoria'");//verifica se ja tem um nome cadastrado
		$contar = mysql_num_rows($verifica);
		if($contar == 0){
    	
    	$query = mysql_query("INSERT INTO categoria (nomeCategoria, created) VALUES ('$nomeCategoria', NOW())");
    	
		}
		else{
		 	$flash2="Oops! Esta Categoria já está cadastrada!";
		 }
		 if(isset($query)){
		 	if(mysql_affected_rows() != 0){
			   $flash2="Cadastro realizado com sucesso!";
			   
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

<!DOCTYPE html>
<html ng-app>

 <?php  include_once("includes/head.php") ?>
 <link href="assets/css/estilo.css" rel="stylesheet" />
 <script src="angular/controllers/controllers.js"></script>

<body>
    <div id="wrapper">
        
       <?php  include_once("includes/nav.php") ?>
       
        <?php  include_once("includes/sidebar-left.php") ?>
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Resumo do seu App</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/categories">Categorias</a></li>
					  <li class="active">Nova Categoria</li>
					</ol> 
									
		</div>
			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>
            <div id="page-inner">

				<form name="formCategoria" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				  <!-- area de campos do form -->
				  
				  <section style="margin: 10px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Cadastro de Categorias</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeCategoria">Título<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria" placeholder="Nome da Categoria">
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="descricao">Foto (620 x 270px)<span style="color:red">*</span></label>
							  <input type="file" class="form-control" id="imagemCategoria" name="imagemCategoria">
					 		</div>
					 
						</div>
						<label> <br/> </label>
					</fieldset>
				
				  <hr />
				  <div id="actions" class="row">
				    <div class="col-md-12">
				      <!--<button type="submit" class="btn btn-primary">Cadastrar Restaurante</button>-->
				      <input type="submit" class="btn btn-primary" name="sendCategoria" value="Cadastrar Categoria" />
				      <a href="categories" class="btn btn-default">Cancelar</a>
				    </div>
				  </div>

		   </form>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 
 		<script src="assets/css/MascaraValidacao.js"></script>
  <?php include_once("includes/js.php"); ?>
</body>

</html>

<?php  
}else{
  	header("Location: ../login.php");
}


?>
