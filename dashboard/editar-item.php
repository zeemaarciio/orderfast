<?php
ob_start();
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");
$mensagem="";

	if(isset($_POST['sendItem'])){

	$id           	= $_POST["id"];
	$nomeItem        = utf8_decode(ucwords(strtolower($_POST["nomeItem"])));
    $descricao       = utf8_decode(ucwords(strtolower($_POST["descricao"])));
    //$tag             = utf8_decode(ucwords(strtolower($_POST["tag"])));
    //$description     = utf8_decode(ucwords(strtolower($_POST["description"])));
    $preco           = $_POST["preco"];
    //$imagem          = $_FILES['imagem']['name'];
    $categoria_Id    = utf8_decode($_POST["categoria_Id"]);
    $situacao_Id	 = utf8_decode($_POST["situacao_Id"]);
	
	if(empty($nomeItem)){
			 $mensagem = "Preencha todos os campos!";
	}
	else
	if(strlen($nomeItem) < 5){
		$mensagem = "O nome deve ter no mínimo 5 caracteres!";
	}
	
	else{
		
    	$query = mysql_query ("UPDATE itens SET nomeItem = '$nomeItem', descricao = '$descricao',
    	preco = '$preco', categoria_Id = '$categoria_Id', situacao_Id = '$situacao_Id', modified = NOW() WHERE idItem = '$id'");

		if(mysql_affected_rows() != 0){
           // header("Location: ../categories.php"); 
            $flash2="Item editado com sucesso!";
        }
			
	}
}   	

			$id = mysql_real_escape_string($_GET['id']);
			$result = mysql_query("SELECT * FROM itens WHERE idItem = '$id' LIMIT 1");
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
                            Dashboard <small>Editar Item</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/itens">Itens</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>
            <div id="page-inner">

				<form name="formItem" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				  <!-- area de campos do form -->
				  
				  <section style="margin: 10px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Cadastro de Itens</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeItem">Título<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Nome do Item" value="<?php
							  echo utf8_encode($resultado['nomeItem']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="descricao">Descrição<span style="color:red">*</span></label>
							  <!--<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Item">-->
							  <textarea class="form-control" rows="3" id="descricao" name="descricao" placeholder="Descrição do Item"><?php
							  echo utf8_encode($resultado['descricao']); ?></textarea>
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="preco">Preço<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="preco" name="preco" placeholder="10.50" value="<?php
							  echo utf8_encode($resultado['preco']); ?>">
					 		</div>
					 		<?php  $categoria_Id = $resultado['categoria_Id']; //seta a categoria no option?>
					 		<div class="form-group col-md-4">
	                        <label>Categoria<span style="color:red">*</span></label>
	                        <select class="form-control" name="categoria_Id" id="categoria_Id">
	                            <option disabled selected>Escolha uma Categoria</option>
	                            <?php
	                            
		                            $resultCat = mysql_query("SELECT * FROM categoria order by nomeCategoria");
		                            while($dados = mysql_fetch_assoc($resultCat)){
		                            	$nomeCategoria = $dados['nomeCategoria'];
		                            	//setando a categoria no option
	                            ?>
	                            	<option value="<?php echo utf8_encode($dados['nomeCategoria']); ?>"
	                            	<?php
	                            	if($nomeCategoria == $categoria_Id){
	                            		echo 'selected';
	                            	}
	                            	
	                            	?>
	                            	><?php echo utf8_encode($dados['nomeCategoria']); ?></option>
	                           
	                            <?php } ?>

	                        </select>
	                    </div>
	                    
					 		<div class="form-group col-md-9">
							  <label for="imagem">Foto (620 x 620px)<span style="color:red">*</span></label>
							  <input type="file" class="form-control" id="imagem" name="imagem">
					 		</div>
							<?php  $situacao_Id = $resultado['situacao_Id']; //seta a situacao no option?>
					 	<div class="form-group col-xs-4">
		                        <label>Situação<span style="color:red">*</span></label>
		                        <select class="form-control" name="situacao_Id" id="situacao_Id">
		                            <option disabled selected>Escolha a Situação</option>
		                            <?php
	                            
		                            $resultSit = mysql_query("SELECT * FROM situacao order by nome");
		                            while($dados = mysql_fetch_assoc($resultSit)){
		                            	$idSituacao = $dados['nome'];
		                            	//setando a situacao no option
	                            ?>
	                            	<option value="<?php echo utf8_encode($dados['nome']); ?>"
	                            	<?php
	                            	if($idSituacao == $situacao_Id){
	                            		echo 'selected';
	                            	}
	                            	
	                            	?>
	                            	><?php echo utf8_encode($dados['nome']); ?></option>
	                            <?php } ?>
		                        </select>
		                    </div>
					 
						</div>

						<label> <br/> </label>
					</fieldset>
				
				  <hr />
				   <input type="hidden" name="id" id="id" value="<?php echo $resultado['idItem'];  ?>">
				  <div id="actions" class="row">
				    <div class="col-md-12">
				      <!--<button type="submit" class="btn btn-primary">Cadastrar Restaurante</button>-->
				      <input type="submit" class="btn btn-primary" name="sendItem" value="Editar Item" />
				      <a href="itens" class="btn btn-default">Cancelar</a>
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
 		// <script type="text/javascript">
 		// document.getElementById("categoria_Id").val()= "porções";
 		// </script>
 		
  <?php include_once("includes/js.php"); ?>
</body>

</html>

<?php  
}else{
  	header("Location: ../login.php");
}


?>
