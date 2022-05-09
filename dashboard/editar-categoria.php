<?php
ob_start();
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");
$mensagem="";

	if(isset($_POST['sendCategoria'])){

	$id           	= $_POST["id"];
	$nomeCategoria 	= (utf8_decode($_POST["nomeCategoria"]));
	
	if(empty($nomeCategoria)){
			 $mensagem = "Preencha todos os campos!";
	}
	else
	if(strlen($nomeCategoria) < 5){
		$mensagem = "O nome deve ter no mínimo 5 caracteres!";
	}
	
	else{

    	$query = mysql_query ("UPDATE categoria SET nomeCategoria = '$nomeCategoria', modified = NOW() WHERE idCategoria = '$id'");
			
			if(mysql_affected_rows() != 0){
           // header("Location: ../categories.php"); 
            $flash2="Categoria editada com sucesso!";
        }
	}
}   	

			$id = mysql_real_escape_string($_GET['id']);
			$result = mysql_query("SELECT * FROM categoria WHERE idCategoria = '$id' LIMIT 1");
			$resultado = mysql_fetch_assoc($result);

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
                            Dashboard <small>Editar Categoria</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/categories">Categorias</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>
            <div id="page-inner">

				<form name="formCategoria" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				  <!-- area de campos do form -->
				  
				  <section style="margin: 10px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Alterar Categorias</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeCategoria">Título<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria" placeholder="Nome da Categoria" value="<?php
							  echo utf8_encode($resultado['nomeCategoria']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="descricao">Foto (620 x 270px)<span style="color:red">*</span></label>
							  <input type="file" class="form-control" id="imagemCategoria" name="imagemCategoria">
					 		</div>
					 
						</div>
						<label> <br/> </label>
					</fieldset>
				
				  <hr />
				   <input type="hidden" name="id" id="id" value="<?php echo $resultado['idCategoria'];  ?>">
				  <div id="actions" class="row">
				    <div class="col-md-12">
				      <!--<button type="submit" class="btn btn-primary">Cadastrar Restaurante</button>-->
				      <input type="submit" class="btn btn-primary" name="sendCategoria" value="Editar Categoria" />
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
